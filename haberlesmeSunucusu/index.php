<?php
// index.php veya router.php
require_once 'TelemetriController.php';
require_once 'LoginController.php';
require_once 'ServerTimeController.php';
$method = $_SERVER['REQUEST_METHOD'];

// Veritabanı bağlantısı ve diğer başlangıç ayarları
$pdo = new PDO('mysql:host=localhost;dbname=asamety1_HaberlesmeSunucusu;charset=utf8mb4', 'asamety1_HaberlesmeSunucusuKullanici', 'FT3XfWMc9GT56XkydCDQ');

$timeModel = new ServerTimeModel($pdo);
$timecontroller = new ServerTimeController($timeModel);
$telemetriModel = new TelemetriModel($pdo);
$telemetriController = new TelemetriController($telemetriModel);



$userModel = new UserModel($pdo);
$loginController = new LoginController($userModel);
// Basit bir routing mekanizması
$url_components = parse_url($_SERVER['REQUEST_URI']);
$path = $url_components['path'];


if ($path == '/api/telemetri_gonder') {
    $telemetriController->telemetriGonder();
}

else if ($path == '/api/giris/') {
    $jsonData = json_decode(file_get_contents('php://input'), true);

    if(isset($jsonData)){
        $kullaniciAdi = $jsonData['kadi'] ?? '';
        $sifre = $jsonData['sifre'] ?? '';

    }else{
        $kullaniciAdi = isset($_POST['kadi']) ? $_POST['kadi'] : '';
        $sifre = isset($_POST['sifre']) ? $_POST['sifre'] : '';
    }


    //echo json_encode(["durum" => $kullaniciAdi, "mesaj" => $sifre]);
    $loginController->girisYap($kullaniciAdi,$sifre);


}else if($path == '/api/sunucusaati/'){
    $timecontroller->serverTime();
}else if ($path == '/api/telemetri_gonder') {
    $telemetriController->saveTelemetriData();
}

else{
    echo $path;
    // Diğer route'lar için
}
?>