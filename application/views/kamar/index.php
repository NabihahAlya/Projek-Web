<div class="container mb-5">
    <!-- Room Type Buttons -->
    <div class="room-tabs d-flex justify-content-center">
        <div class="btn-group" role="group">
            <button type="button" class="btn active" data-room-type="deluxe">Deluxe Room</button>
            <button type="button" class="btn" data-room-type="executive">Executive Room</button>
            <button type="button" class="btn" data-room-type="family">Family Room</button>
        </div>
    </div>
    
    <!-- Deluxe Room -->
    <div id="deluxe-room" class="room-container active">
        <div class="row">
            <div class="col-lg-7">
                <!-- Main Image -->
                <img src="<?= base_url('assets/img/deluxe room.jpg') ?>" alt="Deluxe Room" class="main-image" id="deluxe-main-image">
                
                <!-- Thumbnails -->
                <div class="thumbnail-container">
                    <img src="<?= base_url('assets/img/deluxe room.jpg') ?>" alt="Deluxe Room 1" class="thumbnail active" onclick="changeImage('deluxe', 0)">
                    <img src="<?= base_url('assets/img/deluxe room.jpeg') ?>" alt="Deluxe Room 2" class="thumbnail" onclick="changeImage('deluxe', 1)">
                    <img src="<?= base_url('assets/img/Deluxe.jpg') ?>" alt="Deluxe Room 3" class="thumbnail" onclick="changeImage('deluxe', 2)">
                    <img src="<?= base_url('assets/img/deluxe room.jpg') ?>" alt="Deluxe Room 4" class="thumbnail" onclick="changeImage('deluxe', 3)">
                </div>
            </div>
            
            <div class="col-lg-5 room-info">
                <h2>Kamar Deluxe</h2>
                <p>Kamar Deluxe kami menawarkan kenyamanan dengan harga terjangkau. Dilengkapi dengan fasilitas lengkap untuk memenuhi kebutuhan mendasar Anda selama menginap.</p>
                
                <div class="features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Ukuran Kamar: 24 m²</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Tempat Tidur Queen Size</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>AC</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>TV LCD 32 inch</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Kamar Mandi dengan Shower</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>WiFi Gratis</span>
                    </div>
                </div>
                
                <div class="price">
                    Rp. 300.000 / malam
                </div>
                
                <button class="btn btn-primary custom-btn booking-btn">Pesan Sekarang</button>
            </div>
        </div>
    </div>
    
    <!-- Executive Room -->
    <div id="executive-room" class="room-container">
        <div class="row">
            <div class="col-lg-7">
                <!-- Main Image -->
                <img src="/api/placeholder/800/400" alt="Executive Room" class="main-image" id="executive-main-image">
                
                <!-- Thumbnails -->
                <div class="thumbnail-container">
                    <img src="/api/placeholder/200/150" alt="Executive Room 1" class="thumbnail active" onclick="changeImage('executive', 0)">
                    <img src="/api/placeholder/200/150" alt="Executive Room 2" class="thumbnail" onclick="changeImage('executive', 1)">
                    <img src="/api/placeholder/200/150" alt="Executive Room 3" class="thumbnail" onclick="changeImage('executive', 2)">
                    <img src="/api/placeholder/200/150" alt="Executive Room 4" class="thumbnail" onclick="changeImage('executive', 3)">
                </div>
            </div>
            
            <div class="col-lg-5 room-info">
                <h2>Kamar Executive</h2>
                <p>Kamar Executive kami menawarkan ruang lebih luas dengan tambahan kenyamanan. Cocok untuk mereka yang menginginkan pengalaman menginap yang lebih mewah dengan pemandangan kota yang menakjubkan.</p>
                
                <div class="features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Ukuran Kamar: 32 m²</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Tempat Tidur King Size</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>AC</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>TV LCD 42 inch</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Kamar Mandi dengan Bathtub</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>WiFi Gratis</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Mini Bar</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Balkon Pribadi</span>
                    </div>
                </div>
                
                <div class="price">
                    Rp. 400.000 / malam
                </div>
                
                <button class="btn custom-btn booking-btn">Pesan Sekarang</button>
            </div>
        </div>
    </div>
    
    <!-- Family Room -->
    <div id="family-room" class="room-container">
        <div class="row">
            <div class="col-lg-7">
                <!-- Main Image -->
                <img src="/api/placeholder/800/400" alt="Family Room" class="main-image" id="family-main-image">
                
                <!-- Thumbnails -->
                <div class="thumbnail-container">
                    <img src="/api/placeholder/200/150" alt="Family Room 1" class="thumbnail active" onclick="changeImage('family', 0)">
                    <img src="/api/placeholder/200/150" alt="Family Room 2" class="thumbnail" onclick="changeImage('family', 1)">
                    <img src="/api/placeholder/200/150" alt="Family Room 3" class="thumbnail" onclick="changeImage('family', 2)">
                    <img src="/api/placeholder/200/150" alt="Family Room 4" class="thumbnail" onclick="changeImage('family', 3)">
                </div>
            </div>
            
            <div class="col-lg-5 room-info">
                <h2>Kamar Family</h2>
                <p>Kamar Family kami adalah pilihan terbaik untuk kemewahan. Dengan ruang yang sangat luas, fasilitas premium, dan layanan eksklusif, Suite kami memberikan pengalaman menginap yang tak terlupakan dengan pemandangan panoramik kota.</p>
                
                <div class="features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Ukuran Kamar: 48 m²</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Tempat Tidur King Size</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Ruang Tamu Terpisah</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>AC</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>TV LCD 55 inch</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Kamar Mandi Mewah dengan Jacuzzi</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>WiFi Gratis</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Mini Bar Premium</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Balkon Pribadi Luas</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Coffee Maker</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Layanan Kamar 24 Jam</span>
                    </div>
                </div>
                
                <div class="price">
                    Rp. 525.000 / malam
                </div>
                
                <button class="btn custom-btn booking-btn">Pesan Sekarang</button>
            </div>
        </div>
    </div>
</div>

    <script>
        var baseUrl = '<?= base_url() ?>';
    </script>