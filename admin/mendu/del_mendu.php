<?php
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Pertama, hapus data yang terkait di tabel tb_mendu
    $sql_hapus_mendu = "DELETE FROM tb_mendu WHERE nik='$kode'";
    $query_hapus_mendu = mysqli_query($koneksi, $sql_hapus_mendu);

    // Setelah menghapus data di tb_mendu, hapus data di tb_pdd
    if ($query_hapus_mendu) {
        $sql_hapus = "DELETE FROM tb_pdd WHERE nik='$kode'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>
            Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-mendu';
                }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-mendu';
                }
            })</script>";
        }
    } else {
        echo "<script>
        Swal.fire({title: 'Hapus Data di tb_mendu Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-mendu';
            }
        })</script>";
    }
}
?>
