<?php
require "db.php";
echo "<div class='block'>";
	if ( isset($_POST['do_login']))
	{
		$result = $dbc->query("SELECT * FROM users WHERE login='".$_POST['login']."'");
		$myrow = mysqli_fetch_array($result);
		if (empty($myrow['login'])){
			echo '<div style="color: red;">Пользователя с таким логином не существует!</div><hr>';
		}
		else{
			if($myrow['password']==sha1($_POST['password']))
			{
				$_SESSION['login']=$myrow['login']; 
    			$_SESSION['id']=$myrow['id'];
    			echo '<div style="color: green;">Вы успешно авторизованы!<br />Можете перейти в <a href="editor.php">личный кабинет</a>!</div><hr>';
			}
			else
			{
				echo '<div style="color: red;">Неверный пароль</div><hr>';
			}
		}
	}
?>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<form action="login.php" method="POST">
	<p>
		<p><strong>Логин</strong>:</p>
		<input type="text" name="login" value="<?php echo @$_POST['login']; ?>">
	</p>

	<p>
		<p><strong>Пароль</strong>:</p>
		<input type="password" name="password" maxlenght="50">
	</p>

	<p>
		<button type="submit" name="do_login">Авторизоваться</button>
	</p>
	<div>Выйти на <a href="/">главную</a> страницу</div><hr>
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
				<p><?php echo "Авторизация"; ?></p>
			</a>
		</div>
		<div class='button'>
			<?php echo"<a href='signup.php'>"; ?>
				<div class='slide'>
					<div class='arrow'>
						<div class='stem'></div>
						<div class='point'></div>
					</div>
				</div>
				<p><?php echo "Регистрация"; ?></p>
			</a>
		</div>
	</div>
</div>