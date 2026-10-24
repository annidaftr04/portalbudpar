<div class="container py-4">
    <a href="<?= site_url('user') ?>" class="btn btn-link">&larr; Kembali</a>
    <div class="card shadow-sm">
        <?php if ($website->screenshot): ?>
            <img src="<?= base_url('uploads/screenshots/'.$website->screenshot) ?>" 
                 class="card-img-top" alt="<?= htmlspecialchars($website->nama_website) ?>">
        <?php endif; ?>
        <div class="card-body">
            <h3><?= htmlspecialchars($website->nama_website) ?></h3>
            <p><?= nl2br(htmlspecialchars($website->deskripsi)) ?></p>
            <?php if ($website->user_url): ?>
                <a href="<?= $website->user_url ?>" target="_blank" class="btn btn-success">
                    Buka Website
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
