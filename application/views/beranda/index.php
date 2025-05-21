<section id="tentang-kami">
  <h2 class="judul">Tentang Kami</h2>
  <div class="tentang-kami-container">
    <div class="left">
      <div class="contact">
        <p><i class="fas fa-map-marker-alt"></i> Jl. Patimura No.37, Klojen, Kec. Klojen, Kota Malang, Jawa Timur 65111, Indonesia</p>
        <p><i class="fas fa-phone"></i> +62 812-1111-5787</p>
        <p><i class="fas fa-envelope"></i><a href="mailto:marketing.helios58@gmail.com"> marketing.helios58@gmail.com</a></p>
        <p><i class="fab fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=6281211115787"> +62 812-1111-5787</a></p>
        <p><i class="fab fa-instagram"></i><a href="https://www.instagram.com/heliosmalang"> @heliosmalang</a></p>
        <p><i class="fab fa-tiktok"></i><a href="https://www.tiktok.com/@helioshotelmalang"> @helioshotelmalang</a></p>
      </div>
    </div>
    <div class="right">
      <div class="desc">
        <p>
          Helios Hotel merupakan hotel bintang 4 yang menghadirkan kombinasi sempurna antara kenyamanan modern dan kehangatan budaya lokal. Mengusung konsep desain elegan dengan sentuhan tradisional yang menawan, Hotel Helios memberikan
          pengalaman menginap yang istimewa bagi setiap tamu. Berlokasi strategis dekat dengan stasiun kota Malang, hotel ini memudahkan akses ke berbagai kawasan pemerintahan, pusat bisnis, serta destinasi wisata terkenal. Dilengkapi
          dengan fasilitas teknologi terkini, Hotel Helios menjadi pilihan ideal untuk keperluan bisnis maupun liburan yang berkesan.
        </p>
        <a href="<?= base_url('beranda/tentang') ?>" class="more">Lainnya</a>
      </div>
    </div>
  </div>
</section>

