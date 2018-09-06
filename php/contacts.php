<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes ☆ Контакты</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body>
<?php 
require "usersbase/db.php";
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
	<a href="news.php">
		<div class="menu_segment">
			<span>Новости</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="aircrafts.php">
		<div class="menu_segment">
			<span>Авиалайнеры</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="aircompanies.php">
		<div class="menu_segment">
			<span>Авиакомпании</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="history.php">
		<div class="menu_segment">
			<span>История</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="#">
		<div class="menu_select">
			<div class="menu_segment">
				<span>Контакты</span>
				<div class='menu_arrow'></div>
			</div>
		</div>
	</a>
</div>

<div class="calc_href">
<form action="contacts.php" method="POST">
	<input type="submit" name="calculator" value="">
</form>
</div>

<div class="page">
<div class="pagefull">
<h1><p>Контакты</p></h1>
<p>Данный сайт используется лишь как пример!</p>
<p>Авторское право — в объективном смысле — институт гражданского права, регулирующий правоотношения, связанные с созданием и использованием (изданием, исполнением, показом и т. д.) произведений науки, литературы или искусства, то есть объективных результатов творческой деятельности людей в этих областях. Программы для ЭВМ и базы данных также охраняются авторским правом. Они приравнены к литературным произведениям и сборникам, соответственно. Название «авторское право» является условным, так как закон регулирует и охраняет права «правообладателя», а не автора.</p>
<p>Английский термин копирайт ~©~ (англ. copyright, от «копировать» и «право») в английском языке обозначает авторское право, то есть право копировать, воспроизводить.</p>
<h3>Как связаться</h3>
<p>Номера телефона:</p>
<p>Украина: +380123456789</p>
<p>Россия: +71234567890</p>
<p>Англия: +441234567890</p>
<p>США: +11234567890</p>
<p>Германия: +491234567890</p>
<p>Местоположение штаб квартиры: г. Киев, ул. Первая, д. 1</p>
<p>Почтовый адрес: airplanesua@gmail.com</p>
<p>This site created by <a href="https://github.com/enferlazt">LazB</a></p>
<p>© All rights reserved</p>
</div>
</div>
</body>
</html>