<!DOCTYPE html>
<html>
<head><link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes ☆ Новости</title>
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
			<?php echo"<a href='/php/usersbase/editor.php'>"; ?>
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
			<?php echo"<a href='/php/usersbase/login.php'>"; ?>
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
			<?php echo"<a href='/php/usersbase/signup.php'>"; ?>
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
		<div class="menu_select">
			<div class="menu_segment">
				<span>Новости</span>
				<div class='menu_arrow'></div>
				<div class='menu_bar'></div>
			</div>
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
		$news = mysqli_query($dbc, "SELECT * FROM `news` WHERE `id` = " . (int) $_GET['id']);
		if(mysqli_num_rows($news) <= 0)
		{
			echo "Новость не найдена";
		}
		else
		{
			$nw = mysqli_fetch_assoc($news);
			mysqli_query($dbc, "UPDATE `news` SET `views` = `views` + 1 WHERE `id` = ".(int)$nw['id']);
			?>
			<div class="title"><h1>
			<?php
			echo $nw['news_name']."<br/>";
			?>
			</h1>
			</div>
			<?php
			echo "<p style='float:right;'>".$nw['pub_new_time']."</p>";
			echo "<p style='float:left;'>".$nw['views']." просмотров</p><br/>";
			echo "<br/><br/>".$nw['news_text']."<br/>";
			?>
			</div>
			<div class="pagefull">
			<?php
			$comments = mysqli_query($dbc, "SELECT * FROM `news_comments` WHERE `id_news` = ".(int)$nw['id']." ORDER BY `pub_com_time` DESC");
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
				<img style="width: 100px; height: 100px;" src="<?php echo $us['img']; ?>">
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
						mysqli_query($dbc, "INSERT INTO `news_comments` (id_news, comment_text, pub_com_time, id_user) VALUES ('".(int)$nw['id']."', '".$_POST['comment']."', NOW(), '".$_SESSION['id']."')");
					}
				}
			?>
			<form action="fullnews.php?id=<?php echo $nw['id']; ?>" method="POST">
				<textarea name = "comment" placeholder="Текст комментария..."></textarea>
				<input type="submit" name="do_post" value="Добавить комментарии">
			</form>
			<?php
			}
		$dbc->query("DELETE FROM `news_comments` WHERE `comment_text` = ''");
		}
		?>
	</div>
</div>
<div class="calc_href">
	<form action="fullnews.php?id=<?php echo $nw['id']; ?>" method="POST">
	<input type="submit" name="calculator" value="">
</form>
</div>
</body>
</html>