<section class="section-kamar">
  <h2 class="judul">Pilihan Kamar</h2>
  <div class="container my-5">
    <div class="card-carousel">
      <!-- Card 1: Deluxe Room -->
      <div class="card shadow bg-body rounded" id="card1">
        <div id="imageCarousel1" class="carousel slide image-carousel" data-bs-ride="carousel" data-card-index="0">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?=base_url('assets/img/deluxe room.jpeg')?>" class="d-block w-100" alt="Deluxe Room Image 1" />
            </div>
            <div class="carousel-item">
              <img src="<?=base_url('assets/img/deluxe room.jpg')?>" class="d-block w-100" alt="Deluxe Room Image 2" />
            </div>
          </div>
          <button class="carousel-control-prev inner-control" type="button" data-bs-target="#imageCarousel1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next inner-control" type="button" data-bs-target="#imageCarousel1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="card-body">
          <h3 class="card-title">Deluxe Room</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="fas fa-tv me-2"></i>Smart TV</li>
          <li class="list-group-item"><i class="fas fa-coffee me-2"></i>Coffee Maker</li>
        </ul>
        <div class="card-body d-flex justify-content-between">
          <span class="price">Mulai dari <strong>Rp 300.000</strong>/malam</span>
          <a href="https://api.whatsapp.com/send?phone=6281211115787" class="btn custom-btn">Pesan Sekarang</a>
        </div>
      </div>

      <!-- Card 2: Executive Room -->
      <div class="card shadow bg-body rounded" id="card2">
        <div id="imageCarousel2" class="carousel slide image-carousel" data-bs-ride="carousel" data-card-index="1">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?=base_url('assets/img/executive room.jpg')?>" class="d-block w-100" alt="Executive Room Image 1" />
            </div>
            <div class="carousel-item">
              <img src="<?=base_url('assets/img/executive room (1).jpg')?>" class="d-block w-100" alt="Executive Room Image 2" />
            </div>
            <div class="carousel-item">
              <img src="<?=base_url('assets/img/executive room (2).jpg')?>" class="d-block w-100" alt="Executive Room Image 3" />
            </div>
          </div>
          <button class="carousel-control-prev inner-control" type="button" data-bs-target="#imageCarousel2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next inner-control" type="button" data-bs-target="#imageCarousel2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="card-body">
          <h3 class="card-title">Executive Room</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="fas fa-bath me-2"></i>Bathtub</li>
          <li class="list-group-item"><i class="fas fa-utensils me-2"></i>Breakfast Included</li>
        </ul>
        <div class="card-body d-flex justify-content-between">
          <span class="price">Mulai dari <strong>Rp 400.000</strong>/malam</span>
          <a href="https://api.whatsapp.com/send?phone=6281211115787" class="btn custom-btn">Pesan Sekarang</a>
        </div>
      </div>

      <!-- Card 3: Family Room -->
      <div class="card shadow bg-body rounded" id="card3">
        <div id="imageCarousel3" class="carousel slide image-carousel" data-bs-ride="carousel" data-card-index="2">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?=base_url('assets/img/family room.jpg')?>" class="d-block w-100" alt="Family Room Image 1" />
            </div>
            <div class="carousel-item">
              <img src="<?=base_url('assets/img/family room (1).jpg')?>" class="d-block w-100" alt="Family Room Image 2" />
            </div>
            <div class="carousel-item">
              <img src="<?=base_url('assets/img/family room (2).jpg')?>" class="d-block w-100" alt="Family Room Image 3" />
            </div>
          </div>
          <button class="carousel-control-prev inner-control" type="button" data-bs-target="#imageCarousel3" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next inner-control" type="button" data-bs-target="#imageCarousel3" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="card-body">
          <h3 class="card-title">Family Room</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><i class="fas fa-bed me-2"></i>2 Queen Beds</li>
          <li class="list-group-item"><i class="fas fa-swimming-pool me-2"></i>Pool Access</li>
        </ul>
        <div class="card-body d-flex justify-content-between">
          <span class="price">Mulai dari <strong>Rp 525.000</strong>/malam</span>
          <a href="https://api.whatsapp.com/send?phone=6281211115787" class="btn custom-btn">Pesan Sekarang</a>
        </div>
      </div>
    </div>

    <!-- Navigation buttons for card carousel -->
    <div class="carousel-navigation">
      <button class="nav-button prev-button" id="prevBtn">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="nav-button next-button" id="nextBtn">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Hidden Auto Slide Controls -->
    <div class="auto-slide-controls" style="display: none">
      <button class="btn btn-primary" id="startAutoSlide">Start Auto Slide</button>
      <button class="btn btn-danger" id="stopAutoSlide" disabled>Stop Auto Slide</button>
    </div>

    <div class="text-center mt-4">
      <a href="<?= base_url('beranda/kamar')?>" class="btn custom-btn">Lihat Semua Kamar</a>
    </div>
  </div>
</section>

