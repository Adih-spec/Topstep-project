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
<body style="margin:0; padding:0; position:relative; min-height:100vh; display:flex; flex-direction:column;">
  <img src="../../assets/images/events/graduation.jpeg" alt="event thumb" style="position:fixed; top:0; left:0; width:100vw; height:100vh; object-fit:cover; z-index:-1;">
  <!-- Overlay content starts here -->
  <?php include_once '../../components/header.php'; ?>
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

<!-- courses -->
<section class="section" style="position:relative; z-index:1; flex:1 0 auto;">
    <div class="container">
      <div class="row">
        <!-- event -->
        <div class="col-lg-4 col-sm-6 mb-5">
          <div class="card border-0 rounded-0 hover-shadow" style="max-width: 370px; max-height: 430px;">
            <div class="card-img position-relative" style="max-width: 370px; max-height: 220px; overflow: hidden;">
              <div class="card-date"><span>26</span><br>July</div>
            </div>
            <div class="card-body">
              <!-- location -->
              <p><i class="ti-location-pin text-primary mr-2"></i>Transcorp Hilton</p>
              <a href="event-single.html">
                <h4 class="card-title">Graduation and award ceremony</h4>
              </a>
            </div>
          </div>
        </div>
        <!-- event -->
         
<?php
// Make footer always at the bottom
?>
<div style="position:relative; z-index:2; flex-shrink:0; width:100%;">
<?php include_once '../../components/footer.php'; ?>
</div>
<?php
include_once '../../components/scripts.php';
?>

</body>
</html>