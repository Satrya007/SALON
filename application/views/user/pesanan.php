<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white"><?= $judul; ?></h1>	
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start about-info Area -->
<section class="about-info-area section-gap">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Pesanan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Tanggal Booking</th>
                        <th>Jam</th>
                        <th>Nama Service</th>
                        <th>Biaya</th>
                        <th>Durasi</th>
                        <th>Bukti Bayar</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($dt_pesanan as $d) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d->no_transaksi; ?></td>
                            <td><?= date('d-m-Y', strtotime($d->tgl_transaksi)); ?></td>
                            <td><?= date('d-m-Y', strtotime($d->tgl_booking)); ?></td>
                            <td><?= $d->jam . ':00'; ?></td>
                            <td><?= $d->nama_service; ?></td>
                            <td><?= 'Rp. ' . number_format($d->biaya, 0, ',', '.'); ?></td>
                            <td><?= $d->durasi; ?> menit</td>
                            <td>
                                <?php if ($d->bukti != NULL): ?>
                                    <a href="<?= base_url(); ?>upload/<?= $d->bukti; ?>"><i class="fa fa-file"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($d->status == 0): ?>
                                    <span class="badge badge-danger">Menunggu Konfirmasi</span>
                                <?php elseif ($d->status == 1): ?>
                                    <span class="badge badge-warning">Menunggu Pembayaran</span>
                                <?php elseif ($d->status == 2): ?>
                                    <span class="badge badge-info">Menunggu Kedatangan Pelanggan</span>
                                <?php elseif ($d->status == 3): ?>
                                    <span class="badge badge-primary">Sedang Dikerjakan</span>
                                <?php elseif ($d->status == 4): ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div align="center">
                                    <?php if ($d->status == 0): ?>
                                        <a class="btn btn-sm btn-danger shadow-sm" data-tooltip="tooltip" data-bs-placement="top"
                                            title="Delete" onclick="return confirm('anda yakin ingin menghapus data ini')"
                                            href="<?= base_url('user/delete_transaksi/' . $d->id_transaksi); ?>"><i class="fas fa-trash fa-sm"></i></a>
                                    <?php endif; ?>
                                    <?php if ($d->status == 1): ?>
                                        <a class="btn btn-sm btn-info shadow-sm" data-tooltip="tooltip" data-bs-placement="top"
                                            title="Bayar" href="javascript:;" data-toggle="modal" data-target="#edit"
                                            data-id="<?= $d->id_transaksi ?>"
                                            data-no_transaksi="<?= $d->no_transaksi ?>">
                                            <i class="fas fa-money fa-sm"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>	
</section>

<!-- Modal for Uploading Payment Proof -->
<div class="modal" id="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <?php  
            echo validation_errors();                       
            echo form_open_multipart('user/bayar'); ?>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id_transaksi" id="id" required>
                    <label for="exampleInputEmail1">No Pesanan</label>
                    <input type="text" class="form-control" id="no_transaksi" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1">Bukti Bayar</label>
                    <input type="file" class="form-control" name="bukti" required>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="submit" name="submit" class="btn btn-info btn-pill" value="Submit">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Payment Method Section -->
<section class="payment-method-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Metode Pembayaran</h2>
                <p>Pilih Metode Pembayaran Yang Anda Inginkan :</p>
                <ul>
                    
                    <li>
                        <i class="fas fa-credit-card"></i> <!-- SeaBank Icon -->
                        <strong>Sea Bank:</strong> 9014 5655 5131
                    </li>
                    <li>
                        <i class="fas fa-credit-card"></i> <!-- Gopay Icon -->
                        <strong>Gopay:</strong> 089529899239
                    </li>
                    <li>
                        <i class="fas fa-credit-card"></i> <!-- OVO Icon -->
                        <strong>ShopeePay:</strong> 089529899239
                    </li>
                    <i class="fas fa-money-bill-wave"></i> <!-- Cash Icon -->
                    <strong>Cash:</strong> Bayar Tunai Di Konter Untuk Mendapat Struk
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#edit').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#id').attr("value", div.data('id'));
        modal.find('#no_transaksi').attr("value", div.data('no_transaksi'));
    });
});
</script>
