<?php
include "inc/koneksi.php";

// Query untuk mengambil data jumlah penduduk
$sql = $koneksi->query("SELECT COUNT(nik) as pend FROM tb_pdd WHERE status='Ada'");
while ($data = $sql->fetch_assoc()) {
    $pend = $data['pend'];
}

// Query untuk mengambil data jumlah kartu keluarga
$sql = $koneksi->query("SELECT COUNT(no_kk) as kartu FROM tb_kk");
while ($data = $sql->fetch_assoc()) {
    $kartu = $data['kartu'];
}

// Query untuk menghitung jumlah perempuan dari tabel tb_pdd
$sql = $koneksi->query("SELECT COUNT(nik) as prem FROM tb_pdd WHERE jekel='PR'AND status = 'Ada'");
while ($data = $sql->fetch_assoc()) {
    $prem_pdd = $data['prem'];
}

// Query untuk menghitung jumlah laki-laki dari tabel tb_pdd
$sql = $koneksi->query("SELECT COUNT(nik) as laki FROM tb_pdd WHERE jekel='LK'AND status = 'Ada'");
while ($data = $sql->fetch_assoc()) {
    $laki_pdd = $data['laki'];
}

// Query untuk menghitung jumlah perempuan dari tabel tb_lahir
$sql = $koneksi->query("SELECT COUNT(nik) as prem FROM tb_lahir WHERE jekel='PR'");
while ($data = $sql->fetch_assoc()) {
    $prem_lahir = $data['prem'];
}

// Query untuk menghitung jumlah laki-laki dari tabel tb_lahir
$sql = $koneksi->query("SELECT COUNT(nik) as laki FROM tb_lahir WHERE jekel='LK'");
while ($data = $sql->fetch_assoc()) {
    $laki_lahir = $data['laki'];
}

// Query untuk menghitung jumlah perempuan dari tabel tb_datang
$sql = $koneksi->query("SELECT COUNT(id_datang) as prem FROM tb_datang WHERE jekel='PR'");
while ($data = $sql->fetch_assoc()) {
    $prem_datang = $data['prem'];
}

// Query untuk menghitung jumlah laki-laki dari tabel tb_datang
$sql = $koneksi->query("SELECT COUNT(id_datang) as laki FROM tb_datang WHERE jekel='LK'");
while ($data = $sql->fetch_assoc()) {
    $laki_datang = $data['laki'];
}

// Menghitung total jumlah perempuan (tb_pdd + tb_lahir + tb_datang)
$total_prem = $prem_pdd + $prem_lahir + $prem_datang;

// Menghitung total jumlah laki-laki (tb_pdd + tb_lahir + tb_datang)
$total_laki = $laki_pdd + $laki_lahir + $laki_datang;


// Query untuk mengambil data jumlah lahir
$sql = $koneksi->query("SELECT COUNT(nik) as lahir FROM tb_lahir");
while ($data = $sql->fetch_assoc()) {
    $lahir = $data['lahir'];
}

// Query untuk mengambil data jumlah meninggal
$sql = $koneksi->query("SELECT COUNT(id_mendu) as mendu FROM tb_mendu");
while ($data = $sql->fetch_assoc()) {
    $mendu = $data['mendu'];
}

// Query untuk mengambil data jumlah pendatang
$sql = $koneksi->query("SELECT COUNT(id_datang) as datang FROM tb_datang");
while ($data = $sql->fetch_assoc()) {
    $datang = $data['datang'];
}

// Query untuk mengambil data jumlah pindah
$sql = $koneksi->query("SELECT COUNT(id_pindah) as pindah FROM tb_pindah");
while ($data = $sql->fetch_assoc()) {
    $pindah = $data['pindah'];
}

// Menghitung jumlah penduduk yang terupdate (kelahiran + pendatang - kematian - pindah)
$pend_updated = $total_laki + $total_prem;

