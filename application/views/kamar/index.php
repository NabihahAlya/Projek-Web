<div class="container mb-5">
    <!-- Room Type Buttons -->
    <div class="room-tabs d-flex justify-content-center">
        <div class="btn-group" role="group">
            <?php 
                foreach ($data_kamar as $index => $data) {
                    $class = ($index == 0) ? 'btn active' : 'btn';
                    echo "<button type='button' class='" . $class  . "' data-room-type=" . strtolower($data['type_kamar']) .">" . ucwords($data['type_kamar']) . " Room</button>";
                }
            ?>
        </div>
    </div>
    
    <!-- Room Types -->
    <?php 
        foreach ($data_kamar as $index => $data) {
        $class = ($index == 0) ? 'room-container active' : 'room-container';
    ?>
        <div id="<?= strtolower($data['type_kamar'])?>-room" class="<?= $class ?>">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Main Image -->
                    <?php foreach ($images[$data['type_kamar']] as $i => $image) { 
                        if($i == 0) {
                    ?>
                        <img src="<?= base_url('assets/img/upload/kamar/' . $image['foto']) ?>" alt="<?= ucwords($data['type_kamar'])?> Room" class="main-image" id="<?= strtolower($data['type_kamar'])?>-main-image">
                    <?php }} ?>
                    <!-- Thumbnails -->
                    <div class="thumbnail-container">
                        <?php 
                            foreach ($images[$data['type_kamar']] as $i => $image) {
                                $thumbClass = ($i == 0) ? 'thumbnail active' : 'thumbnail';
                                echo '<img src="' . base_url('assets/img/upload/kamar/' . $image['foto']) . '" alt="' . ucwords($data['type_kamar'] ) .' Room" Class="'  . $thumbClass . '" onclick="changeImage(\'' . strtolower($data['type_kamar']) . '\', ' . $i . ')">';
                            }
                        ?>
                    </div>
                </div>
                
                <div class="col-lg-5 room-info">
                    <h2>Kamar <?= ucwords($data['type_kamar']) ?></h2>
                    <p><?= $data['deskripsi'] ?></p>
                    
                    <div class="features">
                        <?php 
                            foreach ($spek[$data['type_kamar']] as $spekData) {
                        ?>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span> <?= $spekData['spek'] ?></span>
                            </div>

                        <?php } ?>
                        
                    </div>
                    <div class="price">
                        Rp. <?= number_format($data['price'], 0, ',', '.')?> / malam
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=6281211115787"
                        <button class="btn custom-btn booking-btn">Pesan Sekarang</button>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    const images = <?= json_encode($images) ?>;
    const roomImages = {};

    for (let type_kamar in images) {
        roomImages[type_kamar] = images[type_kamar].map(image => baseUrl + "assets/img/upload/kamar/" + image['foto']);
    }
</script>