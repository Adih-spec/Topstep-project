<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us | Topsteps Academy</title>
  <?php require_once '../../components/styles.php'; ?>

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- AOS Animation CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <!-- Animate.css (Optional for additional effects) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <!-- Custom Styling (Optional, if needed) -->
   <!-- AOS Animation CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

  <!-- Custom Styling -->
  <style>
    .hover-shadow:hover {
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
      transition: box-shadow 0.4s ease-in-out;
    }
    .play-btn {
      display: inline-block;
      width: 60px;
      height: 60px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 50%;
      text-align: center;
      line-height: 60px;
      color: #007bff;
      font-size: 24px;
      box-shadow: 0 0 0 10px rgba(255, 255, 255, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .play-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 0 0 15px rgba(255, 255, 255, 0.4);
      color: #0056b3;
    }
    .card-body ul.list-inline li a {
      transition: color 0.3s ease;
    }
    .card-body ul.list-inline li a:hover {
      color: #007bff;
    }
    .card p {
      transition: transform 0.3s ease-in-out;
    }
    .card:hover p {
      transform: translateY(-5px);
    }
    .section-sm.bg-primary {
      background-color: #0056b3 !important;
    }
    .section.bg-cover {
      background-color: #f4f9ff !important;
    }
    
    .section.bg-light {
      background-color: #f1f3f7;
    }
    .section.bg-white {
      background-color: #ffffff;
    }
  </style>
</head>
</head>
<body>

<?php include_once '../../components/header.php'; ?>

<!-- Page Title -->
<section class="page-title-section overlay" data-background="../../assets/images/events/Teacher.png" style="background-repeat: no-repeat; background-size: cover;" data-aos="fade-down">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item">
            <a class="h2 text-primary font-secondary" href="#">About Us</a>
          </li>
        </ul>
        <p class="text-lighten">
          At Topsteps Academy, we blend academic excellence with innovative learning to build tomorrow’s leaders.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="section" data-aos="fade-right">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <img class="img-fluid w-100 mb-4" src="../../assets/images/about/about-page.jpg" alt="About Topsteps Academy">
        <h2 class="section-title">About Topsteps Academy</h2>
        <p>At Topsteps Academy, we are dedicated to transforming lives through education. As a premier learning institution, our mission is to cultivate academic excellence, character, and creativity in every student.</p>
        <p>We provide a diverse and engaging curriculum, supported by passionate and experienced educators who are committed to student success. Our inclusive, forward-thinking environment promotes not only academic achievement but also personal growth, leadership, and lifelong learning.</p>
        <p>With cutting-edge facilities, innovative teaching methodologies, and a strong community spirit, Topsteps Academy prepares learners to thrive in an ever-changing world. Join us and take your next step toward a brighter, empowered future.</p>
      </div>
    </div>
  </div>
</section>

<!-- Fun Facts -->
<section class="section-sm bg-primary text-center" data-aos="fade-up">
  <div class="container">
    <div class="row">
      <?php
      $facts = [
        ['count' => 60, 'label' => 'Expert Teachers'],
        ['count' => 50, 'label' => 'Academic Programs'],
        ['count' => 1000, 'label' => 'Enrolled Students'],
        ['count' => 3737, 'label' => 'Satisfied Parents']
      ];
      foreach ($facts as $fact): ?>
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <h2 class="count text-white" data-count="<?= $fact['count'] ?>">0</h2>
          <h5 class="text-white"><?= $fact['label'] ?></h5>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Success Story -->
<section class="section bg-cover" data-background="../../assets/images/backgrounds/success-story.jpg" data-aos="fade-left">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-4 position-relative success-video">
        <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
          <i class="ti-control-play"></i>
        </a>
      </div>
      <div class="col-lg-6 col-sm-8">
        <div class="bg-white p-5">
          <h2 class="section-title">Success Stories</h2>
          <p>Topsteps Academy has nurtured countless success stories — from students gaining admission into top universities to excelling in leadership, technology, arts, and sciences. Our alumni are proof that a solid educational foundation opens limitless opportunities.</p>
          <p>Our holistic approach ensures every child discovers their passion, hones their talent, and builds the confidence to lead and inspire. At Topsteps, success is not just a goal — it's a journey we take together.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Teachers -->
<section class="section" data-aos="fade-up">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 text-center mb-5">
        <h2 class="section-title">Meet Our Educators</h2>
        <p class="text-muted">Our teachers bring a wealth of knowledge, experience, and compassion to the classroom—empowering every student to succeed.</p>
      </div>

      <?php
      $teachers = [
        ['img' => 'teacher-1.png', 'name' => 'Mrs. Jenita', 'role' => 'Head Teacher'],
        ['img' => 'teacher-2.png', 'name' => 'Clark Malik', 'role' => 'Language Arts Instructor'],
        ['img' => 'teacher-3.png', 'name' => 'John Doe', 'role' => 'Mathematics Specialist']
      ];
      $delay = 0;
      foreach ($teachers as $teacher):
      ?>
        <div class="col-lg-4 col-sm-6 mb-4" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
          <div class="card border-0 rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="../../assets/images/about/<?= $teacher['img'] ?>" alt="<?= $teacher['name'] ?>">
            <div class="card-body">
              <h4 class="card-title"><?= $teacher['name'] ?></h4>
              <p><?= $teacher['role'] ?></p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      <?php $delay += 100; endforeach; ?>
    </div>
  </div>
</section>

<!-- Testimonials Section  -->
<section  class="section bg-light text-white position-relative" data-background='../../assets/images/about/testimonial.png' data-aos="fade-up">
  <div class="container py-5">
    <div class="row text-center mb-5">
      <div class="col-12">
        <h2 class="section-title text-white">What Parents Say</h2>
        <p class="text-light">Real stories from families who trust Topsteps Academy.</p>
      </div>
    </div>

    <!-- Swiper Container -->
    <div class="swiper testimonial-swiper">
      <div class="swiper-wrapper">
        <?php
        $testimonials = [
          ['name' => 'Mrs. Adebayo', 'comment' => 'Topsteps has transformed my child\'s confidence and academics. The teachers truly care about each student.', 'grade' => 'Grade 5'],
          ['name' => 'Mr. Obinna', 'comment' => 'The learning environment is so nurturing. I’ve seen huge improvements in both character and knowledge.', 'grade' => 'Grade 7'],
          ['name' => 'Mrs. Fatima', 'comment' => 'I love how Topsteps combines modern tech with core values. My child is learning and growing every day.', 'grade' => 'Grade 3']
        ];
        foreach ($testimonials as $test): ?>
          <div class="swiper-slide">
            <div class="card p-4 shadow-sm text-center mx-auto" style="max-width: 600px;">
              <p class="mb-3">"<?= $test['comment'] ?>"</p>
              <h5 class="mb-0">— <?= $test['name'] ?></h5>
              <small class="text-muted">Parent of <?= $test['grade'] ?> Student</small>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Swiper Pagination -->
      <div class="swiper-pagination mt-4"></div>

      <!-- Nav Buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>


<!-- Vision -->
<section class="section bg-white text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="section-title">Our Vision</h2>
    <p class="lead text-muted mx-auto" style="max-width: 800px;">
      At Topsteps Academy, our vision is to be a beacon of transformative education—developing world-class learners who are innovative, confident, and compassionate global citizens.
    </p>
  </div>
</section>

<!-- Accreditation -->
<section class="section bg-light" data-aos="fade-up">
  <div class="container">
    <div class="row text-center mb-4">
      <div class="col-12">
        <h2 class="section-title">Accreditations & Partners</h2>
        <p class="text-muted">We are proud to be affiliated with globally recognized institutions and academic bodies.</p>
      </div>
    </div>
    <div class="row justify-content-center align-items-center">
      <?php for ($i = 1; $i <= 4; $i++): ?>
        <div class="col-md-2 col-4 mb-3 border-0 rounded-0 hover-shadow">
          <img src="../../assets/images/partners/partner-<?= $i ?>.png" class="img-fluid" alt="Partner <?= $i ?>">
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>
<!-- footer -->
<?php include_once '../../components/footer.php'; ?>
<?php include_once '../../components/scripts.php'; ?>

<!-- Counter Script -->
<script>
  const counters = document.querySelectorAll('.count');
  const speed = 200;
  counters.forEach(counter => {
    const animate = () => {
      const target = +counter.getAttribute('data-count');
      const count = +counter.innerText;
      const increment = target / speed;
      if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(animate, 15);
      } else {
        counter.innerText = target;
      }
    };
    animate();
  });
</script>

<!-- AOS Init -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: false
  });
</script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper('.testimonial-swiper', {
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    slidesPerView: 1,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
</script>


</body>
</html>
