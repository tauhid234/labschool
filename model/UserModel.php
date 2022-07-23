<?php
$url = $_SERVER['SERVER_NAME'];
$path = $_SERVER['REQUEST_URI'];
require_once('../server/server.php');
require_once('../util/MessageUtil.php');

class UserModel{

    var $mysqlz;
    var $hasil;
    var $msg;

    public function __construct()
    {
        $this->mysqlz = new Server();
        $this->msg = new MessageUtil();
    }

    public function Add($nama, $telp, $email, $password){

        $create_date = date('Y-m-d');
        $decode_hp = htmlspecialchars($telp);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $names = strtoupper($nama);

        $sql = mysqli_query($this->mysqlz->mysql, "SELECT * FROM user WHERE email = '$email'");
        $row = mysqli_num_rows($sql);
        if($row > 0){
            // return $this->msg = $this->msg->Warning('Data dengan email tersebut sudah tersedia');
          echo '<script>swal("INFORMASI","Data registrasi dengan email tersebut sudah tersedia","info");</script>';
          return;
        }

        $data = mysqli_query($this->mysqlz->mysql, "INSERT INTO user (nama, email, telephone, password) VALUES
        ('$names','$email', '$decode_hp', '$hash')");

        if($data == false){
            // return $this->msg->Error("Gagal insert user baru");
          echo '<script>swal("ERROR","Gagal untuk registrasi baru","error");</script>';
          return;
        }

        // return $this->msg = $this->msg->Success('Data berhasil di simpan');
          echo '<script>swal("SUKSES","Data registrasi anda telah berhasil","success");</script>';
    }
    
}