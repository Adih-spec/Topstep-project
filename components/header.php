<style>
  #chat-float-btn {
  position: fixed;
  bottom: 30px;
  right: 30px;
  z-index: 1050;
  background: linear-gradient(135deg,#ffbc3b 60%,#ffbc3b 100%);
  color: #fff;
  border: none;
  border-radius: 50%;
  width: 62px;
  height: 62px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.18);
  font-size: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: box-shadow 0.2s;
}
#chat-float-btn:hover {
  box-shadow: 0 6px 24px rgba(255,188,59,0.25);
  background: linear-gradient(135deg, #ffbc3b 60%, #ffbc3b 100%);
}
#chat-popup {
  display: none;
  position: fixed;
  bottom: 100px;
  right: 40px;
  z-index: 1060;
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 6px 32px rgba(0,0,0,0.18);
  width: 340px;
  max-width: 92vw;
  animation: chatPopupFadeIn 0.25s;
}
@keyframes chatPopupFadeIn {
  from { opacity: 0; transform: translateY(30px);}
  to { opacity: 1; transform: translateY(0);}
}
#chat-popup-header {
  background: linear-gradient(135deg, #ffbc3b 60%, #ffbc3b 100%);
  color: #fff;
  padding: 14px 18px;
  border-radius: 16px 16px 0 0;
  font-weight: 600;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 17px;
  letter-spacing: 0.2px;
}
#chat-popup-header i {
  margin-right: 7px;
  font-size: 18px;
  vertical-align: middle;
}
#chat-popup-close {
  background: none;
  border: none;
  color: #fff;
  font-size: 22px;
  cursor: pointer;
  transition: color 0.2s;
}
#chat-popup-close:hover {
  color: #ffd700;
}
#chat-popup-body {
  padding: 18px 18px 14px 18px;
  font-size: 15px;
  color: #333;
  background: #f8fafd;
  border-radius: 0 0 16px 16px;
}
#chat-messages {
  margin-bottom: 8px;
  min-height: 48px;
}
.chat-message {
  padding: 8px 15px;
  border-radius: 18px;
  max-width: 85%;
  word-break: break-word;
  font-size: 15px;
  box-shadow: 0 1px 4px rgba(0,123,255,0.04);
  display: inline-block;
  line-height: 1.5;
}
.chat-message.bot {
  background: #e9f2ff;
  color: #1a2a3a;
  align-self: flex-start;
  border-bottom-left-radius: 4px;
}
.chat-message.user {
  background: linear-gradient(135deg, #ffbc3b 60%, #ffbc3b 100%);
  color: #fff;
  align-self: flex-end;
  margin-left: auto;
  border-bottom-right-radius: 4px;
}
#chat-form input:focus {
  outline: none;
  box-shadow: 0 0 0 2px #ffbc3b33;
}
#chat-form input {
  font-size: 15px;
  height: 38px;
  background: #f4f8fb;
  border: 1px solid #dbe2ea;
  transition: border 0.2s;
}
#chat-form input:focus {
  border: 1.5px solid #ffbc3b;
  background: #fff;
}
#chat-form button {
  height: 38px;
  font-size: 15px;
  font-weight: 500;
  box-shadow: none;
  border: none;
  background: linear-gradient(135deg, #ffbc3b 60%, #ffbc3b 100%);
  transition: background 0.2s;
}
#chat-form button:hover {
  background: linear-gradient(135deg, #ffd700 60%, #ffc107 100%);
}
@media (max-width: 500px) {
  #chat-popup {
    right: 5vw;
    width: 98vw;
    min-width: 0;
  }
  #chat-popup-body {
    padding: 12px 6vw 10px 6vw;
  }
}

</style>

    <!-- header -->
<header class="fixed-top header">
  <!-- top header -->
  <div class="top-header py-2 bg-white">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 text-center text-lg-left">
          <a class="text-color mr-3" href="callto:+443003030266"><strong>CALL</strong> +44 300 303 0266</a>
          <ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="index.html#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="index.html#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="index.html#"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="index.html#"><i class="ti-instagram"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
          <ul class="list-inline">
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="notice.html">notice</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="index.html#" data-toggle="modal" data-target="#loginModal">login</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="index.html#" data-toggle="modal" data-target="#signupModal">register</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
        <a class="navbar-brand" href=""><img src="../../assets/images/tps-logo.png" alt="logo" class="img-fluid" width="110"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item active">
              <a class="nav-link" href="">Home</a>
            </li>
            <li class="nav-item @@about">
              <a class="nav-link" href="">About</a>
            </li>
            <li class="nav-item @@courses">
              <a class="nav-link" href="">PROGRAMS</a>
            </li>
            <li class="nav-item @@events">
              <a class="nav-link" href="">EVENTS</a>
            </li>
            <li class="nav-item @@blog">
              <a class="nav-link" href="">BLOG</a>
            </li>
            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="index.html#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">Teachers</a>
                <a class="dropdown-item" href="">Admission</a>
                <a class="dropdown-item" href="">Calendar</a>
                <a class="dropdown-item" href="">Event Details</a>
                <a class="dropdown-item" href="">Gallery</a>
              </div>
            </li>
            <li class="nav-item @@contact">
              <a class="nav-link" href="">CONTACT</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- /header -->
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
                    <form action="index.html#" class="row">
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

<!-- chat icon -->
<!-- Floating Chat Button -->

<!-- Floating Chat Button -->
<button id="chat-float-btn" title="Chat">
  <span>&#128172;</span>
</button>

<div id="chat-popup">
  <div id="chat-popup-header">
    <span><i class="ti-comment-alt"></i> Live Chat</span>
    <button id="chat-popup-close" aria-label="Close">&times;</button>
  </div>
  <div id="chat-popup-body" style="max-height: 320px; overflow-y: auto; background: #f8fafd;">
    <div id="chat-messages" style="display: flex; flex-direction: column; gap: 8px;">
      <div class="chat-message bot">
        Hi! How can we help you today?
      </div>
    </div>
    <form id="chat-form" autocomplete="off" style="margin-top: 12px; display: flex; gap: 6px;">
      <input type="text" id="chat-input" class="form-control" placeholder="Type your message..." style="flex:1; border-radius: 20px; border: 1px solid #dbe2ea; padding-left: 14px;">
      <button type="submit" class="btn btn-primary" style="border-radius: 20px; padding: 0 18px; font-weight: 500;">Send</button>
    </form>
  </div>
</div>


<script>
document.getElementById('chat-float-btn').onclick = function() {
  document.getElementById('chat-popup').style.display = 'block';
};
document.getElementById('chat-popup-close').onclick = function() {
  document.getElementById('chat-popup').style.display = 'none';
};
</script>
<!-- end chat icon -->