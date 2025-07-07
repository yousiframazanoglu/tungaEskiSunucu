<?php
class ServerTimeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function saveRequestInfo($ipAddress, $serverTime) {
        $requestTime = date('Y-m-d H:i:s'); // İsteğin alındığı anın zamanı
        $sorgu = $this->pdo->prepare("INSERT INTO server_time_requests (ip_address, request_time, server_time) VALUES (:ip_address, :request_time, :server_time)");
        $sorgu->execute([
            ':ip_address' => $ipAddress,
            ':request_time' => $requestTime,
            ':server_time' => $serverTime
        ]);
    }


}

?>