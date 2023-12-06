<?php

require_once('../../private/initialize.php');

if(is_post_request()) {  
  // Create record using post parameters
  $args = $_POST['member'] ?? NULL;
  $args = array_merge($args, ['user_level' => 'm']);
  
  $member = new Member($args);
  
    ////////////////////////////Google reCAPTCHA////////////////////////////
    // Your secret key
    $secretKey = "6LdR0B4pAAAAAPeYjqt4jhbesG2ZDQfWvtbIx6FM";

    // The response from reCAPTCHA
    $captcha = $_POST['g-recaptcha-response'];

    // Verify the reCAPTCHA response
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
    $responseKeys = json_decode($response, true);

    // Check if the verification was successful
    if($responseKeys["success"]) {
      // Verified. Proceed with form processing.
      $result = $member->save();
    } else {
      // Verification failed. Handle the error.
      $member->errors[] = 'Please verify that you are not a robot.';
    }
    ////////////////////////////Google reCAPTCHA////////////////////////////  

  if($result === true) {
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
  
  <a class="back-link" href="<?php echo url_for('/index.php'); ?>">&laquo; Back to List</a>
  
  <div>
    <h1>Create Member</h1>
    
    <?php  echo display_errors($member->errors); ?>

    <form action="<?php echo url_for('members/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <!-- Google reCAPTCHA -->
      <div class="g-recaptcha" data-sitekey="6LdR0B4pAAAAANViUJe319mE4W_UgLDlREqG9BCS"></div>
      <!-- Google reCAPTCHA -->
      <br/>
      <div>
        <input type="submit" value="Create Member" />
      </div>
    </form>
  </div>

<!-- Google reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
