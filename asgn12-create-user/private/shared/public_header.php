<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          WNC Birds
        </a>

      </h1>
      <p>
        <?php if($session->is_logged_in()) {
          echo "Welcome " . $session->username . "! "; 
        ?>
          <a href="<?php echo url_for('/logout.php'); ?>">Logout</a>
        <?php } ?>
      </p>
    </header>
