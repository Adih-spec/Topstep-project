<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  /* Prevent background scroll when modal is open */
  body.modal-open {
    overflow: hidden;
  }
</style>
    <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    // If you need to include configuration or styles, do it here.
    // Example: require_once 'config.php';
    require_once '../../components/styles.php';
  ?>
  
</head>
<body>
      <?php
include_once '../../components/header.php';
?>
<!-- Entrance Exam Modal -->
<div class="modal fade show" id="entranceExamModal" tabindex="-1" aria-modal="true" role="dialog" style="display: block; background: rgba(0,0,0,0.5);">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content border-0 rounded shadow">
      <div class="modal-body p-0">
        <button type="button" class="close position-absolute m-3" data-dismiss="modal" aria-label="Close" style="right:0;z-index:10;font-size:2rem;">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="container my-5 p-4 border rounded text-center bg-white shadow">
          <div class="mb-3">
            <img src="../../assets/images/tps-logo.png" alt="" width="30%">
            <h1 class="mt-2">TOPSTEPS ACADEMY</h1>
            <p>plot No. 09, Road 3, Phase 4, before Panraf Hospital, Nyanya,FCT Abuja</p>
          </div>
          <h2 class="text-primary">ENTRANCE EXAMINATION</h2>
          <h3 class="text-danger">Admission into all classes</h3>
          <h4 class="text-danger mb-4">For your 2024/2025 Academic Year</h4>
          <div class="mb-4">
            <h3>Holds on:</h3>
            <ul class="list-unstyled">
              <li>Saturday, 20th April 2024</li>
              <li>Saturday, 27th April 2024</li>
              <li>Saturday, 4th May 2024</li>
            </ul>
          </div>
          <div class="mb-3">
            <p><strong>Venue:</strong>Topsteps Academy School Premises</p>
            <p>Entrance examination forms are available at the school premises</p>
          </div>
          <div class="badge bg-warning text-dark p-3 fs-5">Cost of form: &#8358; N5,000</div>
          <div class="mt-3 fw bold">
            <p>CONTACT US ON: 
              <br>08012345678 <br>08087654321</p>
          </div>
          <div class="mt-4 mb-3">
            <p>For more information, visit our website:</p>
            <a href="admission.php" class="btn btn-primary">Visit Our Website</a>
          </div>
          <div class="mt-4 p-3 bg-danger text-white rounded">
            <p class="text-white">Topsteps Academy is a place where your child can learn and grow.</p>
            <p class="text-white">We look forward to welcoming your child to our school!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="../../assets/images/student.jpg">
  <div class="container">
    <div class="hero-slider">
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Helping kids grow is our biggest Joy</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">
             </p>
            <a href="admission.php" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Build Future Top Leaders</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">To discover the true meaning of education, you need to be a part of TopStep Academy.</p>
            <a href="admission.php." class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- slider item -->
      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Your bright future is our mission</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".4">Our goal is making leaders out of the next generation</p>
            <a href="admission.php" class="btn btn-primary" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>
      <!-- end new slider item -->
    </div>
  </div>
</section>
<!-- /hero slider --> 


<!-- banner-feature -->


<section class="bg-gray">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <!-- Swiper Cube Carousel Column -->
      <div class="col-xl-4 col-lg-5 align-self-end">
        <div class="swiper mySwiper cubeSwiper">
          <div class="swiper-wrapper">
            
            <div class="swiper-slide">
              <img class="img-fluid w-100" src="../../assets/images/sw1.jpg" alt="Slide 1">
            </div>
           
            <div class="swiper-slide">
              <img class="img-fluid w-100" src="../../assets/images/sw2.jpg" alt="Slide 2">
            </div>
            
            <div class="swiper-slide">
              <img class="img-fluid w-100" src="../../assets/images/sw4.jpg" alt="Slide 3">
            </div>
          </div>
          
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <!-- Feature Blocks Column -->
      <div class="col-xl-8 col-lg-7">
        <div class="row feature-blocks bg-gray justify-content-between">

          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Scholarship News</h3>
            <p>Parents of Topsteppers, we have amazing news for you!!!
              We are offering scholarships to the best performing students in the school. <a href="scholarship.php">Learn More...</a>
            </p>
          </div>

          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Notice Board</h3>
            <p>Get the details of the school recent activity, see what events are coming up. <a href="events.php">Learn More...</a></p>
          </div>

           <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Achievements</h3>
            <p>At TopStep Academy we love to challenge the students in new areas to broaden their horizon. Here are some of our achievements as a school <a href="about.php">Learn More...</a></p>
          </div>

           <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-write mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Admission Now</h3>
            <p>Giving your child the best education. Pick TOPSTEP for their future! <a href="admission.php">Learn More...</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





<!-- about us -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="section-title">About TopSteps</h2>
        <p>Topsteps Academy is a premier educational institution dedicated to nurturing well-rounded, future-ready leaders. Our commitment to academic excellence is matched by our focus on character development, innovation, and holistic growth. With a dynamic curriculum, experienced faculty, and a supportive learning environment, we empower students to excel academically, think critically, and embrace lifelong learning. At Topsteps Academy, every child is inspired to reach their highest potential and make a positive impact in the world.</p>
       
        <a href="about.php" class="btn btn-primary-outline">Learn more</a>
      </div>
      <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
        <img class="img-fluid w-100" src="../../assets/images/tps-logo.png" alt="about image">
      </div>
    </div>
  </div>
