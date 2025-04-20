document.addEventListener('DOMContentLoaded', function() {
    // Fungsi callback untuk observer
    function handleIntersect(entries, observer) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Elemen saat ini terlihat di viewport
          if (entry.target.id === 'jumbotron') {
            entry.target.classList.add('fade-in-visible');
          } else if (entry.target.id === 'card-left') {
            entry.target.classList.add('slide-right-visible');
          } else if (entry.target.id === 'card-right') {
            entry.target.classList.add('slide-left-visible');
          }
          
          // Hentikan observasi setelah animasi berjalan satu kali
          observer.unobserve(entry.target);
        }
      });
    }

    // Konfigurasi observer
    const options = {
      root: null, // menggunakan viewport sebagai root
      rootMargin: '0px', // margin tambahan pada root
      threshold: 0.2 // trigger ketika minimal 20% elemen terlihat
    };

    // Buat instance observer
    const observer = new IntersectionObserver(handleIntersect, options);

    // Elemen yang akan diobservasi
    const jumbotron = document.getElementById('jumbotron');
    const cardLeft = document.getElementById('card-left');
    const cardRight = document.getElementById('card-right');

    // Mulai observasi
    observer.observe(jumbotron);
    observer.observe(cardLeft);
    observer.observe(cardRight);
  });