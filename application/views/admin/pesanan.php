<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pesanan</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pelanggan</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($dt_pesanan as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d/m/Y', strtotime($row->tgl_pesanan)) ?></td>
                                <td><?= $row->nama_pelanggan ?></td>
                                <td><?= $row->nama_service ?></td>
                                <td><?= $row->status ?></td>
                                <td>
                                    <a href="<?= base_url('admin/detail_pesanan/'.$row->id_pesanan) ?>" 
                                       class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>