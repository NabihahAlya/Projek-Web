console.log("testing");

window.onload = function () {
  var setting = {
    query: "Jl. Patimura No.37, Klojen, Kota Malang, Jawa Timur 65111, Indonesia",
    width: "100%",
    height: 200,
    satellite: false,
    zoom: 13,
    placeId: "ChIJfa0B9joo1i0RV1WXk-MOg10",
    cid: "0x5d830ee393975557",
    coords: [-7.973071799999999, 112.6347548],
    cityUrl: "/indonesia/malang-39952",
    lang: "id",
    queryString: "Jl. Patimura No.37, Klojen, Kota Malang, Jawa Timur 65111, Indonesia",
    centerCoord: [-7.973071799999999, 112.6347548],
    id: "map-9cd199b9cc5410cd3b1ad21cab2e54d3",
    embed_id: "1213563",
  };
  var d = document;
  var s = d.createElement("script");
  s.src = "https://1map.com/js/script-for-user.js?embed_id=1213563";
  s.async = true;
  s.onload = function (e) {
    window.OneMap.initMap(setting);
  };
  var to = d.getElementsByTagName("script")[0];
  to.parentNode.insertBefore(s, to);
};

// Gunakan object untuk menyimpan state semua carousel
const carouselStates = {};

function initCarousel(carouselId) {
  const slide = document.getElementById(carouselId);
  if (!slide) return;
  
  // Reset state setiap kali diinisialisasi
  carouselStates[carouselId] = {
    currentIndex: 0,
    totalSlides: slide.children.length
  };
  
  // Log untuk debugging
  console.log(`Initialized carousel ${carouselId} with ${carouselStates[carouselId].totalSlides} slides`);
  
  updateSlide(carouselId);
}

function updateSlide(carouselId) {
  const slide = document.getElementById(carouselId);
  if (!slide || !carouselStates[carouselId]) return;
  
  const { currentIndex } = carouselStates[carouselId];
  const offset = -currentIndex * 100;
  slide.style.transform = `translateX(${offset}%)`;
  
  console.log(`Updated carousel ${carouselId} to index ${currentIndex}`);
}

function nextSlide(carouselId) {
  if (!carouselStates[carouselId]) {
    initCarousel(carouselId); // Coba inisialisasi jika belum
    return;
  }
  
  const state = carouselStates[carouselId];
  state.currentIndex = (state.currentIndex + 1) % state.totalSlides;
  updateSlide(carouselId);
}

function prevSlide(carouselId) {
  if (!carouselStates[carouselId]) {
    initCarousel(carouselId); // Coba inisialisasi jika belum
    return;
  }
  
  const state = carouselStates[carouselId];
  state.currentIndex = (state.currentIndex - 1 + state.totalSlides) % state.totalSlides;
  updateSlide(carouselId);
}

function openPopup(popupId) {
  const popup = document.getElementById(popupId);
  if (!popup) return;
  
  popup.style.display = "flex";
  
  // Tunggu sebentar untuk memastikan DOM sudah render
  setTimeout(() => {
    const carousel = popup.querySelector('.carousel-slide');
    if (carousel && carousel.id) {
      initCarousel(carousel.id);
    }
  }, 50);
}

function closePopup(popupId) {
  document.getElementById(popupId).style.display = "none";
}

function previewIcon(select) {
  var value = select.value;
  var previewDiv = document.getElementById('preview');
  
  // Menampilkan ikon sesuai pilihan user
  if (value) {
    previewDiv.innerHTML = '<i class="fas ' + value + '"></i>';
  } else {
    previewDiv.innerHTML = ''; // Kosongkan jika tidak ada yang dipilih
  }
}
