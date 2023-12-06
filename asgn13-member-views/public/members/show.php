<?php require_once('../../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$member = Member::find_by_id($id);

$page_title = '' . h($member->full_name()) . '';;

include(SHARED_PATH . '/public_header.php');
?>

<div>
  <a href="<?php echo url_for('/members.php'); ?>">&laquo; Back to List</a>

  <div>
    <h1><?php echo h($member->full_name());?></h1>

    <div>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($member->username);?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($member->email); ?></dd>
      </dl>
    </div>
  </div>
</div>
