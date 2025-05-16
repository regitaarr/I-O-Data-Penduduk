<?php
if(isset($_GET['kode'])){
    // First, delete related records in tb_datang
    $sql_delete_related = "DELETE FROM tb_datang WHERE pelapor='".$_GET['kode']."'";
    $query_delete_related = mysqli_query($koneksi, $sql_delete_related);

    // Now delete from tb_pdd
    $sql_hapus = "DELETE FROM tb_pdd WHERE nik='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pend';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pend';
            }
        })</script>";
    }
}
?>
