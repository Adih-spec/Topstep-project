<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Register</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="events.html#" class="row">
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="signupPhone" name="signupPhone" placeholder="Phone">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="signupName" name="signupName" placeholder="Name">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control mb-3" id="signupEmail" name="signupEmail" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control mb-3" id="signupPassword" name="signupPassword" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">SIGN UP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="events.html#" class="row">
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="loginPhone" name="loginPhone" placeholder="Phone">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="loginName" name="loginName" placeholder="Name">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control mb-3" id="loginPassword" name="loginPassword" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="https://themewagon.github.io/educenter/@@page-link">Upcoming Events</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- courses -->
<section class="section">
  <div class="container">
    <div class="row">
      <!-- event -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/event-1.jpg" alt="event thumb">
            <div class="card-date"><span>18</span><br>December</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
            <a href="event-single.html">
              <h4 class="card-title">Firefly training in trauma-informed yoga</h4>
            </a>
          </div>
        </div>
      </div>
      <!-- event -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/event-2.jpg" alt="event thumb">
            <div class="card-date"><span>21</span><br>December</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>Dhanmondi Lake, Dhaka</p>
            <a href="event-single.html">
              <h4 class="card-title">Research seminar in clinical science.</h4>
            </a>
          </div>
        </div>
      </div>
      <!-- event -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/event-2.jpg" alt="event thumb">
            <div class="card-date"><span>23</span><br>December</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>yankari game reserve</p>
            <a href="event-single.html">
              <h4 class="card-title">An excursion to the zoo</h4>
            </a>
          </div>
        </div>
      </div>
      <!-- event -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/event-2.jpg" alt="event thumb">
            <div class="card-date"><span>5</span><br>October</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>Teacher's conference summit</p>
            <a href="event-single.html">
              <h4 class="card-title">Teacher's Day</h4>
            </a>
          </div>
        </div>
      </div>
      <!-- event -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/event-2.jpg" alt="event thumb">
            <div class="card-date"><span>15</span><br>March</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>Topsteps Academy</p>
            <a href="event-single.html">
              <h4 class="card-title">Cultural Day</h4>
            </a>
          </div>
        </div>
      </div>
      <!-- event -->
      <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="../../assets/images/events/event-2.jpg" alt="event thumb">
            <div class="card-date"><span>27</span><br>May</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>Eagle Square, Abuja</p>
            <a href="event-single.html">
              <h4 class="card-title">children's day</h4>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /courses -->


<?php
include_once '../../components/footer.php';
?>
<?php
include_once '../../components/scripts.php';
?>
</body>
</html>
