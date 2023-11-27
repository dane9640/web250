<?php

require_once('../private/initialize.php');

/* 
  Use the bicycles/staff/delete.php file as a guide 
  so your file mimics the same functionality.
*/
if(!isset($_GET['id'])) {
  redirect_to(url_for('/birds.php'));
}
$id = $_GET['id'];

$bird = Bird::find_by_ID($id);
if($bird == false) {
  redirect_to(url_for('/birds.php'));
}

if(is_post_request()) {

  // Delete bird
  $result = $bird->delete();

  $_SESSION['message'] = 'The bird was deleted successfully.';
  redirect_to(url_for('/birds.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <a href="<?php echo url_for('/birds.php');?>">&laquo; Back to List</a>

  <div>
    <h1>Delete Bird</h1>
    <p>Are you sure you want to delete this Bird?</p>
    <p class="item"><?php echo h($bird->common_name); ?></p>

    <form action="<?php echo url_for('/delete.php?id=' . h(u($id))); ?>" method="post">
      <div>
        <input type="submit" name="commit" value="Delete Bird" />
      </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
