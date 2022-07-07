<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Holland Test</title>
  <meta content="" name="description">

  <meta content="" name="keywords">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Template Main CSS File -->

  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="assets/css/login.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->


  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5" style="padding: 20px;">
      <h2 class="m-0 text-primary"><i class="fa fa-book me-3" style="font-size: 30px;"></i>Hollnad Test</h2>
    </a>


  </nav>
  <div class="d-grid gap-3">

    </header><!-- End Header -->
    <div class="p-2">
      <div class="login-wrap">
        <form class="mb-3" name="bmrform" action="loginform.php" method="post">
          <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">เข้าสู่ระบบ</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">ลงทะเบียน</label>
            <div class="login-form">
              <div class="sign-in-htm">
                <div class="group">
                  <label for="user" class="label">เลขบัตรประชาชน</label>
                  <input id="Cid" name="Cid" type="text" class="input" placeholder="X-XXXX-XXXXX-XX-X" minlength="13" maxlength="13">
                </div>

                <div class="group">
                  <input id="check" type="checkbox" class="check" checked>
                  <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <center>
                  <div class="group">
                    <button type="submit" name="btnSave" class="btn btn-primary btn-lg" value="Login">เข้าสู่ระบบ</button>
                  </div>
                </center>
                <div class="hr"></div>
                <div class="foot-lnk">
                  <a href="#forgot">Forgot Password?</a>
                </div>
              </div>
              <div class="sign-up-htm">
                <div class="group">
                  <label for="RCid" class="label">เลขบัตรประชาชน</label>
                  <input id="RCid" name="RCid" type="text" class="input" maxlength="13" placeholder="X-XXXX-XXXXX-XX-X" minlength="13" maxlength="13">

                </div>
                <div class="group">
                  <center>
                    <div class="app-paper">
                      <form class="mb-3" name="bmrform" action="update.php" method="post">

                        <input type="radio" name="gender" id="1" class="hidebx" value="ชาย" style="">
                        <label for="1" class="lbl-radio">
                          <div class="display-box">
                            <div class="size"> <i class="fas fa-male" style="font-size: 40px;"></i><br>ผู้ชาย</div>
                          </div>
                        </label>
                        <input type="radio" name="gender" id="2" class="hidebx" value="หญิง" style="">
                        <label for="2" class="lbl-radio">
                          <div class="display-box">
                            <div class="size"><i class="fas fa-female" style="font-size: 40px;"></i><br>ผู้หญิง</div>
                          </div>
                        </label>
                    </div>
                  </center>
                </div>
                <div class="group">
                  <label for="FName" class="label">ชื่อ</label>
                  <input id="FName" name="FName" type="text" class="input" data-type="text">
                </div>
                <div class="group">
                  <label for="LName" class="label">นามสกุล</label>
                  <input id="LName" name="LName" type="text" class="input" data-type="text">
                </div>
                <center>
                  <div class="group">
                    <button type="submit" name="btnRegis" class="btn btn-primary btn-lg" value="Login">ลงทะเบียน</button>
                  </div>
                </center>
                <div class="hr"></div>
                <div class="foot-lnk">
                  <label for="tab-1">Already Member?</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>