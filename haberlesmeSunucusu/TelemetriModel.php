<?php


class TelemetriModel {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function saveTelemetri($data) {
        $query = "INSERT INTO telemetri (takim_numarasi, IHA_enlem, IHA_boylam, IHA_irtifa, IHA_dikilme, IHA_yonelme, IHA_yatis, IHA_hiz, IHA_batarya, IHA_otonom, IHA_kilitlenme, Hedef_merkez_X, Hedef_merkez_Y, Hedef_genislik, Hedef_yukseklik, GPSSaati) VALUES (:takim_numarasi, :IHA_enlem, :IHA_boylam, :IHA_irtifa, :IHA_dikilme, :IHA_yonelme, :IHA_yatis, :IHA_hiz, :IHA_batarya, :IHA_otonom, :IHA_kilitlenme, :Hedef_merkez_X, :Hedef_merkez_Y, :Hedef_genislik, :Hedef_yukseklik, :GPSSaati)";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($data);
    }
}
?>