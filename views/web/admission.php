<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<!-- page title -->
<section class="page-title-section overlay" data-background="../../assets/images/scholarship-item-5.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="https://themewagon.github.io/educenter/@@page-link">Admission Process</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">
          Welcome! Start your journey with us and join a vibrant academic community.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- scholarship -->
<section class="section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6 mb-4 mb-md-0">
        <img class="img-fluid" src="../../assets/images/scholarship/scholarship-item-1.jpg" alt="scholarship news">
      </div>
      <div class="col-md-6">
        <h2>ADMISSION PROCESS</h2>
        <strong class="mb-4 d-block"><i>Join a vibrant academic community dedicated to your success.</i></strong>
        <p>
          Our admission process is designed to identify students who are passionate, driven, and ready to excel in their chosen fields. We welcome applicants from diverse backgrounds and encourage you to showcase your achievements, talents, and aspirations.
        </p>
        <p>
          To begin your journey, complete the online application form and submit all required documents, including academic transcripts and letters of recommendation. Our admissions team carefully reviews each application to ensure a holistic evaluation. Shortlisted candidates may be invited for an interview or additional assessments.
        </p>
        <p>
          We are committed to making the process transparent and supportive. If you have any questions, our admissions counselors are available to guide you every step of the way. Take the first step toward a rewarding educational experience with us.
        </p>
      </div>
    </div>
   <div class="row justify-content-center">
  <!-- Card 1: Grade Classes -->
  <div class="col-lg-4 col-sm-6 mb-4 d-flex">
    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0 w-100 h-100">
      <img
        class="card-img-top rounded-0"
        src="../../assets/images/scholarship/scholarship-item-5.jpg"
        alt="scholarship-thumb"
      />
      <div class="card-body d-flex flex-column">
        <h4 class="card-title mb-3">GRADE CLASSES</h4>
        <ul class="list-styled flex-grow-1">
         <li><a href="admission-process.php" class="btn btn-link p-0">GRADE ONE</a></li>
         <li><a href="admission-process.php" class="btn btn-link p-0">GRADE TWO</a></li>
         <li><a href="admission-process.php" class="btn btn-link p-0">GRADE THREE</a></li>
         <li><a href="admission-process.php" class="btn btn-link p-0">GRADE FOUR</a></li>
         <li><a href="admission-process.php" class="btn btn-link p-0">GRADE FIVE</a></li>
         <li><a href="admission-process.php" class="btn btn-link p-0">GRADE SIX</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Card 2: Junior Classes -->
  <div class="col-lg-4 col-sm-6 mb-4 d-flex">
    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0 w-100 h-100">
      <img
        class="card-img-top rounded-0"
        src="../../assets/images/scholarship/scholarship-item-4.jpg"
        alt="scholarship-thumb"
      />
      <div class="card-body d-flex flex-column">
        <h4 class="card-title mb-3">JUNIOR CLASSES</h4>
        <ul class="list-styled flex-grow-1">
          <li><a href="application-process.php" class="btn btn-link p-0">jSS ONE</a></li>
          <li><a href="application-process.php" class="btn btn-link p-0">JSS TWO</a></li>
          <li><a href="application-process.php" class="btn btn-link p-0">JSS THREE</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Card 3: Secondary Classes -->
  <div class="col-lg-4 col-sm-6 mb-4 d-flex">
    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0 w-100 h-100">
      <img
        class="card-img-top rounded-0"
        src="../../assets/images/scholarship/scholarship-item-6.jpg"
        alt="scholarship-thumb"
      />
      <div class="card-body d-flex flex-column">
        <h4 class="card-title mb-3">SECONDARY CLASSES</h4>
        <ul class="list-styled flex-grow-1">
          <li><a href="application-process.php" class="btn btn-link p-0">SSS ONE</a></li>
          <li><a href="application-process.php" class="btn btn-link p-0">SSS TWO</a></li>
          <li><a href="application-process.php" class="btn btn-link p-0">SSS THREE</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- /scholarship -->
<?php
include_once '../../components/footer.php';
?>
<?php
include_once '../../components/scripts.php';
?>
</body>
</html>