// Query untuk data kelahiran per tahun
$lahir_tahunan = [];
$sql = $koneksi->query("SELECT YEAR(tgl_lh) as tahun, COUNT(nik) as jumlah 
                       FROM tb_lahir 
                       GROUP BY YEAR(tgl_lh) 
                       ORDER BY tahun");
while ($data = $sql->fetch_assoc()) {
    $lahir_tahunan[$data['tahun']] = $data['jumlah'];
}

// Query untuk data kematian per tahun
$mendu_tahunan = [];
$sql = $koneksi->query("SELECT YEAR(tgl_mendu) as tahun, COUNT(id_mendu) as jumlah 
                       FROM tb_mendu 
                       GROUP BY YEAR(tgl_mendu) 
                       ORDER BY tahun");
while ($data = $sql->fetch_assoc()) {
    $mendu_tahunan[$data['tahun']] = $data['jumlah'];
}

// Query untuk data pendatang per tahun
$datang_tahunan = [];
$sql = $koneksi->query("SELECT YEAR(tgl_datang) as tahun, COUNT(id_datang) as jumlah 
                       FROM tb_datang 
                       GROUP BY YEAR(tgl_datang) 
                       ORDER BY tahun");
while ($data = $sql->fetch_assoc()) {
    $datang_tahunan[$data['tahun']] = $data['jumlah'];
}

// Query untuk data pindah per tahun
$pindah_tahunan = [];
$sql = $koneksi->query("SELECT YEAR(tgl_pindah) as tahun, COUNT(id_pindah) as jumlah 
                       FROM tb_pindah 
                       GROUP BY YEAR(tgl_pindah) 
                       ORDER BY tahun");
while ($data = $sql->fetch_assoc()) {
    $pindah_tahunan[$data['tahun']] = $data['jumlah'];
}

// Query untuk data jenis kelamin
$sql = $koneksi->query("SELECT jekel, COUNT(nik) as jumlah 
                       FROM tb_pdd 
                       WHERE status='Ada' 
                       GROUP BY jekel");
$jekel_data = [];
while ($data = $sql->fetch_assoc()) {
    $jekel_data[$data['jekel']] = $data['jumlah'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <style>
		      /* Sidebar dengan warna biru dan font putih tebal */
		.main-sidebar {
			background-color: #007bff; /* Warna biru */
		}

		.main-sidebar .nav-link {
			color: white !important; /* Warna teks putih */
			font-weight: bold; /* Membuat font tebal */
		}

		/* Mengubah warna ikon menjadi putih */
		.main-sidebar .nav-icon {
			color: white !important;
		}

		/* Mengubah warna teks saat item sidebar aktif */
		.main-sidebar .nav-link.active {
			color: #ffc107 !important; /* Warna teks aktif (kuning) */
		}
		/* Mengubah warna font menjadi putih dan tebal pada brand-text */
		.brand-text {
			color: white !important;   /* Membuat warna font putih */
			font-weight: bold !important; /* Membuat font tebal */
		}
		/* Mengubah warna font menjadi putih dan tebal pada link di dalam div info */
		.info a {
			color: white !important;   /* Membuat warna font putih */
			font-weight: bold !important; /* Membuat font tebal */
		}
        .chart-container {
            padding: 20px;
            margin-bottom: 30px;
        }

        .chart-wrapper {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .small-box {
            margin-bottom: 20px;
        }
    </style>
</head>
</head>
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $pend_updated; ?></h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $kartu; ?></h3>
                        <p>Kartu Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-address-card"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?php echo $total_laki; ?></h3>
                        <p>Laki-laki</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-male"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-pink">
                    <div class="inner">
                        <h3><?php echo $total_prem; ?></h3>
                        <p>Perempuan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-female"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $lahir; ?></h3>
                        <p>Kelahiran</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-baby"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $mendu; ?></h3>
                        <p>Meninggal</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book-dead"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-olive">
                    <div class="inner">
                        <h3><?php echo $datang; ?></h3>
                        <p>Pendatang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-people-arrows"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?php echo $pindah; ?></h3>
                        <p>Pindah</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-walking"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row">
            <!-- Grafik Kelahiran -->
            <div class="col-md-6 chart-container">
                <div class="chart-wrapper">
                    <canvas id="chartKelahiran"></canvas>
                </div>
            </div>

            <!-- Grafik Kematian -->
            <div class="col-md-6 chart-container">
                <div class="chart-wrapper">
                    <canvas id="chartKematian"></canvas>
                </div>
            </div>

            <!-- Grafik Pendatang -->
            <div class="col-md-6 chart-container">
                <div class="chart-wrapper">
                    <canvas id="chartPendatang"></canvas>
                </div>
            </div>

            <!-- Grafik Pindah -->
            <div class="col-md-6 chart-container">
                <div class="chart-wrapper">
                    <canvas id="chartPindah"></canvas>
                </div>
            </div>

        </div>
    </div>
</section>


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Function to create line chart
        function createLineChart(canvasId, label, labels, data, color) {
            const ctx = document.getElementById(canvasId).getContext('2d');
            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: data,
                        borderColor: color,
                        backgroundColor: color.replace('1)', '0.2)'),
                        tension: 0.1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: `Statistik ${label} per Tahun`,
                            font: {
                                size: 16
                            }
                        },
                        legend: {
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        }

        // Create line charts
        createLineChart(
            'chartKelahiran',
            'Kelahiran',
            <?php echo json_encode(array_keys($lahir_tahunan)); ?>,
            <?php echo json_encode(array_values($lahir_tahunan)); ?>,
            'rgba(75, 192, 192, 1)'
        );

        createLineChart(
            'chartKematian',
            'Kematian',
            <?php echo json_encode(array_keys($mendu_tahunan)); ?>,
            <?php echo json_encode(array_values($mendu_tahunan)); ?>,
            'rgba(255, 99, 132, 1)'
        );

        createLineChart(
            'chartPendatang',
            'Pendatang',
            <?php echo json_encode(array_keys($datang_tahunan)); ?>,
            <?php echo json_encode(array_values($datang_tahunan)); ?>,
            'rgba(54, 162, 235, 1)'
        );

        createLineChart(
            'chartPindah',
            'Pindah',
            <?php echo json_encode(array_keys($pindah_tahunan)); ?>,
            <?php echo json_encode(array_values($pindah_tahunan)); ?>,
            'rgba(255, 159, 64, 1)'
        );
    </script>
</body>
</html>