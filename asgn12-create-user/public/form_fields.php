<?php

  if(!isset($bird)) {
    redirect_to(url_for('/birds.php'));
  }
?>

<dl>
  <dt>Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" /></dd>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" /></dd>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo h($bird->food); ?>" /></dd>
  <dt>Conservation Status</dt>
  <dd>
    <select name="bird[conservation_id]">
      <option value=""></option>
    <?php foreach(Bird::$CONSERVATION_OPTIONS as $conservation_id => $conservation_name) { ?>
      <option value="<?php echo $conservation_id; ?>" <?php if($bird->conservation_id == $conservation_id) { echo "selected"; } ?>><?php echo $conservation_name; ?></option>
    <?php } ?>
    </select></dd>
  <dt>Backyard Tips</dt>
  <dd><textarea name="bird[backyard_tips]" cols="60" rows="10"><?php echo h($bird->backyard_tips); ?></textarea></dd>
</dl>
