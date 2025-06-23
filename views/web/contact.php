<?php
$feedback = ""; // Empty feedback initially

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "contact_db");

    if ($conn->connect_error) {
        $feedback = "❌ Connection failed: " . $conn->connect_error;
    } else {
        // Get and sanitize form data
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $subject = $conn->real_escape_string($_POST['subject']);
        $message = $conn->real_escape_string($_POST['message']);

        // Insert into database
        $sql = "INSERT INTO messages (name, email, subject, message)
                VALUES ('$name', '$email', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            $feedback = " Your message was sent successfully!";
        } else {
            $feedback = " Error: " . $conn->error;
        }

        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
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
  <?php
  require_once '../../components/styles.php';
  ?>
</head>
<body>
  <?php include_once '../../components/header.php'; ?>

<!-- page title -->
<section class="page-title-section overlay" data-background="../../assets/images/contact/download.jpg" style="background-repeat: no-repeat; background-size: cover; background-position: center;">
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
        <h2 class="section-title">Contact Us</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 mb-4 mb-lg-0">

         <!-- Feedback message -->
  <?php if ($feedback): ?>
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
        <p class="mb-4">You can contact us via phone, email, or visit our office. We look forward to hearing from you!</p>
        <a href="tel:+8802057843248" class="text-color h6 d-block">+880 20 5784 3248</a>
        <a href="mailto:yourmail@email.com" class="mb-5 text-color h6 d-block">topstepsacademy@gmail.com</a>
        <p>Plot No 899, Cadastral Zone 06-06 close to panraf hospital, <br>Nyanya Abuja, Nigeria</p>
      </div>
    </div>
  </div>
</section>
<!-- /contact -->

<!-- gmap -->
<div class="embed-responsive embed-responsive-16by9 shadow rounded">
<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d126092.12041990612!2d7.6596733!3d9.0291702!3m2!1i1024!2i768!4f13.1!2m1!1stopsteps%20school!5e0!3m2!1sen!2sng!4v1750165071625!5m2!1sen!2sng" 
  width="600" 
  height="450" 
  style="border:0;" 
  allowfullscreen="" 
  loading="lazy" 
  referrerpolicy="no-referrer-when-downgrade">
</iframe>
    </div>
<!-- /gmap -->

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

<?php
include_once '../../components/footer.php';
?>
<?php
include_once '../../components/scripts.php';
?>
</body>
</html>