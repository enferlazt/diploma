<!DOCTYPE html>
<html>
<head><link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes ☆ Авиалайнеры</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body>
<?php
require $_SERVER['DOCUMENT_ROOT']."/php/usersbase/db.php";
?>
<?php if(isset($_SESSION['login']))
{?>
<div class="top">
	<div class='button'>
		<?php echo"<a href='/'>"; ?>
			<div class='slide'>
				<div class='arrow'>
					<div class='stem'></div>
					<div class='point'></div>
				</div>
			</div>
			<p><?php echo "Выйти на главную"; ?></p>
		</a>
	</div>
	<div class="top_right"> 
		<div class='button'>
			<?php echo"<a href='usersbase/editor.php'>"; ?>
				<div class='slide'>
					<div class='arrow'>
						<div class='stem'></div>
						<div class='point'></div>
					</div>
				</div>
				<p><?php echo "Личный кабинет"; ?></p>
			</a>
		</div>
	</div>
</div>
<?php
}
else
{
?>
<div class="top">
	<div class='button'>
		<?php echo"<a href='/'>"; ?>
			<div class='slide'>
				<div class='arrow'>
					<div class='stem'></div>
					<div class='point'></div>
				</div>
			</div>
			<p><?php echo "Выйти на главную"; ?></p>
		</a>
	</div>
	<div class="top_right"> 
		<div class='button'>
			<?php echo"<a href='usersbase/login.php'>"; ?>
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
			<?php echo"<a href='usersbase/signup.php'>"; ?>
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
</div> <?php
}
if(isset($_POST['calculator']))
{
	include $_SERVER['DOCUMENT_ROOT'].'/calculator/calculator.php';
	?>
	<style type="text/css">
	.calc_href{
		background-color: lightgray;
		border-radius: 15%;
	}
	</style>
<?php
}
?>
<div class='menu'>
	<a href="/php/news.php">
		<div class="menu_segment">
			<span>Новости</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="/php/aircrafts.php">
		<div class="menu_select">
			<div class="menu_segment">
				<span>Авиалайнеры</span>
				<div class='menu_arrow'></div>
				<div class='menu_bar'></div>
			</div>
		</div>
	</a>
	<a href="/php/aircompanies.php">
		<div class="menu_segment">
			<span>Авиакомпании</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="/php/history.php">
		<div class="menu_segment">
			<span>История</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="/php/contacts.php">
		<div class="menu_segment">
			<span>Контакты</span>
			<div class='menu_arrow'></div>
		</div>
	</a>
</div>
<div class="page">
	<div class="pagefull">
		<?php
		$plane = mysqli_query($dbc, "SELECT * FROM `aircrafts` WHERE `id` = " . (int) $_GET['id']);
		if(mysqli_num_rows($plane) <= 0)
		{
			echo "Страница не найдена";
		}
		else
		{
			$pl = mysqli_fetch_assoc($plane);
			?>
			<div class="title"><h1>
			<?php
			echo $pl['plane'].$pl['model']."<br/>";
			?>
			</h1>
			</div>
			<img style="margin-top: 15px;" src="<?php echo $pl['plane_image']; ?>"><br/>
			<?php
			echo $pl['capacity']." пассажиров<br/>";
			echo $pl['speed']." км/ч<br/>";
			echo $pl['plane_info']."<br/>";
		}
		?>
	</div>
</div>
<div class="calc_href">
	<form action="infoaircraft.php?id=<?php echo $pl['id']; ?>" method="POST">
	<input type="submit" name="calculator" value="">
</form>
</body>
</html>