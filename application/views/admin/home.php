<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <h4 class="mb-4">Dashboard Overview</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card dashboard-card konfirmasi-card">
                <div class="card-body">
                    <div class="card-title">Konfirmasi</div>
                    <div class="card-value"><?php echo $konfirmasi; ?></div>
                    <i class="fas fa-clock dashboard-icon"></i>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6">
            <div class="card dashboard-card pembayaran-card">
                <div class="card-body">
                    <div class="card-title">Pembayaran</div>
                    <div class="card-value"><?php echo $pembayaran; ?></div>
                    <i class="fas fa-money-bill-wave dashboard-icon"></i>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6">
            <div class="card dashboard-card kedatangan-card">
                <div class="card-body">
                    <div class="card-title">Kedatangan</div>
                    <div class="card-value"><?php echo $kedatangan; ?></div>
                    <i class="fas fa-user-check dashboard-icon"></i>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6">
            <div class="card dashboard-card dikerjakan-card">
                <div class="card-body">
                    <div class="card-title">Dikerjakan</div>
                    <div class="card-value"><?php echo $dikerjakan; ?></div>
                    <i class="fas fa-tasks dashboard-icon"></i>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6">
            <div class="card dashboard-card selesai-card">
                <div class="card-body">
                    <div class="card-title">Selesai</div>
                    <div class="card-value"><?php echo $selesai; ?></div>
                    <i class="fas fa-check-circle dashboard-icon"></i>
                </div>
            </div>
        </div>
    </div>
</div>


