<?php
  function total_views($conn, $page_id = null)
  {
    if($page_id === null)
    {
      // count total website views
      $query = $conn->prepare("SELECT sum(total_views) as total_views FROM pages");
      $query->execute();
      $counts = $query->rowCount();

      if($counts > 0)
      {
        while($row=$query->fetch(PDO::FETCH_ASSOC))
        {
          if($row['total_views'] === null)
          {
            return 0;
          }
          else
          {
            return $row['total_views'];
          }
        }
      }
      else
      {
        return "No records found!";
      }
    }
    else
    {
      // count specific page views
      $query = $conn->prepare("SELECT total_views FROM pages WHERE id=$page_id");
      $query->execute();
      $counts = $query->rowCount();
      
      if($counts > 0)
      {
        while($row=$query->fetch(PDO::FETCH_ASSOC))
        {
          if($row['total_views'] === null)
          {
            return 0;
          }
          else
          {
            return $row['total_views'];
          }
        }
      }
      else
      {
        return "No records found!";
      }
    }
  }


  function is_unique_view($conn, $visitor_ip, $page_id)
  {
    $query = $conn->prepare("SELECT * FROM page_views WHERE visitor_ip='$visitor_ip' AND page_id=$page_id");
    $query->execute();
    $counts = $query->rowCount();

    // $result = mysqli_query($conn, $query);
    // $query = $conn->prepare("SELECT * FROM ms_user WHERE username='$username'");
    // $query->execute();
    // $counts = $query->rowCount();
    
    if($counts > 0)
    {
      return false;
    }
    else
    {
      return true;
    }
  }


  function add_view($conn, $visitor_ip, $page_id)
  {
    if(is_unique_view($conn, $visitor_ip, $page_id) === true)
    {
      // insert unique visitor record for checking whether the visit is unique or not in future.
      $query = $conn->prepare("INSERT INTO page_views (visitor_ip, page_id) VALUES ('$visitor_ip', $page_id)");
      $rs = $query->execute();
      
      if($rs)
      {
        // At this point unique visitor record is created successfully. Now update total_views of specific page.
        $update = $conn->prepare("UPDATE pages SET total_views = total_views + 1 WHERE id=$page_id");
        $rs_up = $update->execute();
        
        if($rs_up == 0)
        {
          echo "Error updating record: " . mysqli_error($conn);
        }
      }
      else
      {
        echo "Error inserting record: " . mysqli_error($conn);
      }
    }
  }
?>