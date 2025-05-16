<?php 
if (isset($_GET['kode'])) {
    try {
        // 1. Hapus data dari tb_lahir
        $sql_hapus_lahir = "DELETE FROM tb_lahir WHERE no_kk = '" . $_GET['kode'] . "'";
        $query_hapus_lahir = mysqli_query($koneksi, $sql_hapus_lahir);
        
        // 2. Hapus data dari tb_anggota
        $sql_hapus_anggota = "DELETE FROM tb_anggota WHERE no_kk = '" . $_GET['kode'] . "'";
        $query_hapus_anggota = mysqli_query($koneksi, $sql_hapus_anggota);
        
        // 3. Terakhir hapus data dari tb_kk
        $sql_hapus = "DELETE FROM tb_kk WHERE no_kk = '" . $_GET['kode'] . "'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);
        
        echo "<script>
            Swal.fire({title: 'Hapus Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-kartu';
                }
            })</script>";
            
    } catch (mysqli_sql_exception $e) {
        echo "<script>
            Swal.fire({title: 'Hapus Data Gagal', text: 'Terjadi kesalahan dalam proses penghapusan', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-kartu';
                }
            })</script>";
    }
}
?>