<!-- jQuery -->
<script src="../../assets/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="../../assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="../../assets/plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="../../assets/plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="../../assets/plugins/venobox/venobox.min.js"></script>
<!-- mixitup filter -->
<script src="../../assets/plugins/mixitup/mixitup.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="../../assets/plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="../../assets/js/script.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Swiper Init with Cube Effect -->
<script>
  const swiper = new Swiper(".cubeSwiper", {
    effect: "cube",
    grabCursor: true,
    loop: true,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
    cubeEffect: {
      shadow: true,
      slideShadows: true,
      shadowOffset: 20,
      shadowScale: 0.94,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>