</section>
<!-- /about us -->


<!-- success story -->
<section class="section bg-cover" data-background="images/backgrounds/success-story.jpg">
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
          <p>Topsteps Academy has nurtured countless success stories — from students gaining admission 
            into top universities to excelling in leadership, technology, arts, and sciences.
           Our....... </p>
          <p></p>
            <a href="about.php" class="btn btn-primary-outline">Learn more</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /success story -->

<!-- events -->
<section class="section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-12">
        <h2 class="section-title row justify-content-center" >Upcoming Events</h2>
      </div>
     <div class="row">
       <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/graduation" alt="event thumb">
            <div class="card-date"><span>26</span><br>July</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>Transcorp Hilton</p>
            <a href="events.php">
              <h4 class="card-title">Graduation and award ceremony</h4>
            </a>
          </div>
        </div>
      </div>
      <!-- event -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/inter house" alt="event thumb">
            <div class="card-date"><span>21</span><br>February</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>National Stadium</p>
            <a href="events.php">
              <h4 class="card-title">Inter house sports</h4>
            </a>
          </div>
        </div>
      </div>
      <!-- event -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/zoo" alt="event thumb">
            <div class="card-date"><span>13</span><br>April</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>National park and zoo</p>
            <a href="events.php">
              <h4 class="card-title">An excursion to the zoo</h4>
            </a>
          </div>
        </div>
      </div>
     </div>
    </div>
</section>

<!-- /events -->

<!-- Extra Lesson Banner Section -->
<section class="extra-lesson-banner text-white d-flex align-items-center" style="background-color: #fcbf49; min-height: 70vh;">
  <div class="container text-center">
    <h2 class="display-4 fw-bold text-dark">Extra Lessons and Tutoring</h2>
    <p class="lead mb-4 text-dark">
      Our qualified teachers are here to help and tutor your kids—whether to get ahead of their class or catch up with their mates.
      We offer extra lessons for all levels, from nursery to secondary school.
    </p>
    <a href="admission.php" class="btn btn-dark btn-lg shadow">Enroll Now</a>
  </div>
</section>


<!-- /Extra Lesson Banner Section -->

<!-- teachers -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title row justify-content-center">Our Teachers</h2>
      </div>
      <!-- teacher -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="../../assets/images/teachers/teacher-1.jpg" alt="teacher">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">Jacke Masito</h4>
            </a>
            <p>Teacher</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-google"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- teacher -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="../../assets/images/teachers/teacher-2.jpg" alt="teacher">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">Clark Malik</h4>
            </a>
            <p>Teacher</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-google"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- teacher -->
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="../../assets/images/teachers/teacher-3.jpg" alt="teacher">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">John Doe</h4>
            </a>
            <p>Teacher</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-google"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="index.html#"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /teachers -->

<!-- blog -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title row justify-content-center">Latest News</h2>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- blog post -->
  <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/blog/post-1.jpg" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0">August 28, 2019</li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0">By Jonathon</li>
        </ul>
        <a href="blog-single.html">
          <h4 class="card-title">The Expenses You Are Thinking.</h4>
        </a>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
        <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
  <!-- blog post -->
  <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/blog/post-2.jpg" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0">August 13, 2019</li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0">By Jonathon Drew</li>
        </ul>
        <a href="blog-single.html">
          <h4 class="card-title">Tips to Succeed in an Online Course</h4>
        </a>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
        <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
  <!-- blog post -->
  <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0" src="images/blog/post-3.jpg" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0">August 24, 2018</li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0">By Alex Pitt</li>
        </ul>
        <a href="blog-single.html">
          <h4 class="card-title">Orientation Program for the new students</h4>
        </a>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicin</p>
        <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
</div>
  </div>
</section>
<!-- /blog -->
 
<section id="map-section" class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-4">Locate Us At</h2>
    <p class="mb-4">visit our School, find us here!</p>
    
    <div class="embed-responsive embed-responsive-16by9 shadow rounded">
<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d877.5928408963465!2d7.5783444504558295!3d9.040151256401558!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sng!4v1750102211371!5m2!1sen!2sng"
   width="600" 
  height="450" 
  style="border:0;" 
  allowfullscreen="" 
  loading="lazy" 
  referrerpolicy="no-referrer-when-downgrade">
</iframe>
    </div>
  </div>
</section>


<?php
include_once '../../components/footer.php';
?>
<script>
  // Show modal on page load
  document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('entranceExamModal');
    if (modal) {
      modal.classList.add('show');
      modal.style.display = 'block';
      modal.removeAttribute('aria-hidden');
      modal.setAttribute('aria-modal', 'true');
      document.body.classList.add('modal-open');
    }
    // Close modal on close button click
    modal.querySelector('.close').onclick = function() {
      modal.classList.remove('show');
      modal.style.display = 'none';
      modal.setAttribute('aria-hidden', 'true');
      modal.removeAttribute('aria-modal');
      document.body.classList.remove('modal-open');
    };
  });
</script>
<?php
include_once '../../components/scripts.php';
?>
</body>
</html>