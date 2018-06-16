<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes ☆ Contacts</title>
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
		<?php echo"<a href='/index_en.php'>"; ?>
			<div class='slide'>
				<div class='arrow'>
					<div class='stem'></div>
					<div class='point'></div>
				</div>
			</div>
			<p><?php echo "To the homepage"; ?></p>
		</a>
	</div>
	<div class="top_right"> 
		<div class='button'>
			<?php echo"<a href='usersbase/editor_en.php'>"; ?>
				<div class='slide'>
					<div class='arrow'>
						<div class='stem'></div>
						<div class='point'></div>
					</div>
				</div>
				<p><?php echo "Your account"; ?></p>
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
		<?php echo"<a href='/index_en.php'>"; ?>
			<div class='slide'>
				<div class='arrow'>
					<div class='stem'></div>
					<div class='point'></div>
				</div>
			</div>
			<p><?php echo "To the homepage"; ?></p>
		</a>
	</div>
	<div class="top_right"> 
		<div class='button'>
			<?php echo"<a href='usersbase/login_en.php'>"; ?>
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
			<?php echo"<a href='usersbase/signup_en.php'>"; ?>
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
</div> <?php
}

if(isset($_POST['calculator']))
{
	include $_SERVER['DOCUMENT_ROOT'].'/calculator/calculator_en.php';
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
	<a href="news_en.php">
		<div class="menu_segment">
			<span>News</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="aircrafts_en.php">
		<div class="menu_segment">
			<span>Aircrafts</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="aircompanies_en.php">
		<div class="menu_segment">
			<span>Aircompanies</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="history_en.php">
		<div class="menu_segment">
			<span>History</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="#">
		<div class="menu_select">
			<div class="menu_segment">
				<span>Contacts</span>
				<div class='menu_arrow'></div>
			</div>
		</div>
	</a>
</div>

<div class="calc_href">
<form action="contacts_en.php" method="POST">
	<input type="submit" name="calculator" value="">
</form>
</div>

<div class="page">
<div class="pagefull">
<h1><p>Contacts</p></h1>
<p>This site is used only as an example!</p>
<p>Copyright is a legal right that grants the creator of an original work exclusive rights for its use and distribution. This is usually only for a limited time. The exclusive rights are not absolute but limited by limitations and exceptions to copyright law, including fair use. A major limitation on copyright is that copyright protects only the original expression of ideas, and not the underlying ideas themselves.</p>
<p>Typically, the duration of a copyright spans the author's life plus 50 to 100 years (that is, copyright typically expires 50 to 100 years after the author dies, depending on the jurisdiction). Some countries require certain copyright formalities to establishing copyright, but most recognize copyright in any completed work, without formal registration. Generally, copyright is enforced as a civil matter, though some jurisdictions do apply criminal sanctions.</p>
<h3>How to contact</h3>
<p>Phone Numbers:</p>
<p>Ukraine: +380123456789</p>
<p>Russia: +71234567890</p>
<p>England: +441234567890</p>
<p>United States: +11234567890</p>
<p>Germany: +491234567890</p>
<p>Location of the headquarters of the apartment: Kiev, st. The first, d. 1</p>
<p>Postal address: airplanesua@gmail.com</p>
<p>This site created by <a href="https://www.upwork.com/o/profiles/users/_~0195cd9d97f469ca75/">LazB</a></p>
<p>© All rights reserved</p>
</div>
</div>
</body>
</html>