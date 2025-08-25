@extends('components.layouts.app')
@section('PageTitle', 'Home')
@section('pageContent')
@section('styles')
<style>
    .feedback {
      padding: 10px;
      margin-bottom: 15px;
      font-weight: bold;
      color: green;
    }
    .feedback.error {
      color: red;
    }
  </style>
@endsection
<!-- page title -->
<section class="page-title-section overlay" data-background="{{asset('MainAssets/images/contact/download2.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="https://themewagon.github.io/educenter/@@page-link">Contact Us</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">If you have any inquiries or require further assistance, please do not hesitate to reach out. We are here to help you and will respond to your message promptly.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="section-title">Need Help? Reach Out</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 mb-4 mb-lg-0">

         <!-- Feedback message -->
  <?php if (!empty($feedback)): ?>
    <div class="alert alert-success" role="alert" <?= strpos($feedback, 'Error') !== false ? 'error' : '' ?>">
      <?= $feedback ?>
    </div>
  <?php endif; ?>
        <form action="" method="POST">
          <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name" required>
          <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Your Email" required>
          <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject">
          <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message" required></textarea>
          <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
        </form>
      </div>
      <div class="col-lg-5">
        <h3 class="mb-4">Get in Touch</h3>
        <p class="mb-4">We are always here to help you. If you have any questions or need assistance, please feel free to reach out to us.</p>
        <p class="mb-4">You can contact us via our social media platforms, phone, email, or visit our office. We look forward to hearing from you!</p>
        <div class="">
        <h5 class="mt-4 mb-3">Contact Details</h5>
        <a href="tel:+443003030266" class="text-color mr-3"><i class="fas fa-phone"></i><strong>CALL +44 300 303 0266</strong></a><br><br>
        <a href="mailto:topstepsacademy@gmail.com" class="text-color h6 d-block">topstepsacademy@gmail.com</a><br>
        <p class="text-color h6 d-block">plot No. 09, Road 3, Phase 4, before Panraf Hospital, Nyanya,FCT Abuja</p>
        </div>
        <div class="">
        <h5 class="mb-3">Follow Us</h5>
        <ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="contact.html#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="contact.html#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="contact.html#"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="contact.html#"><i class="ti-instagram"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="contact.html#"><i class="fab fa-whatsapp"></i></a></li>
        </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /contact -->

<!-- gmap -->
<section class="section pt-0 pb-lg-5">
  <div class="row justify-content-center">
    <div class="col">
      <div class="embed-responsive embed-responsive-16by9 shadow rounded">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d126092.12041990612!2d7.6596733!3d9.0291702!3m2!1i1024!2i768!4f13.1!2m1!1stopsteps%20school!5e0!3m2!1sen!2sng!4v1750165071625!5m2!1sen!2sng" 
          width="100%" 
          height="450" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
  </section>
<!-- /gmap -->

<!-- Floating Call Button -->
<a href="tel:+443003030266" class="floating-call-btn" title="Call Us">
  <i class="fas fa-phone"></i>
</a>
@section('scripts')
<script>
<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- mixitup filter -->
<script src="plugins/mixitup/mixitup.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>
</script>
@endsection
@endsection