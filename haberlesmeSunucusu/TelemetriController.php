<?php

require_once 'TelemetriModel.php';

class TelemetriController {
    private $model;

    public function __construct(TelemetriModel $model) {
        $this->model = $model;
    }

    public function saveTelemetriData() {
        $data = json_decode(file_get_contents('php://input'), true);

        // Veri doğrulama ve hazırlama işlemleri burada yapılabilir

        $this->model->saveTelemetri($data);
        echo json_encode(['status' => 'success', 'message' => 'Telemetry data saved successfully']);
    }
}
?>