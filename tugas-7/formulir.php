<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Suara</title>
    <!-- Font Poppins dari Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="gradient-background">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 d-flex justify-content-between align-items-center">
                            Tambah Suara Capres
                        </h3>
                    </div>
                    <div class="card-body">
                        <form class="form" action="index.php">
                            <div class="form-group row mb-2">
                                <label class="col-xl-3">Provinsi</label>
                                <div class="col-xl-6">
                                    <input id="provinsi" name="provinsi" class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-xl-3">Jumlah Suara</label>
                                <div class="col-xl-6">
                                    <input id="jumlah_suara" name="jumlah_suara" class="form-control" type="number" />
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-xl-3">Suara Capres 1</label>
                                <div class="col-xl-6">
                                    <input id="capres1" name="capres1" class="form-control" type="number" />
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-xl-3">Suara Capres 2</label>
                                <div class="col-xl-6">
                                    <input id="capres2" name="capres2" class="form-control" type="number" />
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-xl-3">Suara Capres 3</label>
                                <div class="col-xl-6">
                                    <input id="capres3" name="capres3" class="form-control" type="number" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnTambahSuara">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom JavaScript -->
    <script src="script.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnTambahSuara').click(function() {
                var provinsi = $('#provinsi').val();
                var jumlah_suara = $('#jumlah_suara').val();
                var capres1 = $('#capres1').val();
                var capres2 = $('#capres2').val();
                var capres3 = $('#capres3').val();

                $.ajax({
                    type: 'POST',
                    url: 'controller.php',
                    data: {
                        action: 'addSuara',
                        provinsi: provinsi,
                        jumlah_suara: jumlah_suara,
                        capres1 : capres1,
                        capres2 : capres2,
                        capres3 : capres3
                    },
                    dataType: 'json',
                });
                alert('Pengajuan berhasil ditambahkan');
            });
        });
    </script>
</body>
</html>

?>