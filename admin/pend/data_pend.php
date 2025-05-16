<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Penduduk
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-pend" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data
                </a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No KK</th>
                        <th>Kepala Keluarga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT p.nik, p.nama, p.jekel, p.pedukuhan, p.rt, p.rw, a.no_kk, k.no_kk, k.kepala 
                                           FROM tb_pdd p 
                                           LEFT JOIN tb_anggota a ON p.nik = a.nik 
                                           LEFT JOIN tb_kk k ON a.no_kk = k.no_kk 
                                           WHERE status = 'Ada'");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['jekel']; ?></td>
                        <td><?php echo $data['pedukuhan']; ?> RT <?php echo $data['rt']; ?>/ RW <?php echo $data['rw']; ?>.</td>
                        <td><?php echo $data['no_kk']; ?></td>
                        <td><?php echo $data['kepala']; ?></td>
                        <td>
                            <a href="?page=view-pend&kode=<?php echo $data['nik']; ?>" title="Detail" class="btn btn-info btn-sm">
                                <i class="fa fa-user"></i>
                            </a>
                            <a href="?page=edit-pend&kode=<?php echo $data['nik']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <!-- <a href="?page=del-pend&kode=<?php echo $data['nik']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a> -->
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
