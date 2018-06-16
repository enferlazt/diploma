<?php
require "db.php";
echo "<div class='block'>";
	if ( isset($_POST['do_signup'])) {
		$errors = array();
		if (trim($_POST['login']) == '') {
			$errors[] = 'Enter username!';
		}
		if (trim($_POST['email']) == '') {
			$errors[] = 'Enter email!';
		}
		if(preg_match("#[^\w\s]#i", trim($_POST['password'])) || strlen(trim($_POST['password'])) < 6 || strlen(trim($_POST['password'])) > 50)
		{
			$errors[] = 'Password is less than 6 characters or contains invalid characters!';
		}
		if (trim($_POST['password1'] != $_POST['password'])) {
			$errors[] = 'Incorrectly repeated the password!';
		}
		$rezult = $dbc->query("SELECT `id` FROM `users` WHERE `login`='".$_POST['login']."'");
		$myrow = mysqli_fetch_array($rezult);
		if (!empty($myrow['id']))
		{
			$errors[] = 'User with such username already exists!';
		}
		$rezult = $dbc->query("SELECT `id` FROM `users` WHERE `email`='".$_POST['email']."'");
		$myrow = mysqli_fetch_array($rezult);
		if (!empty($myrow['id']))
		{
			$errors[] = 'User with such email already exists!';
		}
	if (empty($errors)) {
		$dbc->query("CREATE TABLE `users`(
				`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				`login` VARCHAR(100) NOT NULL,
				`email` VARCHAR(100) NOT NULL,
				`password` VARCHAR(50) NOT NULL,
				`img` VARCHAR(255) DEFAULT '/pictures/default-photo.jpg'
				)");
		@$dbc->query("INSERT INTO `users` (`login`, `email`, `password`) 
                        VALUES ('".$_POST['login']."','".$_POST['email']."','".sha1($_POST['password'])."')");
		echo '<div style="color: green;">You have successfully registered!</div><hr>';
	} else
	{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}
}
?>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<form action="signup_en.php" method="POST">

	<p>
		<p><strong>Username</strong>:</p>
		<input type="text" name="login" value="<?php echo @$_POST['login']; ?>" maxlength="100">
	</p>

	<p>
		<p><strong>email</strong>:</p>
		<input type="email" name="email" value="<?php echo @$_POST['email']; ?>" maxlength="100">
	</p>

	<p>
		<p><strong>Password</strong>:</p>
		<input type="password" name="password" maxlength="50">
	</p>

	<p>
		<p><strong>Confirm password</strong>:</p>
		<input type="password" name="password1" maxlength="50">
	</p>

	<p>
		<button type="submit" name="do_signup">Sign Up</button>
	</p>
	<?php
	$dbc->query("DELETE FROM `users` WHERE `login` = '' OR `email` = ''");
	echo '<div>Go to the <a href="/index_en.php">homepage</a></div><hr>';
	?>
</form>
</div>
<div class="top">
	<div class="top_right"> 
		<div class='button'>
			<?php echo"<a href='login_en.php'>"; ?>
				<div class='slide'>
					<div class='arrow'>
						<div class='stem'></div>
						<div class='point'></div>
					</div>
				</div>
				<p><?php echo "Log In"; ?></p>
			</a>
		</div>
		<div class='button'>
			<?php echo"<a href='#'>"; ?>
				<div class='slide'>
					<div class='arrow'>
						<div class='stem'></div>
						<div class='point'></div>
					</div>
				</div>
				<p><?php echo "Create Account"; ?></p>
			</a>
		</div>
	</div>
</div>