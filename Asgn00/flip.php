<style>
	.coin {
		background: #999999;
		color: #333333;
		border-radius: 50%;
		padding: 50px;
		text-align: center;
		font-size: 2rem;
		font-weight: bold;
		width: 50px;
	}
</style>

<?php

function flip() {
	// Challenge: define this function
  return (rand(1,2) == 1) ? "H" : "T";
}

?>

<div class="coin">
	<?php echo flip(); ?>
  <br>
</div>
<a href="../index.html">Back to WEB-225</a>