<section id="fasilitas">
  <h2>Fasilitas</h2>
  <div class="daftar-fasilitas">
    <?php foreach ($fasilitas as $fas): ?>
    <?php if ($fas['tipe_aksi'] == 'link'): ?>
      <a href="<?= $fas['link'] ?>" target="_blank" class="fasilitas-item">
        <i class="fas <?= $fas['ikon'] ?> fa-3x "></i>
        <h3><?= $fas['nama'] ?></h3>
      </a>
   <?php else: ?>
    <div class="fasilitas-item" onclick="openPopup('popup<?= $fas['id_fasilitas'] ?>')">
      <i class="fas <?= $fas['ikon'] ?> fa-3x "></i>
      <h3><?= $fas['nama'] ?></h3>
    </div>

    <!-- POPUP -->
    <div class="pop-up" id="popup<?= $fas['id_fasilitas'] ?>">
      <div class="box-pop-up">
        <i class="fas fa-times close-icon" onclick="closePopup('popup<?= $fas['id_fasilitas'] ?>')"></i>

        <?php if (!empty($fas['foto'])): ?>
          <div class="carousel-container">
            <button class="carousel-btn prev" onclick="prevSlide('carouselSlide<?= $fas['id_fasilitas'] ?>')">
              <i class="fas fa-chevron-left"></i>
            </button>
            <div class="carousel-slide" id="carouselSlide<?= $fas['id_fasilitas'] ?>">
              <?php foreach ($fas['foto'] as $f): ?>
                <img src="<?= base_url('assets/img/upload/' . $f) ?>" alt="<?= $fas['nama'] ?>" />
              <?php endforeach; ?>
            </div>
            <button class="carousel-btn next" onclick="nextSlide('carouselSlide<?= $fas['id_fasilitas'] ?>')">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        <?php endif; ?>

        <div class="popup-detail">
          <h3><?= $fas['nama'] ?></h3>
          <p><?= $fas['deskripsi'] ?></p>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <h2>Layanan</h2>
  <div class="daftar-layanan">
    <?php foreach ($layanan as $fas): ?>
    <?php if ($fas['tipe_aksi'] == 'link'): ?>
      <a href="<?= $fas['link'] ?>" target="_self" class="layanan-item">
        <i class="fas <?= $fas['ikon'] ?> fa-3x "></i>
        <h3><?= $fas['nama'] ?></h3>
      </a>
   <?php else: ?>
    <div class="layanan-item" onclick="openPopup('popup<?= $fas['id_layanan'] ?>')">
      <i class="fas <?= $fas['ikon'] ?> fa-3x "></i>
      <h3><?= $fas['nama'] ?></h3>
    </div>

    <!-- POPUP -->
    <div class="pop-up" id="popup<?= $fas['id_layanan'] ?>">
      <div class="box-pop-up">
        <i class="fas fa-times close-icon" onclick="closePopup('popup<?= $fas['id_layanan'] ?>')"></i>

        <?php if (!empty($fas['foto'])): ?>
          <div class="carousel-container">
            <button class="carousel-btn prev" onclick="prevSlide('carouselSlide<?= $fas['id_layanan'] ?>')">
              <i class="fas fa-chevron-left"></i>
            </button>
            <div class="carousel-slide" id="carouselSlide<?= $fas['id_layanan'] ?>">
              <?php foreach ($fas['foto'] as $f): ?>
                <img src="<?= base_url('assets/img/upload/' . $f) ?>" alt="<?= $fas['nama'] ?>" />
              <?php endforeach; ?>
            </div>
            <button class="carousel-btn next" onclick="nextSlide('carouselSlide<?= $fas['id_layanan'] ?>')">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        <?php endif; ?>

        <div class="popup-detail">
          <h3><?= $fas['nama'] ?></h3>
          <p><?= $fas['deskripsi'] ?></p>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
  </div>
</section>

