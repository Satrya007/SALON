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

<section class="destinations-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Layanan Kami</h1>
                    <p>Kami berikan layanan terbaik untuk Anda</p>        
                </div>
            </div>                      
        </div>
        
        <div class="row">
            <?php foreach ($dt_service as $d): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card layanan-card">
                    <div class="thumb">
                        <img src="<?= base_url(); ?>upload/<?= $d->file; ?>" alt="<?= $d->nama_service; ?>" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?= $d->nama_service; ?></h4>
                        <div class="info-layanan">
                            <div class="info-item">
                                <i class="fas fa-money-bill"></i>
                                <span>Biaya: Rp <?= number_format($d->biaya, 0, ',', '.'); ?></span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <span>Durasi: <?= $d->durasi; ?></span>
                            </div>
                        </div>
                        <button class="btn-pesan" data-toggle="modal" data-target="#pesanModal<?= $d->id_service; ?>">
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Pesan -->
            <div class="modal fade" id="pesanModal<?= $d->id_service; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pesan Layanan - <?= $d->nama_service; ?></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <?php echo form_open('site/booking'); ?>
                        <div class="modal-body">
                            <input type="hidden" name="id_service" value="<?= $d->id_service; ?>">
                            
                            <div class="form-group">
                                <label><i class="far fa-calendar-alt"></i> Tanggal Perawatan</label>
                                <input type="date" class="form-control" name="tgl_pesanan" required min="<?= date('Y-m-d'); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label><i class="far fa-clock"></i> Waktu Perawatan</label>
                                <select class="form-control" name="jam_pesanan" required>
                                    <option value="">Pilih Waktu</option>
                                    <option value="09:00">09:00 WIB</option>
                                    <option value="10:00">10:00 WIB</option>
                                    <option value="11:00">11:00 WIB</option>
                                    <option value="13:00">13:00 WIB</option>
                                    <option value="14:00">14:00 WIB</option>
                                    <option value="15:00">15:00 WIB</option>
                                </select>
                            </div>

                            <div class="ringkasan-pesanan">
                                <h6>Ringkasan Pesanan</h6>
                                <div class="ringkasan-item">
                                    <span>Layanan:</span>
                                    <span><?= $d->nama_service; ?></span>
                                </div>
                                <div class="ringkasan-item">
                                    <span>Biaya:</span>
                                    <span>Rp <?= number_format($d->biaya, 0, ',', '.'); ?></span>
                                </div>
                                <div class="ringkasan-item">
                                    <span>Durasi:</span>
                                    <span><?= $d->durasi; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.layanan-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    margin-bottom: 20px;
    overflow: hidden;
}

.layanan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.layanan-card .thumb img {
    height: 200px;
    width: 100%;
    object-fit: cover;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

.info-layanan {
    margin: 15px 0;
    padding: 10px 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
}

.info-item {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.info-item i {
    color: #ff4757;
    margin-right: 10px;
    width: 20px;
}

.btn-pesan {
    width: 100%;
    padding: 12px;
    background: linear-gradient(45deg, #ff4757, #ff6b81);
    color: white;
    border: none;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-pesan:hover {
    background: linear-gradient(45deg, #ff6b81, #ff4757);
    transform: translateY(-2px);
    color: white;
}

.modal-content {
    border-radius: 15px;
}

.modal-header {
    background: linear-gradient(45deg, #ff4757, #ff6b81);
    color: white;
    border: none;
}

.ringkasan-pesanan {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 10px;
    margin-top: 20px;
}

.ringkasan-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #dee2e6;
}

.ringkasan-item:last-child {
    border-bottom: none;
}

.form-control {
    border-radius: 8px;
    padding: 10px 15px;
}

.form-control:focus {
    border-color: #ff4757;
    box-shadow: 0 0 0 0.2rem rgba(255,71,87,0.25);
}
</style>
