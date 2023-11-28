<?php

require_once('../../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['member'] ?? NULL;

  $member = new Member($args);
  $result = $member->save();

  if($result == true) {
    $new_id = $member->id;
    $_SESSION['message'] = 'The member was created successfully.';
    redirect_to(url_for('members/detail.php?id=' . $new_id));
  } else {
    // show errors
  }
} else {
  // display the form
  $member = new Member;
}

?>

<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('members/members.php'); ?>">&laquo; Back to List</a>

  <div>
    <h1>Create Member</h1>

    <?php  echo display_errors($member->errors); ?>

    <form action="<?php echo url_for('members/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div>
        <input type="submit" value="Create Member" />
      </div>
    </form>
  </div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
