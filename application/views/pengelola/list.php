<link rel="stylesheet" href="<?= base_url('assets/css/portal-styles.css') ?>">
<?php $this->load->view('templates/header'); ?>

    <section class="hero">
        <div class="container position-relative">
            <h1 data-aos="fade-down" data-aos-duration="1500">
                DINAS KEBUDAYAAN & PARIWISATA<br>KOTA TANGERANG
            </h1>
            <p data-aos="fade-up" data-aos-delay="500" data-aos-duration="1500">
                Akses mudah dan cepat ke semua website Budaya, Pariwisata, dan Aplikasi Internal Disbudpar.
            </p>
        </div>
    </section>


<div class="container py-5 container-main" id="admin-section">
    
    <div class="section-divider mx-auto mb-4" data-aos="zoom-in" data-aos-delay="200">
        <h2 class="text-primary" style="font-size: 1.8rem;"><i class="fas fa-user-cog me-2 bounce-icon"></i> Akses Pengelola (Admin)</h2>
    </div>

    <p class="text-center mb-5 text-muted" data-aos="fade-up" data-aos-delay="300">
        Halaman khusus untuk mengakses link admin website internal Dinas Kebudayaan & Pariwisata.
    </p>

    <div class="card-admin-wrapper">
    <?php if (!empty($links)): ?>
        <?php foreach ($links as $index => $row): ?>
            
            <div class="card-admin" > 
                
                <div class="card-admin-content">
                    <div class="card-admin-icon">
                        <?php if ($row->image): ?>
                            <img src="<?= base_url('uploads/website_icons/' . htmlspecialchars($row->image)); ?>" alt="<?= htmlspecialchars($row->nama_website) ?> Icon">
                        <?php else: ?>
                            <i class="fas fa-tools"></i> 
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="card-title-admin"><?= htmlspecialchars($row->nama_website) ?></h3>
                </div>

                <div class="card-admin-details">
                    <p>
                        <?= htmlspecialchars($row->deskripsi ?: 'Akses halaman login admin untuk sistem ' . $row->nama_website); ?>
                    </p>
                    
                    <a href="<?= $row->url ?>" target="_blank" class="card-admin-button">
                        KUNJUNGI WEB <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div> <?php endforeach; ?>
        <?php else: ?>
             <div class="col-12 text-center py-5">
                <p class="lead text-danger"><i class="fas fa-exclamation-triangle me-2"></i> Belum ada link admin website yang tercatat.</p>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php $this->load->view('templates/footer'); ?>