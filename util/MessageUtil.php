<?php

class MessageUtil{
    var $success;
    var $warning;
    var $error;

    public function Success($data){
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUKSES, '.$data.'
                </div>';
    }
    public function Info($data){
        return '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>INFORMASI, '.$data.'
                </div>';
    }
    public function Warning($data){
        return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>PERINGATAN, '.$data.'
                </div>';
    }
    public function Error($data){
        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR, '.$data.'
                </div>';
    }
}