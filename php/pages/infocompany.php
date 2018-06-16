<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes ☆ Авиакомпании</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body>
<?php
require $_SERVER['DOCUMENT_ROOT']."/php/usersbase/db.php";
?>
<?php if(isset($_SESSION['login']))
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
		<div class="menu_segment">
			<span>Авиалайнеры</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="/php/aircompanies.php">
		<div class="menu_select">
			<div class="menu_segment">
				<span>Авиакомпании</span>
				<div class='menu_arrow'></div>
				<div class='menu_bar'></div>
			</div>
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
		$aircomp = mysqli_query($dbc, "SELECT * FROM `aircompanies` WHERE `id` = " . (int) $_GET['id']);
		if(mysqli_num_rows($aircomp) <= 0)
		{
			echo "Страница не найдена";
		}
		else
		{
			$acp = mysqli_fetch_assoc($aircomp);
			?>
			<div class="title"><h1>
			<?php
			echo $acp['name']."<br/></h1>";
			$rating = mysqli_query($dbc, "SELECT AVG(`rating`) as rat, `id`, `id_user`, `id_company` FROM `aircompanies_rating` WHERE `id_company` = ".(int)$acp['id']);			
			while($rat = mysqli_fetch_assoc($rating))
			{
				if($rat['id_company'] != (int)$acp['id'])
				{
					echo "<h3>Средняя оценка равна: 0</h3>";
				}
				else
				{
					echo "<h3>Средняя оценка равна: ".round($rat['rat'], 2)."</h3>";
				}
			}
			if(!isset($_SESSION['login']))
			{
				echo "Поставить оценку могут только авторизованные пользователи!&emsp;<a href='/php/usersbase/login.php'>Авторизоваться</a> или <a href='/php/usersbase/signup.php'>Зарегистрироваться</a>";
			}
			else{
			?>
			<form action="infocompany.php?id=<?php echo $acp['id']; ?>" method="POST">
			    <fieldset>
			     <legend>Поставьте оценку</legend>
			      <input type="radio" name="web" value="1">1
			      <input type="radio" name="web" value="2">2
			      <input type="radio" name="web" value="3">3
			      <input type="radio" name="web" value="4">4
			      <input type="radio" name="web" value="5">5
			    </fieldset>
			    <input type="submit" name="do_estimate" value="Оценить">
			</form>
			<?php
				$rating = mysqli_query($dbc, "SELECT * FROM `aircompanies_rating` WHERE `id_company` = ".(int)$acp['id']." AND `id_user` = ". $_SESSION['id']);

				if(isset($_POST['do_estimate']))
				{
					if(@$_POST['web'] == 0)
					{
						echo "<div style='color: red'>Виберите оценку!</div>";
					}
					else{
						if($p = mysqli_num_rows($rating) > 0)
						{
							echo "<div style='color: red'>Вы уже голосовали!</div>";
						}
						else{
							mysqli_query($dbc, "INSERT INTO `aircompanies_rating` (id_company, rating, id_user) VALUES ('".(int)$acp['id']."', '".$_POST['web']."', '".$_SESSION['id']."')");
						}
					}
				}
			}
			?>
			</div>
			<?php
			echo "<p style='margin-top: 180px;'>".$acp['company_info']."</p><br/>";
			$comments = mysqli_query($dbc, "SELECT * FROM `aircompanies_comments` WHERE `id_company` = ".(int)$acp['id']." ORDER BY `pub_com_time` DESC");
			$user = mysqli_query($dbc, "SELECT `img`,`login`,`id` FROM `users`");
			if(mysqli_num_rows($comments) <= 0)
			{
				echo "Нет комментариев<br/>";
			}
			else
				echo "Комментарии<br/>";
			while($com = mysqli_fetch_assoc($comments))
			{
				$com_us = false;
				foreach($user as $us)
				{
					if(@$us['id'] == $com['id_user'])
					{
						$com_us = $us;
						break;
					}
				}
				echo $com['pub_com_time']."<br/>";
				?>
				<img style="max-width: 100px; max-height: 100px;" src="<?php echo $us['img']; ?>">
				<?php
				echo $us['login']."<br/>";
				echo $com['comment_text']."<br/>";
			}
			if(!isset($_SESSION['login']))
			{
				echo "Комментировать записи могут только авторизованные пользователи!&emsp;<a href='/php/usersbase/login.php'>Авторизоваться</a> или <a href='/php/usersbase/signup.php'>Зарегистрироваться</a>";
			}
			else
			{
					if(isset($_POST['do_post']))
				{
					if(trim($_POST['comment']) == '')
					{
						echo '<div style="color: red;">Заполните поле!</div>';
					}
					else
					{
						echo '<div style="color: green;">Комментарий успешно добавлен!</div>';
						mysqli_query($dbc, "INSERT INTO `aircompanies_comments` (id_company, comment_text, pub_com_time, id_user) VALUES ('".(int)$acp['id']."', '".$_POST['comment']."', NOW(), '".$_SESSION['id']."')");
					}
				}
			?>
			<form action="infocompany.php?id=<?php echo $acp['id']; ?>" method="POST">
				<textarea name = "comment" placeholder="Текст комментария..."></textarea>
				<input type="submit" name="do_post" value="Добавить комментарии">
			</form>
			<?php
			}
		$dbc->query("DELETE FROM `aircompanies_comments` WHERE `comment_text` = ''");
		}
		?>
	</div>
</div>
<div class="calc_href">
	<form action="infocompany.php?id=<?php echo $acp['id']; ?>" method="POST">
	<input type="submit" name="calculator" value="">
</form>
</body>
</html>