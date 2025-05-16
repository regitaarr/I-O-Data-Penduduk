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
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penduduk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir" required>
				</div>
				<div class="col-sm-2">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option>-- Pilih Jenis Kelamin --</option>
						<option>LK</option>
						<option>PR</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pedukuhan</label>
				<div class="col-sm-3">
				<select name="pedukuhan" id="pedukuhan" class="form-control">
						<option>-- Pilih Pedukuhan --</option>
						<option>Jetis</option>
						<option>Gedongan</option>
						<option>Ngaglik</option>
						<option>Kragilan</option>
						<option>Rogoyudan</option>
						<option>Patran</option>
						<option>Kutuasem</option>
						<option>Jombor Lor</option>
						<option>Jombor Kidul</option>
						<option>Kutu Tegal</option>
						<option>Kutu Dukuh</option>
						<option>Mesan Blunyah</option>
						<option>Karangjati</option>
						<option>Gemawang</option>
						<option>Pogung Lor</option>
						<option>Pogung Kidul</option>
						<option>Sendowo</option>
						<option>Purwosari</option>
					</select>
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
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-3">
					<select name="agama" id="agama" class="form-control">
						<option>-- Pilih Agama --</option>
						<option>Islam</option>
						<option>Kristen</option>
						<option>Katolik</option>
						<option>Hindu</option>
						<option>Budha</option>
						<option>Konghucu</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Pernikahan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option>-- Pilih Status --</option>
						<option>Sudah Menikah</option>
						<option>Belum Menikah</option>
						<option>Cerai Mati</option>
						<option>Cerai Hidup</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-3">
					<select name="pekerjaan" id="pekerjaan" class="form-control">
						<option>-- Pilih Pekerjaan --</option>
						<option>Tidak Bekerja</option>
						<option>Pelajar</option>
						<option>Mahasiswa</option>
						<option>Wiraswasta</option>
						<option>Wirausaha</option>
						<option>Buruh</option>
						<option>Guru</option>
						<option>PNS</option>
						<option>Pensiunan</option>
						<option>Perangkat Desa</option>
						<option>TKI</option>
						<option>Lainnya</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
			<a href="?page=data-pend" title="Kembali" class="btn btn-danger">Batal</a>
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
                window.location = 'index.php?page=add-pend';
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
                window.location = 'index.php?page=add-pend';
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
                window.location = 'index.php?page=add-pend';
            }
        })</script>";
    } else {
        // Validasi input, cek jika ada field yang kosong
        if (empty($nik) || empty($_POST['nama']) || empty($_POST['tempat_lh']) || empty($_POST['tgl_lh']) || empty($_POST['jekel']) || empty($_POST['pedukuhan']) || empty($_POST['rt']) || empty($_POST['rw']) || empty($_POST['agama']) || empty($_POST['kawin']) || empty($_POST['pekerjaan'])) {
            echo "<script>
            Swal.fire({
                title: 'Semua field harus diisi!', 
                text: '', 
                icon: 'error', 
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value){
                    window.location = 'index.php?page=add-pend';
                }
            })</script>";
        } else {
            // Cek apakah NIK sudah ada dalam database
            $cek_nik = "SELECT * FROM tb_pdd WHERE nik = '$nik'";
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
                        window.location = 'index.php?page=add-pend';
                    }
                })</script>";
            } else {
                // Mulai proses simpan data
                $sql_simpan = "INSERT INTO tb_pdd (nik, nama, tempat_lh, tgl_lh, jekel, pedukuhan, rt, rw, agama, kawin, pekerjaan, status) 
                VALUES (
                    '".$_POST['nik']."',
                    '".$_POST['nama']."',
                    '".$_POST['tempat_lh']."',
                    '".$_POST['tgl_lh']."',
                    '".$_POST['jekel']."',
                    '".$_POST['pedukuhan']."',
                    '".$_POST['rt']."',
                    '".$_POST['rw']."',
                    '".$_POST['agama']."',
                    '".$_POST['kawin']."',
                    '".$_POST['pekerjaan']."',
                    'Ada'
                )";

                // Eksekusi query
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
                            window.location = 'index.php?page=data-pend';
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
                            window.location = 'index.php?page=add-pend';
                        }
                    })</script>";
                }
            }
        }
    }
}
?>