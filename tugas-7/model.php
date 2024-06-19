<?php
class SuaraModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addSuara($provinsi, $jumlahSuara, $capres1, $capres2, $capres3) {
        $sql = "INSERT INTO tbl_suara_capres (provinsi, jumlah_suara, capres1, capres2, capres3) 
                VALUES ('$provinsi', '$jumlahSuara', '$capres1', $capres2, $capres3)";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function updateSuara($idSuara, $provinsi, $jumlahSuara, $capres1, $capres2, $capres3) {
        $sql = "UPDATE tbl_suara_capres SET provinsi = '$provinsi', jumlah_suara = $jumlahSuara, capres1 = $capres1, capres2 = $capres2, capres3 = $capres3 WHERE id_suara = $idSuara";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }

    public function hapusSuara($idSuara) {
        $sql = "DELETE FROM tbl_suara_capres WHERE id_suara = $idSuara";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        }
    }
}
?>
