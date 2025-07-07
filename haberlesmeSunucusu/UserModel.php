<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function kullaniciDogrula($kullaniciAdi, $sifre) {
        // Kullanıcı adı ve şifreye göre sorgu yapılıyor
        $sorgu = $this->pdo->prepare("SELECT * FROM users WHERE kullanici_adi = :kullanici_adi AND sifre = :sifre");
        $sorgu->execute(['kullanici_adi' => $kullaniciAdi, 'sifre' => $sifre]);

        // Sorgu sonucunu al
        $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);

        if ($sonuc !== false) {
            // Kullanıcı varsa, kullanıcı bilgileri ile birlikte takım numarası da döndürülüyor
            return $sonuc;
        } else {
            // Kullanıcı yoksa, false dönüyor
            return false;
        }
    }
}
?>