<?php
require_once 'UserModel.php';

class LoginController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }


    public function girisYap($kullaniciAdi,$sifre) {
        session_start();

        // $_POST ile veri alımı


        $kullaniciBilgisi = $this->model->kullaniciDogrula($kullaniciAdi, $sifre);

        if ($kullaniciBilgisi) {
            // Oturum değişkenini ayarla
            $_SESSION['kullanici'] = $kullaniciAdi;
            $_SESSION['takim_numarasi'] = $kullaniciBilgisi['takim_numarasi'];
            http_response_code(200);

            //echo json_encode(["durum" => "basarili", "takim_numarasi" => $kullaniciBilgisi['takim_numarasi']]);
            echo $kullaniciBilgisi['takim_numarasi'];

        } else {
            http_response_code(401);
            echo json_encode(["durum" => "hatali", "mesaj" => "Kullanıcı adı veya şifre hatalı"]);
        }
    }

}