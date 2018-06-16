<?php
require "db.php";
echo "<div class='block'>";
	if ( isset($_POST['do_login']))
	{
		$result = $dbc->query("SELECT * FROM users WHERE login='".$_POST['login']."'");
		$myrow = mysqli_fetch_array($result);
		if (empty($myrow['login'])){
			echo '<div style="color: red;">A user with such a username does not exist!</div><hr>';
		}
		else{
			if($myrow['password']==sha1($_POST['password']))
			{
				$_SESSION['login']=$myrow['login']; 
    			$_SESSION['id']=$myrow['id'];
    			echo '<div style="color: green;">You are successfully authorized!<br />You can go to <a href="editor_en.php">Your account</a>!</div><hr>';
			}
			else
			{
				echo '<div style="color: red;">Wrong password</div><hr>';
			}
		}
	}
?>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<form action="login_en.php" method="POST">
	<p>
		<p><strong>Username</strong>:</p>
		<input type="text" name="login" value="<?php echo @$_POST['login']; ?>">
	</p>

	<p>
		<p><strong>Password</strong>:</p>
		<input type="password" name="password" maxlenght="50">
	</p>

	<p>
		<button type="submit" name="do_login">Log In</button>
	</p>
	<div>Go to <a href="/index_en.php">homepage</a></div><hr>
</form>
</div>
<div class="top">
	<div class="top_right"> 
		<div class='button'>
			<?php echo"<a href='#'>"; ?>
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
			<?php echo"<a href='signup_en.php'>"; ?>
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