<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pdd WHERE nik='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lh']; ?>"
					/>
				</div>
				<div class="col-sm-2">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih Jenis Kelamin --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "LK") echo "<option value='LK' selected>LK</option>";
                else echo "<option value='LK'>LK</option>";

                if ($data_cek['jekel'] == "PR") echo "<option value='PR' selected>PR</option>";
                else echo "<option value='PR'>PR</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pedukuhan</label>
				<div class="col-sm-3">
					<select name="pedukuhan" id="pedukuhan" class="form-control">
						<option value="">-- Pilih Pedukuhan --</option>
						<?php
				if ($data_cek['pedukuhan'] == "Jetis") echo "<option value='Jetis' selected>Jetis</option>";
				else echo "<option value='Jetis'>Jetis</option>";

				if ($data_cek['pedukuhan'] == "Gedongan") echo "<option value='Gedongan' selected>Gedongan</option>";
				else echo "<option value='Gedongan'>Gedongan</option>";

				if ($data_cek['pedukuhan'] == "Ngaglik") echo "<option value='Ngaglik' selected>Ngaglik</option>";
				else echo "<option value='Ngaglik'>Ngaglik</option>";

				if ($data_cek['pedukuhan'] == "Kragilan") echo "<option value='Kragilan' selected>Kragilan</option>";
				else echo "<option value='Kragilan'>Kragilan</option>";

				if ($data_cek['pedukuhan'] == "Rogoyudan") echo "<option value='Rogoyudan' selected>Rogoyudan</option>";
				else echo "<option value='Rogoyudan'>Rogoyudan</option>";

				if ($data_cek['pedukuhan'] == "Patran") echo "<option value='Patran' selected>Patran</option>";
				else echo "<option value='Patran'>Patran</option>";

				if ($data_cek['pedukuhan'] == "Kutuasem") echo "<option value='Kutuasem' selected>Kutuasem</option>";
				else echo "<option value='Kutuasem'>Kutuasem</option>";

				if ($data_cek['pedukuhan'] == "Jombor Lor") echo "<option value='Jombor Lor' selected>Jombor Lor</option>";
				else echo "<option value='Jombor Lor'>Jombor Lor</option>";

				if ($data_cek['pedukuhan'] == "Jombor Kidul") echo "<option value='Jombor Kidul' selected>Jombor Kidul</option>";
				else echo "<option value='Jombor Kidul'>Jombor Kidul</option>";

				if ($data_cek['pedukuhan'] == "Kutu Tegal") echo "<option value='Kutu Tegal' selected>Kutu Tegal</option>";
				else echo "<option value='Kutu Tegal'>Kutu Tegal</option>";

				if ($data_cek['pedukuhan'] == "Kutu Dukuh") echo "<option value='Kutu Dukuh' selected>Kutu Dukuh</option>";
				else echo "<option value='Kutu Dukuh'>Kutu Dukuh</option>";

				if ($data_cek['pedukuhan'] == "Mesan Blunyah") echo "<option value='Mesan Blunyah' selected>Mesan Blunyah</option>";
				else echo "<option value='Mesan Blunyah'>Mesan Blunyah</option>";

				if ($data_cek['pedukuhan'] == "Karangjati") echo "<option value='Karangjati' selected>Karangjati</option>";
				else echo "<option value='Karangjati'>Karangjati</option>";

				if ($data_cek['pedukuhan'] == "Gemawang") echo "<option value='Gemawang' selected>Gemawang</option>";
				else echo "<option value='Gemawang'>Gemawang</option>";

				if ($data_cek['pedukuhan'] == "Pogung Lor") echo "<option value='Pogung Lor' selected>Pogung Lor</option>";
				else echo "<option value='Pogung Lor'>Pogung Lor</option>";

				if ($data_cek['pedukuhan'] == "Pogung Kidul") echo "<option value='Pogung Kidul' selected>Pogung Kidul</option>";
				else echo "<option value='Pogung Kidul'>Pogung Kidul</option>";

				if ($data_cek['pedukuhan'] == "Sendowo") echo "<option value='Sendowo' selected>Sendowo</option>";
				else echo "<option value='Sendowo'>Sendowo</option>";

				if ($data_cek['pedukuhan'] == "Purwosari") echo "<option value='Purwosari' selected>Purwosari</option>";
				else echo "<option value='Purwosari'>Purwosari</option>";
			?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>"
					/>
				</div>
				<div class="col-sm-1">
					<input type="text" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-3">
					<select name="agama" id="agama" class="form-control">
						<option value="">-- Pilih Agama --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['agama'] == "Islam") echo "<option value='Islam' selected>Islam</option>";
                else echo "<option value='Islam'>Islam</option>";

                if ($data_cek['agama'] == "Kristen") echo "<option value='Kristen' selected>Kristen</option>";
				else echo "<option value='Kristen'>Kristen</option>";
				
				if ($data_cek['agama'] == "Katolik") echo "<option value='Katolik' selected>Katolik</option>";
                else echo "<option value='Katolik'>Katolik</option>";

                if ($data_cek['agama'] == "Hindu") echo "<option value='Hindu' selected>Hindu</option>";
                else echo "<option value='Hindu'>Hindu</option>";

				if ($data_cek['agama'] == "Budha") echo "<option value='Budha' selected>Budha</option>";
                else echo "<option value='Budha'>Budha</option>";

				if ($data_cek['agama'] == "Konghucu") echo "<option value='Konghucu' selected>Konghucu</option>";
                else echo "<option value='Konghucu'>Konghucu</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Pernikahan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option value="">-- Pilih Status --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['kawin'] == "Sudah Menikah") echo "<option value='Sudah Menikah' selected>Sudah Menikah</option>";
                else echo "<option value='Sudah Menikah'>Sudah Menikah</option>";

                if ($data_cek['kawin'] == "Belum Menikah") echo "<option value='Belum Menikah' selected>Belum Menikah</option>";
				else echo "<option value='Belum Menikah'>Belum Menikah</option>";
				
				if ($data_cek['kawin'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
                else echo "<option value='Cerai Mati'>Cerai Mati</option>";

                if ($data_cek['kawin'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
                else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-3">
					<select name="pekerjaan" id="pekerjaan" class="form-control">
						<option value="">-- Pilih Pekerjaan --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['pekerjaan'] == "Tidak Bekerja") echo "<option value='Tidak Bekerja' selected>Tidak Bekerja</option>";
                else echo "<option value='Tidak Bekerja'>Tidak Bekerja</option>";

                if ($data_cek['pekerjaan'] == "Pelajar") echo "<option value='Pelajar' selected>Pelajar</option>";
				else echo "<option value='Pelajar'>Pelajar</option>";
				
				if ($data_cek['pekerjaan'] == "Mahasiswa") echo "<option value='Mahasiswa' selected>Mahasiswa</option>";
                else echo "<option value='Mahasiswa'>Mahasiswa</option>";

                if ($data_cek['pekerjaan'] == "Wiraswasta") echo "<option value='Wiraswasta' selected>Wiraswasta</option>";
                else echo "<option value='Wiraswasta'>Wiraswasta</option>";

				if ($data_cek['pekerjaan'] == "Wirausaha") echo "<option value='Wirausaha' selected>Wirausaha</option>";
                else echo "<option value='Wirausaha'>Wirausaha</option>";

				if ($data_cek['pekerjaan'] == "Buruh") echo "<option value='Buruh' selected>Buruh</option>";
                else echo "<option value='Buruh'>Buruh</option>";

				if ($data_cek['pekerjaan'] == "Guru") echo "<option value='Guru' selected>Guru</option>";
                else echo "<option value='Guru'>Guru</option>";

				if ($data_cek['pekerjaan'] == "PNS") echo "<option value='PNS' selected>PNS</option>";
                else echo "<option value='PNS'>PNS</option>";

				if ($data_cek['pekerjaan'] == "Pensiunan") echo "<option value='Pensiunan' selected>Pensiunan</option>";
                else echo "<option value='Pensiunan'>Pensiunan</option>";

				if ($data_cek['pekerjaan'] == "Perangkat Desa") echo "<option value='Perangkat Desa' selected>Perangkat Desa</option>";
                else echo "<option value='Perangkat Desa'>Perangkat Desa</option>";

				if ($data_cek['pekerjaan'] == "TKI") echo "<option value='TKI' selected>TKI</option>";
                else echo "<option value='TKI'>TKI</option>";

				if ($data_cek['pekerjaan'] == "Lainnya") echo "<option value='Lainnya' selected>Lainnya</option>";
                else echo "<option value='Lainnya'>Lainnya</option>";
				
            ?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pend" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_pdd SET 
		nik='".$_POST['nik']."',
		nama='".$_POST['nama']."',
		tempat_lh='".$_POST['tempat_lh']."',
		tgl_lh='".$_POST['tgl_lh']."',
		jekel='".$_POST['jekel']."',
		pedukuhan='".$_POST['pedukuhan']."',
		rt='".$_POST['rt']."',
		rw='".$_POST['rw']."',
		agama='".$_POST['agama']."',
		kawin='".$_POST['kawin']."',
		pekerjaan='".$_POST['pekerjaan']."'
		WHERE nik='".$_POST['nik']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
    }}
