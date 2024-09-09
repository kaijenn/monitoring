<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>hello</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('vendors/typicons/typicons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css') ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('images/' . $yogi->tab_icon) ?>" />

  <!-- endinject -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- reCAPTCHA script -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script>
    function validateForm() {
      var backupCaptchaField = document.querySelector('input[name="backup_captcha"]');

      if (navigator.onLine) {
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
          alert('Please complete the CAPTCHA.');
          return false;
        }
        backupCaptchaField.removeAttribute('required');
      } else {
        backupCaptchaField.setAttribute('required', 'required');
        var backupCaptcha = backupCaptchaField.value;
        if (backupCaptcha === '') {
          alert('Please complete the offline CAPTCHA.');
          return false;
        }
      }

      return true;
    }



    function checkInternet() {
      var backupCaptchaField = document.querySelector('input[name="backup_captcha"]');
      if (!navigator.onLine) {
        document.getElementById('offline-captcha').style.display = 'block';
        document.querySelector('.g-recaptcha').style.display = 'none';
        backupCaptchaField.removeAttribute('disabled'); // Enable the field for offline use
      } else {
        document.getElementById('offline-captcha').style.display = 'none';
        document.querySelector('.g-recaptcha').style.display = 'block';
        backupCaptchaField.setAttribute('disabled', 'disabled'); // Disable the field for online use
      }
    }

    window.onload = checkInternet;
  </script>
  <style>
    input[disabled] {
      display: none;
    }

    @keyframes colorTransition {
      0% {
        background-color: #003366;
      }

      50% {
        background-color: #00509e;
      }

      100% {
        background-color: #003366;
      }
    }

    .container-fluid {
      animation: colorTransition 10s ease infinite;
    }
  </style>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('vendors/feather/feather.css')?>">
  <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css')?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('images/favicon.png')?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <img src="<?= base_url('images/' . $yogi->login_icon) ?>" alt="logo" />
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="<?= base_url('home/aksi_login') ?>" method="POST" >
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="g-recaptcha" data-sitekey="6Le2zTAqAAAAACa0ZfMplicSwznXSXyDfFNyu8MQ"></div>
                <div id="offline-captcha" style="display:none;">
                  <p>Please enter the characters shown below:</p>
                  <img src="<?= base_url('Home/generateCaptcha') ?>" alt="CAPTCHA">

                  <input type="text" name="backup_captcha" class="form-control mt-2" placeholder="Enter CAPTCHA" required>
                </div>
                <div class="mt-3">
  <button class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
</div>

                <div class="my-2 d-flex justify-content-between align-items-center">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url('vendors/js/vendor.bundle.base.js')?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('js/off-canvas.js')?>"></script>
  <script src="<?= base_url('js/hoverable-collapse.js')?>"></script>
  <script src="<?= base_url('js/template.js')?>"></script>
  <script src="<?= base_url('js/settings.js')?>"></script>
  <script src="<?= base_url('js/todolist.js')?>"></script>
  <!-- endinject -->
</body>

</html>