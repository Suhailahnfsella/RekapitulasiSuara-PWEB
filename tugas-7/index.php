<?php
$server = '127.0.0.1';
$username = 'suhailahnfsella';
$password = 'Sella250104*';
$dbname = 'dbsuaracapres';

$conn = mysqli_connect($server, $username, $password, $dbname);

$rows = [];
$query = $conn->query('SELECT * FROM tbl_suara_capres');

if($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $rows[] = [
            'id_suara' => $row['id_suara'],
            'provinsi' => $row['provinsi'],
            'jumlah_suara' => $row['jumlah_suara'],
            'capres1' => $row['capres1'],
            'capres2' => $row['capres2'],
            'capres3' => $row['capres3'],
        ];
    }
}

$conn->close();

?>
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
    <div class="container">
        <div id="diagram" class="row justify-content-center">
            <div class="col-lg-10 col-md-10">
                <div class="rekap-container">
                    <h4 class="text-center mb-4">Rekap Persentase</h4>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <img src="img/capres1.png" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <?php 
                                        $jumlahSuara = 0;
                                        $hasil = 0;
                                        foreach($rows as $row): 
                                            $jumlahSuara = $jumlahSuara + $row['jumlah_suara'];
                                        endforeach;

                                        foreach($rows as $row): 
                                            $hasil = $hasil + (($row['capres1'] * 100)/$jumlahSuara);
                                        endforeach;
                                    ?>
                                    <h1><?php echo number_format($hasil, 2, '.', ''); ?>%</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <img src="img/capres2.png" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <?php 
                                        $jumlahSuara = 0;
                                        $hasil = 0;
                                        foreach($rows as $row): 
                                            $jumlahSuara = $jumlahSuara + $row['jumlah_suara'];
                                        endforeach;
                                        
                                        foreach($rows as $row): 
                                            $hasil = $hasil + (($row['capres2'] * 100)/$jumlahSuara);
                                        endforeach;
                                    ?>
                                    <h1><?php echo number_format($hasil, 2, '.', ''); ?>%</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <img src="img/capres3.png" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <?php 
                                        $jumlahSuara = 0;
                                        $hasil = 0;
                                        foreach($rows as $row): 
                                            $jumlahSuara = $jumlahSuara + $row['jumlah_suara'];
                                        endforeach;
                                        
                                        foreach($rows as $row): 
                                            $hasil = $hasil + (($row['capres3'] * 100)/$jumlahSuara);
                                        endforeach;
                                    ?>
                                    <h1><?php echo number_format($hasil, 2, '.', ''); ?>%</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chart-container">
                    <h4 class="text-center mb-4">Diagram Suara Capres di Pulau Jawa</h4>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="tabel-container">
                    <h4 class="text-center mb-4">Tabel Suara Capres di Pulau Jawa</h4>
                    <div class="col-12 mb-3 text-end">
                        <button type="button" class="btn btn-primary" onclick="openFormulir()">Tambah</button>
                    </div>
                    <table class="table table-striped small text-center">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 9.5%;">ID Suara</th>
                                <th style="width: 12.5%;">Provinsi</th>
                                <th style="width: 12.5%;">Jumlah Suara</th>
                                <th style="width: 12.5%;">Paslon 1</th>
                                <th style="width: 12.5%;">Paslon 2</th>
                                <th style="width: 12.5%;">Paslon 3</th>
                                <th style="width: 12.5%;">Tidak Sah</th>
                                <th style="width: 15.5%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="t-body">
                            <?php foreach($rows as $row): ?>
                                <tr>
                                    <td><?= $row['id_suara'] ?></td>
                                    <td><?= $row['provinsi'] ?></td>
                                    <td><?= $row['jumlah_suara'] ?></td>
                                    <td><?= $row['capres1'] ?></td>
                                    <td><?= $row['capres2'] ?></td>
                                    <td><?= $row['capres3'] ?></td>
                                    <td><?= $row['jumlah_suara'] - ($row['capres1'] + $row['capres2'] + $row['capres3']) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-link bg-warning" data-bs-toggle="modal" data-bs-target="#ModalUbah" data-suara="{&quot;id_suara&quot;: &quot;<?= $row['id_suara'] ?>&quot;,&quot;provinsi&quot;: &quot;<?= $row['provinsi'] ?>&quot;,&quot;jumlah_suara&quot;: &quot;<?= $row['jumlah_suara'] ?>&quot;,&quot;capres1&quot;: &quot;<?= $row['capres1'] ?>&quot;,&quot;capres2&quot;: &quot;<?= $row['capres2'] ?>&quot;,&quot;capres3&quot;: &quot;<?= $row['capres3'] ?>&quot;}">
                                            <i class="bi bi-pencil-square text-white"></i>
                                        </button>

                                        <button type="button" class="btn btn-link bg-danger" data-bs-toggle="modal" data-bs-target="#ModalHapus" data-suara="<?= $row['id_suara'] ?>">
                                            <i class="bi bi-trash text-white"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <div class="modal fade" id="ModalUbah" aria-hidden="true" aria-labelledby="ModalUbah" tabindex="-1" data-bs-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalUbah">Ubah Data</h5>
                            </div>
                            <div class="modal-body">
                                <form class="form" action="index.php">
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-4">Provinsi</label>
                                        <div class="col-xl-8">
                                            <input id="provinsi" name="provinsi" class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-4">Jumlah Suara</label>
                                        <div class="col-xl-8">
                                            <input id="jumlah_suara" name="jumlah_suara" class="form-control" type="number" />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-4">Suara Capres 1</label>
                                        <div class="col-xl-8">
                                            <input id="capres1" name="capres1" class="form-control" type="number" />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-4">Suara Capres 2</label>
                                        <div class="col-xl-8">
                                            <input id="capres2" name="capres2" class="form-control" type="number" />
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-4">Suara Capres 3</label>
                                        <div class="col-xl-8">
                                            <input id="capres3" name="capres3" class="form-control" type="number" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="btnUbah">Ubah</button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                            var reloadButton = document.getElementById('btnUbah');
                            // Menambahkan event listener untuk mendengarkan klik tombol
                            reloadButton.addEventListener('click', function() {
                                // Mereload halaman
                                location.reload();
                            });
                            $(document).ready(function() {
                                $('tbody').on('click', '[data-bs-toggle="modal"]', function() {
                                var targetModal = $(this).data('bs-target');

                                if (targetModal === '#ModalUbah') {
                                    var suara = $(this).data('suara');

                                    $('#provinsi').val(suara['provinsi']);
                                    $('#jumlah_suara').val(suara['jumlah_suara']);
                                    $('#capres1').val(suara['capres1']);
                                    $('#capres2').val(suara['capres2']);
                                    $('#capres3').val(suara['capres3']);

                                    $('#btnUbah').click(function() {
                                        var id_suara = suara['id_suara'];
                                        var provinsi = $('#provinsi').val();
                                        var jumlah_suara = $('#jumlah_suara').val();
                                        var capres1 = $('#capres1').val();
                                        var capres2 = $('#capres2').val();
                                        var capres3 = $('#capres3').val();

                                        if (provinsi.trim() == '' || jumlah_suara.trim() == '' || capres1.trim() == '' || capres2.trim() == '' || capres3.trim() == '') {
                                            // Menampilkan alert sesuai dengan pesan yang kosong
                                            if (provinsi.trim() == '') {
                                                alert('Provinsi tidak boleh kosong');
                                            } else if (jumlah_suara.trim() == '') {
                                                alert('Jumlah suara tidak boleh kosong');
                                            } else if (capres1.trim() == '') {
                                                alert('Suara Capres 1 tidak boleh kosong');
                                            } else if (capres2.trim() == '') {
                                                alert('Suara Capres 2 tidak boleh kosong');
                                            } else if (capres3.trim() == '') {
                                                alert('Suara Capres 3 tidak boleh kosong');
                                            }
                                        } else {
                                            $.ajax({
                                                type: 'POST',
                                                url: 'controller.php',
                                                data: {
                                                    action: 'updateSuara',
                                                    id_suara: id_suara,
                                                    provinsi: provinsi,
                                                    jumlah_suara: jumlah_suara,
                                                    capres1: capres1,
                                                    capres2: capres2, 
                                                    capres3: capres3
                                                },
                                                dataType: 'json',
                                            });
                                            alert('Data berhasil diubah');
                                        }
                                    })
                                }
                                });
                            });
                            </script> 
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalHapus" aria-hidden="true" aria-labelledby="ModalHapus" tabindex="-1" data-bs-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalHapus">Yakin akan menghapus?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal" id="btnHapus">Hapus</button>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                              var reloadButton = document.getElementById('btnHapus');
                              // Menambahkan event listener untuk mendengarkan klik tombol
                              reloadButton.addEventListener('click', function() {
                                  // Mereload halaman
                                  location.reload();
                              });
                              $(document).ready(function() {
                                  $('tbody').on('click', '[data-bs-toggle="modal"]', function() {
                                  var targetModal = $(this).data('bs-target');

                                  if (targetModal === '#ModalHapus') {
                                      var id_suara = $(this).data('suara');

                                      $('#btnHapus').click(function() {
                                          $.ajax({
                                              type: 'POST',
                                              url: 'controller.php',
                                              data: {
                                                  action: 'hapusSuara',
                                                  id_suara: id_suara
                                              },
                                              dataType: 'json',
                                          });
                                          alert('Data berhasil dihapus');
                                      })
                                  }
                                  });
                              });
                            </script> 
                            </div>
                        </div>
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

    <script>
        var data = {
            labels: [<?php foreach($rows as $row): ?> "<?= $row['provinsi']  ?>", <?php endforeach; ?>],
            datasets: [{
                label: 'Paslon 1',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: [<?php foreach($rows as $row): ?><?= $row['capres1'] ?>,<?php endforeach; ?>]
            }, {
                label: 'Paslon 2',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: [<?php foreach($rows as $row): ?><?= $row['capres2'] ?>,<?php endforeach; ?>]
            }, {
                label: 'Paslon 3',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: [<?php foreach($rows as $row): ?> <?= $row['capres3'] ?>, <?php endforeach; ?>]
            }]
        };

        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        };


        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });

        // Menyesuaikan ukuran canvas
        document.getElementById('myChart').style.height = '400px';
        document.getElementById('myChart').style.width = '100%';

        function openFormulir() {
            window.location.href = 'formulir.php';
        }

        $(document).ready(function() {
            $('.btnHapus').click(function() {
                var id_suara = $(this).data('suara');

                $.ajax({
                    type: 'POST',
                    url: 'controller.php',
                    data: {
                        action: 'hapusSuara',
                        id_suara: id_suara
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Handle success response here (if needed)
                        console.log(response);
                        alert('Data berhasil dihapus');
                        // Reload halaman untuk memperbarui tabel
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error response here (if needed)
                        console.error(xhr.responseText);
                        alert('Terjadi kesalahan saat menghapus data');
                    }
                });
            });
        });
    </script>
</body>
</html>

?>