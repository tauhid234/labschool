<?php
require_once('../server/server.php');
require_once('../util/MessageUtil.php');

class FeedbackModel {
    
    var $server;
    var $output = [];
    var $msg;

    var $uid;

    public function __construct()
    {
        $this->server = new Server();
        $this->msg = new MessageUtil();
    }

    public function Add($nama_lengkap, $asal_unit, $unit_penilaian, $kecepatan_layanan, $penyelesaian_layanan, $penguasaan_bidang_kerja, $ketersediaan_informasi,
                        $ketersediaan_panduan, $penanganan_komplain, $pendokumentasian, $keterbukaan_penyelesaian_komplain, $kebersihan_ruangan_pelayanan,
                        $ketersediaan_ruang_pelayanan, $kenyamanan_ruang_pelayanan, $keramahan, $kerapihan, $keberadaan_staff, $perhatian_responsif,
                        $keakuratan_informasi, $informasi_terkini, $kelengkapan_informasi, $komentar){
        
        $name = strtoupper($nama_lengkap);

        $insert = mysqli_query($this->server->mysql, "INSERT INTO feedback (nama_lengkap, asal_unit, unit_penilaian, kecepatan_layanan,
                  penyelesaian_layanan, penguasaan_bidang_kerja, ketersediaan_informasi, ketersediaan_panduan, penanganan_komplain,
                  pendokumentasian, keterbukaan_penyelesaian_komplain, kebersihan_ruangan_pelayanan, ketersediaan_ruang_pelayanan,
                  kenyamanan_ruang_pelayanan, keramahan, kerapihan, keberadaan_staff, perhatian_responsif, keakuratan_informasi,
                  informasi_terkini, kelengkapan_informasi, komentar) VALUES ('$name', '$asal_unit', '$unit_penilaian', '$kecepatan_layanan',
                  '$penyelesaian_layanan', '$penguasaan_bidang_kerja', '$ketersediaan_informasi', '$ketersediaan_panduan', '$penanganan_komplain',
                  '$pendokumentasian', '$keterbukaan_penyelesaian_komplain', '$kebersihan_ruangan_pelayanan', '$ketersediaan_ruang_pelayanan',
                  '$kenyamanan_ruang_pelayanan', '$keramahan', '$kerapihan', '$keberadaan_staff', '$perhatian_responsif',
                  '$keakuratan_informasi', '$informasi_terkini', '$kelengkapan_informasi', '$komentar')");

var_dump($insert);
        if($insert == false){
            return $this->msg->Error("Insert feedback gagal");
        }

        return $this->msg->Success('Data feedback berhasil disimpan dan direkam pada database');
    }

}