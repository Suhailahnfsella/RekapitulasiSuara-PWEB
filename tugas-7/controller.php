<?php
include_once 'config.php';
include_once 'model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = get_connection();

    if ($_POST['action'] === 'addSuara') {
        if (
            isset($_POST['provinsi']) && 
            isset($_POST['jumlah_suara']) && 
            isset($_POST['capres1']) &&
            isset($_POST['capres2']) &&
            isset($_POST['capres3'])
        ) {
            // Ambil data dari form
            $provinsi = $_POST['provinsi'];
            $jumlah_suara = $_POST['jumlah_suara'];
            $capres1 = $_POST['capres1'];
            $capres2 = $_POST['capres2'];
            $capres3 = $_POST['capres3'];

            $suaraModel = new SuaraModel($conn);

            $result = $suaraModel->addSuara($provinsi, $jumlah_suara, $capres1, $capres2, $capres3);

            // Tutup koneksi database setelah selesai menggunakan objek koneksi
            $conn->close();

            // Kembalikan hasil ke browser
            echo json_encode($result);
        }
    } elseif ($_POST['action'] === 'updateSuara') {
        if (
            isset($_POST['id_suara']) &&
            isset($_POST['provinsi']) && 
            isset($_POST['jumlah_suara']) && 
            isset($_POST['capres1']) &&
            isset($_POST['capres2']) &&
            isset($_POST['capres3'])
        ) {
            $id_suara = $_POST['id_suara'];
            $provinsi = $_POST['provinsi'];
            $jumlah_suara = $_POST['jumlah_suara'];
            $capres1 = $_POST['capres1'];
            $capres2 = $_POST['capres2'];
            $capres3 = $_POST['capres3'];
    
            $suaraModel = new SuaraModel($conn);
    
            $result = $suaraModel->updateSuara($id_suara, $provinsi, $jumlah_suara, $capres1, $capres2, $capres3);

            // Tutup koneksi database setelah selesai menggunakan objek koneksi
            $conn->close();

            // Kembalikan hasil ke browser
            echo json_encode($result);
        }
    } elseif ($_POST['action'] === 'hapusSuara') {
        if (
            isset($_POST['id_suara'])
        ) {
            $id_suara = $_POST['id_suara'];
    
            $suaraModel = new SuaraModel($conn);
    
            $result = $suaraModel->hapusSuara($id_suara);
            
            $conn->close();

            // Kembalikan hasil ke browser
            echo json_encode($result);
        }
    }
}
?>
