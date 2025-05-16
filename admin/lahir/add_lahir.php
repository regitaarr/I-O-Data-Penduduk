<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

		<div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="XXXXXXXXXXXXXXXX" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Bayi" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="tgl_lh" name="tgl_lh" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-3">
                    <select name="jekel" id="jekel" class="form-control">
                        <option>- Pilih -</option>
                        <option>LK</option>
                        <option>PR</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keluarga</label>
                <div class="col-sm-6">
                    <select name="no_kk" id="no_kk" class="form-control select2bs4" required>
                        <option selected="selected">- Pilih KK -</option>
                        <?php
                        // ambil data dari database
                        $query = "select * from tb_kk";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $row['no_kk'] ?>">
                            <?php echo $row['no_kk'] ?>
                            -
                            <?php echo $row['kepala'] ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
                <a href="?page=data-lahir" title="Kembali" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['Simpan'])) {
        // Ambil nilai NIK dari input
        $nik = $_POST['nik'];

        // Cek apakah NIK hanya berisi angka
        if (!is_numeric($nik)) {
            // Jika NIK bukan angka, tampilkan peringatan
            echo "<script>
            Swal.fire({
                title: 'NIK Harus Berupa Angka', 
                text: '', 
                icon: 'error', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=add-lahir';
                }
            })</script>";
        }
        // Cek apakah NIK kurang dari 16 digit
        elseif (strlen($nik) < 16) {
            // Jika NIK kurang dari 16 digit, tampilkan peringatan
            echo "<script>
            Swal.fire({
                title: 'NIK Tidak Boleh Kurang Dari 16 Digit', 
                text: '', 
                icon: 'error', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=add-lahir';
                }
            })</script>";
        } 
        // Cek apakah NIK lebih dari 16 digit
        elseif (strlen($nik) > 16) {
            echo "<script>
            Swal.fire({
                title: 'NIK Tidak Boleh Lebih Dari 16 Digit', 
                text: '', 
                icon: 'error', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=add-lahir';
                }
            })</script>";
        } else {
            // Validasi input, cek jika ada field yang kosong
            if (empty($nik) || empty($_POST['nik']) || empty($_POST['nama']) || empty($_POST['tgl_lh']) || empty($_POST['jekel']) || empty($_POST['no_kk'])) {
                echo "<script>
                Swal.fire({
                    title: 'Semua field harus diisi!', 
                    text: '', 
                    icon: 'error', 
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value){
                        window.location = 'index.php?page=add-lahir';
                    }
                })</script>";
            } else {
                // Cek apakah NIK sudah ada dalam database
                $cek_nik = "SELECT * FROM tb_lahir WHERE nik = '$nik'";
                $result_cek = mysqli_query($koneksi, $cek_nik);

                if (mysqli_num_rows($result_cek) > 0) {
                    // Jika NIK sudah ada, tampilkan peringatan
                    echo "<script>
                    Swal.fire({
                        title: 'NIK Sudah Terdaftar', 
                        text: 'NIK ini sudah ada dalam database.', 
                        icon: 'error', 
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value){
                            window.location = 'index.php?page=add-lahir';
                        }
                    })</script>";
                } else {
                    //mulai proses simpan data
                    $sql_simpan = "INSERT INTO tb_lahir (nik, nama, tgl_lh, jekel, no_kk) VALUES (
						'".$_POST['nik']."',
                        '".$_POST['nama']."',
                        '".$_POST['tgl_lh']."',
                        '".$_POST['jekel']."',
                        '".$_POST['no_kk']."')";
                    $query_simpan = mysqli_query($koneksi, $sql_simpan);
                    mysqli_close($koneksi);

                    if ($query_simpan) {
                        echo "<script>
                        Swal.fire({
                            title: 'Tambah Data Berhasil',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value){
                                window.location = 'index.php?page=data-lahir';
                            }
                        })</script>";
                    } else {
                        echo "<script>
                        Swal.fire({
                            title: 'Tambah Data Gagal',
                            text: '',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value){
                                window.location = 'index.php?page=add-lahir';
                            }
                        })</script>";
                    }
                }
            }
        }
    }
    ?>
