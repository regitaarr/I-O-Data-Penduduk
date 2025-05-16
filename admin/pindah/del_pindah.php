<?php
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];

    // Hapus data yang bergantung di tb_anggota terlebih dahulu
    $sql_hapus_anggota = "DELETE FROM tb_anggota WHERE nik='$kode'";
    $query_hapus_anggota = mysqli_query($koneksi, $sql_hapus_anggota);

    // Hapus data yang bergantung di tb_pindah setelah itu
    $sql_hapus_pindah = "DELETE FROM tb_pindah WHERE nik='$kode'";
    $query_hapus_pindah = mysqli_query($koneksi, $sql_hapus_pindah);

    // Setelah menghapus data di tb_pindah dan tb_anggota, hapus data di tb_pdd
    if ($query_hapus_pindah && $query_hapus_anggota) {
        $sql_hapus = "DELETE FROM tb_pdd WHERE nik='$kode'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>
            Swal.fire({
                title: 'Hapus Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pindah';
                }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({
                title: 'Hapus Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pindah';
                }
            })</script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'Hapus Data di tb_pindah atau tb_anggota Gagal',
            text: '',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pindah';
            }
        })</script>";
    }
}
?>
