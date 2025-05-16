<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_kk WHERE no_kk='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

    $karkel = $data_cek['no_kk']; // id_kk dari Data KK yang sedang diproses
    $kepala_terdaftar = $data_cek['kepala']; // Nama Kepala Keluarga yang terdaftar
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-users"></i> Anggota KK
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" class="form-control" id="no_kk" name="no_kk" value="<?php echo $data_cek['no_kk']; ?>" readonly/>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No KK | Kepala Keluarga</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?php echo $data_cek['no_kk']; ?>" readonly/>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="kepala" name="kepala" value="<?php echo $data_cek['kepala']; ?>" readonly/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $data_cek['kalurahan']; ?>, RT <?php echo $data_cek['rt']; ?> RW <?php echo $data_cek['rw']; ?> (<?php echo $data_cek['kec']; ?> - <?php echo $data_cek['kab']; ?> - <?php echo $data_cek['prov']; ?>)" readonly/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Anggota</label>
                <div class="col-sm-4">
                    <select name="nik" id="nik" class="form-control select2bs4" required>
                        <option selected="selected">- Penduduk -</option>
                        <?php
                        // ambil data dari database
                        $query = "select * from tb_pdd where status='Ada'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $row['nik'] ?>">
                            <?php echo $row['nik'] ?>
                            - 
                            <?php echo $row['nama'] ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select name="hubungan" id="hubungan" class="form-control">
                        <option>- Hub Keluarga -</option>
                        <option>Kepala Keluarga</option>
                        <option>Istri</option>
                        <option>Anak</option>
                    </select>
                </div>
                <input type="submit" name="Simpan" value="Tambah" class="btn btn-success">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis kelamin</th>
                                <th>Hub Keluarga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT p.nik, p.nama, p.jekel, a.hubungan, a.id_anggota 
                            from tb_pdd p inner join tb_anggota a on p.nik=a.nik where status='Ada' and no_kk=$karkel");
                            while ($data= $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $data['nik']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['jekel']; ?></td>
                                <td><?php echo $data['hubungan']; ?></td>
                                <td>
                                    <a href="?page=del-anggota&kode=<?php echo $data['id_anggota']; ?>&kk=<?php echo $karkel; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="?page=data-kartu" title="Kembali" class="btn btn-warning">Kembali</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    // Cek apakah anggota sudah terdaftar di keluarga yang sama atau di keluarga lain
    $cek_anggota_terdaftar = "SELECT * FROM tb_anggota WHERE nik = '".$_POST['nik']."'";
    $result_cek_anggota_terdaftar = mysqli_query($koneksi, $cek_anggota_terdaftar);

    if (mysqli_num_rows($result_cek_anggota_terdaftar) > 0) {
        // Cek apakah anggota tersebut sudah terdaftar di KK yang sama
        $data_cek = mysqli_fetch_array($result_cek_anggota_terdaftar);
        if ($data_cek['no_kk'] == $_POST['no_kk']) {
            // Jika anggota sudah terdaftar di keluarga yang sama
            echo "<script>
            Swal.fire({
                title: 'Anggota Sudah Terdaftar', 
                text: 'Anggota ini sudah terdaftar di keluarga ini.', 
                icon: 'warning', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=anggota&kode=".$_POST['no_kk']."';
                }
            })</script>";
        } else {
            // Jika anggota sudah terdaftar di keluarga lain
            echo "<script>
            Swal.fire({
                title: 'Anggota Sudah Terdaftar', 
                text: 'Anggota ini sudah terdaftar di keluarga lain.', 
                icon: 'error', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=anggota&kode=".$_POST['no_kk']."';
                }
            })</script>";
        }
    } else {
        // Cek jika Kepala Keluarga ingin menjadi Istri atau Anak
        if ($_POST['hubungan'] != 'Kepala Keluarga') {
            // Cek apakah yang dipilih sebagai anggota adalah Kepala Keluarga yang sudah terdaftar
            $cek_kepala_terdaftar = "SELECT * FROM tb_pdd WHERE nik = '".$_POST['nik']."' AND nama = '".$kepala_terdaftar."'"; 
            $result_kepala_terdaftar = mysqli_query($koneksi, $cek_kepala_terdaftar);

            if (mysqli_num_rows($result_kepala_terdaftar) > 0) {
                // Jika Kepala Keluarga yang sudah terdaftar memilih menjadi Anak atau Istri
                echo "<script>
                Swal.fire({
                    title: 'Kepala Keluarga Tidak Bisa Menjadi Anak atau Istri', 
                    text: 'Kepala Keluarga yang sudah terdaftar hanya bisa menjadi Kepala Keluarga.', 
                    icon: 'error', 
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value){
                        window.location = 'index.php?page=anggota&kode=".$_POST['no_kk']."';
                    }
                })</script>";
                exit(); // Menghentikan proses jika Kepala Keluarga mencoba menjadi Anak atau Istri
            }

            // Jika hubungan yang dipilih adalah 'Istri', cek jenis kelamin (jekel) anggota
            if ($_POST['hubungan'] == 'Istri') {
                // Ambil data jenis kelamin anggota yang dipilih
                $cek_jenis_kelamin = "SELECT jekel FROM tb_pdd WHERE nik = '".$_POST['nik']."'";
                $result_cek_jenis_kelamin = mysqli_query($koneksi, $cek_jenis_kelamin);
                $data_jenis_kelamin = mysqli_fetch_array($result_cek_jenis_kelamin);

                // Jika jenis kelamin bukan Perempuan (PR), tampilkan pesan error
                if ($data_jenis_kelamin['jekel'] != 'PR') {
                    echo "<script>
                    Swal.fire({
                        title: 'Jenis Kelamin Tidak Sesuai', 
                        text: 'Hanya penduduk dengan jenis kelamin Perempuan yang dapat menjadi Istri.', 
                        icon: 'error', 
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value){
                            window.location = 'index.php?page=anggota&kode=".$_POST['no_kk']."';
                        }
                    })</script>";
                    exit(); // Menghentikan proses jika jenis kelamin bukan perempuan
                }

                // Cek apakah sudah ada istri di keluarga yang sama
                $cek_istri = "SELECT * FROM tb_anggota WHERE no_kk = '".$_POST['no_kk']."' AND hubungan = 'Istri'";
                $result_cek_istri = mysqli_query($koneksi, $cek_istri);

                // Jika sudah ada istri, tampilkan peringatan
                if (mysqli_num_rows($result_cek_istri) > 0) {
                    echo "<script>
                    Swal.fire({
                        title: 'Istri Sudah Ada', 
                        text: 'Keluarga ini sudah memiliki satu istri.', 
                        icon: 'error', 
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value){
                            window.location = 'index.php?page=anggota&kode=".$_POST['no_kk']."';
                        }
                    })</script>";
                    exit(); // Menghentikan proses jika sudah ada istri
                }
            }
        }

        // Jika tidak ada duplikat, lanjutkan proses simpan data
        $sql_simpan = "INSERT INTO tb_anggota (no_kk, nik, hubungan) VALUES (
            '".$_POST['no_kk']."',
            '".$_POST['nik']."',
            '".$_POST['hubungan']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

        if ($query_simpan) {
            echo "<script>
            Swal.fire({
                title: 'Tambah Data Berhasil', 
                icon: 'success', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=anggota&kode=".$_POST['no_kk']."';
                }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({
                title: 'Tambah Data Gagal', 
                icon: 'error', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=anggota&kode=".$_POST['no_kk']."';
                }
            })</script>";
        }
    }
}
?>