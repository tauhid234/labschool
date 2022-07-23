<?php

class MessageUtil{
    var $success;
    var $warning;
    var $error;

    public function Success($data){
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUKSES!</strong> '.$data.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
    public function Info($data){
        return '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>INFORMASI!</strong> '.$data.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
    public function Warning($data){
        return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>PERINGATAN!</strong> '.$data.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
    public function Error($data){
        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR!</strong> '.$data.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
}