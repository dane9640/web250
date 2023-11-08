<?php

require_once('../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['bird'] ?? NULL;

  $bird = new Bird($args);
  $result = $bird->save();

  if($result == true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'The bird was created successfully.';
    redirect_to(url_for('/show.php?id=' . $new_id));
  } else {
    // show errors
  }
} else {
  // display the form
  $bird = new Bird;
}

?>

<?php $page_title = 'Create Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/birds.php'); ?>">&laquo; Back to List</a>

  <div>
    <h1>Create Bird</h1>

    <?php  echo display_errors($bird->errors); ?>

    <form action="<?php echo url_for('/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div>
        <input type="submit" value="Create Bird" />
      </div>
    </form>
  </div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
