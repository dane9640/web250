<?php

  if(!isset($member)) {
    redirect_to(url_for('members/members.php'));
  }
?>

<dl>
  <dt>First Name</dt>
  <dd><input type="text" name="member[first_name]" value="<?php echo h($member->first_name); ?>" /></dd>
</dl>

<dl>
  <dt>Last Name</dt>
  <dd><input type="text" name="member[last_name]" value="<?php echo h($member->last_name); ?>" /></dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="text" name="member[email]" value="<?php echo h($member->email); ?>" /></dd>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="member[username]" value="<?php echo h($member->username); ?>" /></dd>
</dl>


<?php
  echo "<p>".$member->user_level."</p>";
 if($member->user_level === "a") { 
  echo "<dl>";
  echo "<dt>Admin</dt>";
  echo "<dd><input type='checkbox' name='member[user_level]' value='a' checked/></dd>";
  echo "</dl>";
} ?>

<dl>
  <dt>Password</dt>
  <dd><input type="text" name="member[password]"/></dd>
</dl>

<dl>
  <dt>Confirm Password</dt>
  <dd><input type="text" name="member[confirm_password]"/></dd>.
</dl>