<section class="section-best">
  <h2 class="judul">Penawaran Terbaik</h2>
  <div class="container py-4">
    <!-- Jumbotron utama dengan animasi fade-in -->
    <div class="p-5 mb-4 bg-light rounded-3 bg-image-main animate-fade-in" id="jumbotron">
      <div class="container-fluid py-5">
        <h1 class="display-3 fw-bold segoe">Wonderful BROMO</h1>
        <h1 class="display-3 fw-bold">HELIOS HOTEL</h1>
        <p class="col-md-6 fs-5">
          "Rasakan Keajaiban Bromo, Dapatkan Pengalaman Tak Terlupakan!" <br />Ingin merasakan sensasi matahari terbit di Bromo? Bergabunglah dalam perjalanan penuh petualangan dan nikmati keindahan alam yang memukau. Jangan lewatkan
          kesempatan untuk menjelajahi keajaiban Indonesia!
        </p>
        <a href="<?= base_url('beranda/wisata')?>"
          <button class="btn btn-lg custom-btn" type="button">Lihat Selengkapnya</button>
        </a>
      </div>
    </div>

    <div class="row align-items-md-stretch h-90">
      <!-- Card kiri dengan animasi slide dari kanan -->
      <div class="col-md-6">
        <div class="h-90 p-5 text-white bg-dark rounded-3 bg-image-1 animate-slide-right" id="card-left">
          <h2 class="segoe">Explore Tumpak Sewu</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quis atque veniam, voluptas nihil ipsam explicabo totam et alias dicta autem animi fugiat laborum minima labore eligendi in? Asperiores, maxime?</p>
          <a href="<?= base_url('beranda/wisata')?>"
            <button class="btn btn-lg custom-btn" type="button">Lihat Selengkapnya</button>
          </a>
        </div>
      </div>
      <!-- Card kanan dengan animasi slide dari kiri -->
      <div class="col-md-6">
        <div class="h-90 p-5 bg-light border rounded-3 bg-image-2 animate-slide-left" id="card-right">
          <h2 class="segoe">Explore Ijen Blue Fire</h2>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit architecto optio veritatis aut iusto aspernatur expedita quasi illo aliquam incidunt quidem voluptatem reprehenderit ullam ea quia doloribus!</p>
          <a href="<?= base_url('beranda/wisata')?>"
            <button class="btn btn-lg custom-btn" type="button">Lihat Selengkapnya</button>
          </a>
        </div>
      </div>
    </div>
    <!-- Tambahkan setelah penutup </div> dari div.row -->
    <div class="card-scroll-buttons">
      <button class="scroll-btn scroll-left"><i class="fas fa-chevron-left"></i> Prev</button>
      <button class="scroll-btn scroll-right">Next <i class="fas fa-chevron-right"></i></button>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Only run on mobile screens
      if (window.innerWidth <= 768) {
        const cardRow = document.querySelector('.section-best .row.align-items-md-stretch');
        const scrollLeftBtn = document.querySelector('.scroll-btn.scroll-left');
        const scrollRightBtn = document.querySelector('.scroll-btn.scroll-right');
        const buttonContainer = document.querySelector('.card-scroll-buttons');
        buttonContainer.style.display = 'flex';
        // Initial check for scroll position
        updateScrollButtonVisibility();
        
        // Function to update the visibility of scroll buttons
        function updateScrollButtonVisibility() {
          // Hide left button if at the beginning
          if (cardRow.scrollLeft <= 10) {
            scrollLeftBtn.classList.add('hidden');
          } else {
            scrollLeftBtn.classList.remove('hidden');
          }
          
          // Hide right button if at the end
          const maxScrollLeft = cardRow.scrollWidth - cardRow.clientWidth - 10;
          if (cardRow.scrollLeft >= maxScrollLeft) {
            scrollRightBtn.classList.add('hidden');
          } else {
            scrollRightBtn.classList.remove('hidden');
          }
          
          // Hide entire button container if there's nothing to scroll
          if (cardRow.scrollWidth <= cardRow.clientWidth) {
            buttonContainer.style.display = 'none';
          } else {
            buttonContainer.style.display = 'flex';
          }
        }
        
        // Scroll left when left button is clicked
        scrollLeftBtn.addEventListener('click', function() {
          cardRow.scrollBy({
            left: -cardRow.offsetWidth * 0.85,
            behavior: 'smooth'
          });
        });
        
        // Scroll right when right button is clicked
        scrollRightBtn.addEventListener('click', function() {
          cardRow.scrollBy({
            left: cardRow.offsetWidth * 0.85,
            behavior: 'smooth'
          });
        });
        
        // Update button visibility when scrolling
        cardRow.addEventListener('scroll', updateScrollButtonVisibility);
        
        // Update on window resize as well
        window.addEventListener('resize', updateScrollButtonVisibility);
      }
    });
  </script>
</section>