<footer id="footer">
        <div class="container">
            <div class="row pt-5 pb-3">
                
                <div class="col-md-5 mb-4">
                    <h5 style="color: var(--color-accent); font-weight: 700;">
                        <i class="fas fa-route me-2"></i> PORTAL DISBUDPAR
                    </h5>
                    <p class="text-white-50 mt-3">
                        Pusat akses terpadu untuk informasi dan aplikasi seputar Kebudayaan dan Pariwisata Kota Tangerang.
                    </p>
                    <p class="mt-4">
                        <a href="<?= site_url('pengelola') ?>" class="text-decoration-none btn btn-elegant btn-sm" target="_blank">
                            <i class="fas fa-user-shield me-1"></i> Akses Pengelola
                        </a>
                        <a href="<?= site_url('user') ?>" class="text-decoration-none btn btn-elegant btn-sm" target="_blank">
                            <i class="fas fa-user-shield me-1"></i> Akses User
                        </a>
                    </p>
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="text-white">Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>#user-section" class="text-white-75 text-decoration-none py-1 d-block"><i class="fas fa-arrow-right me-2"></i> Aplikasi Publik</a></li>
                        <li><a href="#" class="text-white-75 text-decoration-none py-1 d-block"><i class="fas fa-arrow-right me-2"></i> Data Pariwisata</a></li>
                        <li><a href="#" class="text-white-75 text-decoration-none py-1 d-block"><i class="fas fa-arrow-right me-2"></i> Event Budaya</a></li>
                        <li><a href="#" class="text-white-75 text-decoration-none py-1 d-block"><i class="fas fa-arrow-right me-2"></i> Hubungi Kami</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-4">
                    <h5 class="text-white">Kontak Kami</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Mayjen Sutoyo No.11, RT.002/RW.001, Sukarasa, Kec. Tangerang, Kota Tangerang, Banten 15111</li>
                        <li><i class="fas fa-phone me-2"></i> (021) 38959052</li>
                        <li><i class="fas fa-envelope me-2"></i> disbudpar@tangerangkota.go.id</li>
                    </ul>
                    <div class="mt-3">
                        <a href="https://www.instagram.com/disbudparkotatangerang?igsh=MXdlMTk4NDdrcXhtbA==" class="text-white me-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="https://www.youtube.com/@disbudparkotatangerang3673" class="text-white me-3"><i class="fab fa-youtube fa-2x"></i></a>
                    </div>
                </div>

            </div>
            
            <div class="row pt-3 border-top border-white-50">
                <div class="col-12 text-center">
                    <p class="mb-0 text-white-50">&copy; <?= date('Y') ?> Dinas Kebudayaan & Pariwisata Kota Tangerang. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-cubic' 
        });
    </script>
</body>
</html>