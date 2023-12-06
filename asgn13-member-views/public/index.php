<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

  <ul>
    <li><a href="<?php echo url_for('/birds.php'); ?>">View Our Birds</a></li>
    <?php if($member->user_level === "a") { 
      echo "<li><a href='" . url_for('members/members.php') . "'>View Our Members</a></li>";
    } ?>
    <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
  </ul>
    

<?php include(SHARED_PATH . '/public_footer.php'); ?>