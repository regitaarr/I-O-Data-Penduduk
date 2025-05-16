<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No KK</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="XXXXXXXXXXXXXXXX" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kepala Keluarga</label>
                <div class="col-sm-4">
                    <select name="kepala" id="kepala" class="form-control select2bs4" required>
                        <option selected="selected">- Penduduk -</option>
                        <?php
                        // ambil data dari database
                        $query = "select * from tb_pdd where status='Ada'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $row['nik'] ?>">
                            <?php echo $row['nik'] ?>
                            _ 
                            <?php echo $row['nama'] ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kalurahan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="kalurahan" name="kalurahan" placeholder="Kalurahan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">RT/RW</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kecamatan</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="kec" name="kec" placeholder="Kecamatan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kabupaten</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="kab" name="kab" placeholder="Kabupaten" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Provinsi</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi" required>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
            <a href="?page=data-kartu" title="Kembali" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['Simpan'])) {
    // Ambil nilai dari form
    $no_kk = $_POST['no_kk'];
    $kepala = $_POST['kepala'];

    // Cek apakah No KK kurang dari atau lebih dari 16 digit
    if (strlen($no_kk) != 16) {
        echo "<script>
        Swal.fire({
            title: 'No KK Harus 16 Digit', 
            text: '', 
            icon: 'error', 
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value){
                window.location = 'index.php?page=add-kartu'; 
            }
        })</script>";
    } 
    // Cek apakah No KK berupa angka
    else if (!is_numeric($no_kk)) {
        echo "<script>
        Swal.fire({
            title: 'No KK Harus Berupa Angka', 
            text: '', 
            icon: 'error', 
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value){
                window.location = 'index.php?page=add-kartu'; 
            }
        })</script>";
    } else {
        // Cek apakah No KK sudah ada di database
        $stmt = $koneksi->prepare("SELECT * FROM tb_kk WHERE no_kk = ?");
        $stmt->bind_param("s", $no_kk);
        $stmt->execute();
        $result_cek_kk = $stmt->get_result();

        if ($result_cek_kk->num_rows > 0) {
            // Jika No KK sudah ada, tampilkan peringatan
            echo "<script>
            Swal.fire({
                title: 'No KK Sudah Terdaftar', 
                text: 'No KK ini sudah ada dalam database.', 
                icon: 'error', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=add-kartu'; 
                }
            })</script>";
        } else {
            // Cek apakah Kepala Keluarga ada di database
            $stmt_kepala = $koneksi->prepare("SELECT nama FROM tb_pdd WHERE nik = ?");
            $stmt_kepala->bind_param("s", $kepala);
            $stmt_kepala->execute();
            $result_kepala = $stmt_kepala->get_result();

            if ($result_kepala->num_rows == 0) {
                echo "<script>
                Swal.fire({
                    title: 'Kepala Keluarga Tidak Terdaftar', 
                    text: 'Kepala Keluarga ini harus terdaftar di database terlebih dahulu.', 
                    icon: 'error', 
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value){
                        window.location = 'index.php?page=add-kartu'; 
                    }
                })</script>";
            } else {
                // Cek apakah Kepala Keluarga sudah terdaftar dalam hubungan di KK lain
                $stmt_cek_hubungan = $koneksi->prepare("SELECT hubungan FROM tb_anggota WHERE nik = ?");
                $stmt_cek_hubungan->bind_param("s", $kepala);
                $stmt_cek_hubungan->execute();
                $result_cek_hubungan = $stmt_cek_hubungan->get_result();

                if ($result_cek_hubungan->num_rows > 0) {
                    // Jika Kepala Keluarga sudah terdaftar dalam KK lain, tampilkan peringatan
                    echo "<script>
                    Swal.fire({
                        title: 'Kepala Keluarga Sudah Terdaftar dalam KK Lain', 
                        text: 'Anggota ini sudah terdaftar sebagai anggota dalam KK lain, tidak bisa dijadikan Kepala Keluarga.', 
                        icon: 'error', 
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value){
                            window.location = 'index.php?page=add-kartu'; 
                        }
                    })</script>";
                } else {
                    // Ambil nama kepala keluarga dari hasil query
                    $row_kepala = $result_kepala->fetch_assoc();
                    $nama_kepala = $row_kepala['nama'];

                    // Gabungkan NIK dan Nama kepala keluarga
                    $nik_nama_kepala = $kepala . " _ " . $nama_kepala; // Format: "NIK - Nama"

                    // Simpan data ke dalam database
                    $sql_simpan = "INSERT INTO tb_kk (no_kk, kepala, kalurahan, rt, rw, kec, kab, prov) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt_simpan = $koneksi->prepare($sql_simpan);
                    $stmt_simpan->bind_param("ssssssss", $no_kk, $nik_nama_kepala, $_POST['kalurahan'], $_POST['rt'], $_POST['rw'], $_POST['kec'], $_POST['kab'], $_POST['prov']);
                    $stmt_simpan->execute();

                    if ($stmt_simpan->affected_rows > 0) {
                        echo "<script>
                        Swal.fire({
                            title: 'Tambah Data Berhasil', 
                            text: '', 
                            icon: 'success', 
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value){
                                window.location = 'index.php?page=data-kartu'; 
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
                                window.location = 'index.php?page=add-kartu'; 
                            }
                        })</script>";
                    }
                }
            }
        }
    }
}
?>