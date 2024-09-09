<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $captcha_response = $_POST['g-recaptcha-response'];

    if (!$captcha_response) {
        echo "Please complete the CAPTCHA.";
    } else {
        $secret_key = "6Le2zTAqAAAAAP9soSvo-5sAmuZ5dRaKKBzOc-42";

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secret_key,
            'response' => $captcha_response
        ];
        $options = [
            'http' => [
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        $result_json = json_decode($result);
        if ($result_json && $result_json->success) {
            echo "CAPTCHA is valid. Proceed with login process.";
        } else {
            echo "Failed to verify CAPTCHA. Please try again.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">




  <!DOCTYPE html>
  <html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$yogi->nama_website?></title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('vendors/feather/feather.css')?>">
  <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css')?>">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">
  <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('js/select.dataTables.min.css')?>">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css')?>">
  <!-- endinject -->

  <!-- Add Material Design Icons -->
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">


  <link rel="shortcut icon" href="<?= base_url('images/' . $yogi->tab_icon) ?>" />
</head>