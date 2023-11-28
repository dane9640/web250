<?php require_once('../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$bird = Bird::find_by_id($id);

$page_title = 'Show Bird: ' . h($bird->common_name);

include(SHARED_PATH . '/public_header.php');
?>

<div>
  <a href="<?php echo url_for('/birds.php'); ?>">&laquo; Back to List</a>

  <div>
    <h1>Bird: <?php echo h($bird->common_name);?></h1>

    <div>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($bird->habitat);?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?php echo h($bird->food); ?></dd>
      </dl>
      <dl>
        <dt>Conservation Status</dt>
        <dd><?php echo h(Bird::$CONSERVATION_OPTIONS[$bird->conservation_id]); ?></dd>
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?php echo h($bird->backyard_tips); ?></dd>
      </dl>
    </div>
  </div>
</div>
