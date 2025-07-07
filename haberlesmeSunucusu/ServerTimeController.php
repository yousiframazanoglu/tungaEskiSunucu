<?php
require_once 'ServerTimeModel.php';

class ServerTimeController {
    private $model;

    public function __construct(ServerTimeModel $model) {
        $this->model = $model;
    }


    public function serverTime() {
        session_start();
        $serverTime = date('Y-m-d H:i:s');
        $ipAddress = $_SERVER['REMOTE_ADDR']; // Kullanıcının IP adresini al

        // Veritabanına kaydet
        $this->model->saveRequestInfo($ipAddress, $serverTime);

        header('Content-Type: application/json');
        echo json_encode(["sunucuSaati" => $serverTime]);
    }
}

?>