<div class="container">
    
    <div class="container mb-5">
        <!-- Trip Type Buttons -->
        <div class="room-tabs d-flex justify-content-center">
            <div class="btn-group" role="group">
                <button type="button" class="btn active" data-room-type="bromo">Bromo Trip</button>
                <button type="button" class="btn" data-room-type="tumpak-sewu">Tumpak Sewu Trip</button>
                <button type="button" class="btn" data-room-type="kawah-ijen">Kawah Ijen Trip</button>
                </div>
        </div>
    </div>
    
    <!-- Bromo Trip -->
    <div id="bromo-room" class="room-container active">
        <div class="row">
            <div class="col-lg-7">
                <!-- Main Image -->
                <img src="<?php echo base_url('assets/img/bule-bromo1.jpg'); ?>" alt="Gunung Bromo" class="main-image" id="bromo-main-image">
                
                <!-- Thumbnails -->
                <div class="thumbnail-container">
                    <img src="<?php echo base_url('assets/img/bule-bromo1.jpg'); ?>" alt="Bromo 1" class="thumbnail active" onclick="changeImage('bromo', 0)">
                    <img src="<?php echo base_url('assets/img/bule-bromo2.jpg'); ?>" alt="Bromo 2" class="thumbnail" onclick="changeImage('bromo', 1)">
                    <img src="<?php echo base_url('assets/img/bule-bromo3.jpg'); ?>" alt="Bromo 3" class="thumbnail" onclick="changeImage('bromo', 2)">
                    <img src="<?php echo base_url('assets/img/bromo.jpg'); ?>" alt="Bromo 4" class="thumbnail" onclick="changeImage('bromo', 3)">
                </div>
            </div>
            
            <div class="col-lg-5 room-info">
                <span class="badge">Start From Rp. 2.200.000</span>
                <h4>Find Your Tour</h4>
                <h2>Wonderful Bromo</h2>
                <p>Bergabunglah dalam petualangan menakjubkan di Gunung Bromo, saksi bisu keindahan alam yang mengagumkan! </p>
                
                <div class="features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Durasi: 2 hari 1 malam</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Penginapan dekat lokasi</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Sarapan dan makan malam</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Tur jeep sunrise</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Pemandu lokal</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Transportasi dari/ke Surabaya</span>
                    </div>
                </div>
                
                <div class="price">
                    Rp. 2.200.000 / orang
                </div>
                
                <button class="btn btn-primary booking-btn">Pesan Sekarang</button>
            </div>
        </div>
    </div>
    
    <!-- Tumpak Sewu Trip -->
    <div id="tumpak-sewu-room" class="room-container">
        <div class="row">
            <div class="col-lg-7">
                <!-- Main Image -->
                <img src="<?php echo base_url('assets/img/tumpak-sewu.jpg'); ?>" alt="Tumpak Sewu" class="main-image" id="tumpak-sewu-main-image">
                
                <!-- Thumbnails -->
                <div class="thumbnail-container">
                    <img src="<?php echo base_url('assets/img/tumpak-sewu.jpg'); ?>" alt="Tumpak Sewu 1" class="thumbnail active" onclick="changeImage('tumpak-sewu', 0)">
                    <img src="<?php echo base_url('assets/img/tumpak-sewu-1.jpg'); ?>" alt="Tumpak Sewu 2" class="thumbnail" onclick="changeImage('tumpak-sewu', 1)">
                    <img src="<?php echo base_url('assets/img/tumpak-sewu-2.jpg'); ?>" alt="Tumpak Sewu 3" class="thumbnail" onclick="changeImage('tumpak-sewu', 2)">
                    <img src="<?php echo base_url('assets/img/tumpak-sewu-3.jpg'); ?>" alt="Tumpak Sewu 4" class="thumbnail" onclick="changeImage('tumpak-sewu', 3)">
                </div>
            </div>
            
            <div class="col-lg-5 room-info">
                <span class="badge">Start From Rp. 100.000</span>
                <h4>Find Your Tour</h4>
                <h2>Seribu Pesona Tumpak Sewu</h2>
                <p>Temukan pesona tersembunyi Tumpak Sewu, air terjun seribu yang memikat hati dan membawa ketenangan!</p>
                
                <div class="features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Durasi: 3 hari 2 malam</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Akomodasi hotel bintang 4</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Makan 3x sehari</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Transportasi AC</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Trek ke kawasan air terjun</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Pemandu lokal berpengalaman</span>
                    </div>
                </div>
                
                <div class="price">
                    Rp. 3.500.000 / orang
                </div>
                
                <button class="btn btn-primary booking-btn">Pesan Sekarang</button>
            </div>
        </div>
    </div>
    
    <!-- Kawah Ijen Trip -->
    <div id="kawah-ijen-room" class="room-container">
        <div class="row">
            <div class="col-lg-7">
                <!-- Main Image -->
                <img src="<?php echo base_url('assets/img/ijen.jpg'); ?>" alt="Kawah Ijen" class="main-image" id="kawah-ijen-main-image">
                
                <!-- Thumbnails -->
                <div class="thumbnail-container">
                    <img src="<?php echo base_url('assets/img/ijen.jpg'); ?>" alt="Kawah Ijen 1" class="thumbnail active" onclick="changeImage('kawah-ijen', 0)">
                    <img src="<?php echo base_url('assets/img/kawah-ijen-1.jpg'); ?>" alt="Kawah Ijen 2" class="thumbnail" onclick="changeImage('kawah-ijen', 1)">
                    <img src="<?php echo base_url('assets/img/kawah-ijen-2.jpg'); ?>" alt="Kawah Ijen 3" class="thumbnail" onclick="changeImage('kawah-ijen', 2)">
                    <img src="<?php echo base_url('assets/img/kawah-ijen-3.jpg'); ?>" alt="Kawah Ijen 4" class="thumbnail" onclick="changeImage('kawah-ijen', 3)">
                </div>
            </div>
            
            <div class="col-lg-5 room-info">
                <span class="badge">Start From Rp. 100.000</span>
                <h4>Find Your Tour</h4>
                <h2>Cahaya Biru Kawah Ijen</h2>
                <p>Jelajahi pesona Kawah Ijen, nikmati keindahan api biru yang mengagumkan di tengah kabut pagi!</p>
                
                <div class="features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Durasi: 2 hari 1 malam</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Penginapan standard di Banyuwangi</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Alat keselamatan lengkap</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Pemandu profesional</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Perlengkapan camping</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Transportasi PP dari Banyuwangi</span>
                    </div>
                </div>
                
                <div class="price">
                    Rp. 1.800.000 / orang
                </div>
                
                <button class="btn btn-primary booking-btn">Pesan Sekarang</button>
            </div>
        </div>
    </div>
</div>