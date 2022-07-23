<?php 
require_once('../server/server.php');
require_once('../util/MessageUtil.php');

class AuthModel{

    var $msg;
    var $server;

    public function __construct()
    {
        $this->server = new Server();
        $this->msg = new MessageUtil();
    }

    public function getLogin($email, $password){
        $query = mysqli_query($this->server->mysql, "SELECT * FROM user WHERE email = '$email'");
        if(mysqli_num_rows($query) == 1){
            $row = mysqli_fetch_array($query);
            if(password_verify($password, $row["password"])){
                // session_start();
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['email'] = $row['email'];
                // return header("Location:../view/index.php");
                echo '<script>swal("SUKSES","Anda telah berhasil login ke Labschool Cirendeu","success");</script>';
            }else{
                echo '<script>swal("GAGAL","Email atau password anda salah","error");</script>';
                return;
            }
        }else{
            echo '<script>swal("GAGAL","Email atau password anda salah","error");</script>';
            return;
        }
            echo '<script>swal("SUKSES","Anda telah berhasil login ke Labschool Cirendeu","success");</script>';
    }
}