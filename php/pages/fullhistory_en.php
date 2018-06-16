<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes ☆ History</title>
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
			<?php echo"<a href='/php/usersbase/editor_en.php'>"; ?>
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
			<?php echo"<a href='/php/usersbase/login_en.php'>"; ?>
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
			<?php echo"<a href='/php/usersbase/signup_en.php'>"; ?>
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
	<a href="/php/news_en.php">
		<div class="menu_segment">
			<span>News</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="/php/aircrafts_en.php">
		<div class="menu_segment">
			<span>Aircrafts</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="/php/aircompanies_en.php">
		<div class="menu_segment">
			<span>Aircompanies</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
		</div>
	</a>
	<a href="/php/history_en.php">
		<div class="menu_select">
			<div class="menu_segment">
				<span>History</span>
				<div class='menu_arrow'></div>
				<div class='menu_bar'></div>
			</div>
		</div>
	</a>
	<a href="/php/contacts_en.php">
		<div class="menu_segment">
			<span>Contacts</span>
			<div class='menu_arrow'></div>
		</div>
	</a>
</div>

<div class="page">
	<div class="pagefull">
		<?php
		$history = mysqli_query($dbc, "SELECT * FROM `history` WHERE `id` = " . (int) $_GET['id']);
		if(mysqli_num_rows($history) <= 0)
		{
			echo "Page not found";
		}
		else
		{
			$his = mysqli_fetch_assoc($history);
			?>
			<div class="title"><h1>
			<?php
			echo $his['name_en']."<br/>";
			?>
			</h1>
			</div>
			<?php
			echo "<p style='margin-top: 15px;'>".$his['history_info_en']."</p><br/>";
		}
		?>
	</div>
</div>
<div class="calc_href">
	<form action="fullhistory_en.php?id=<?php echo $his['id']; ?>" method="POST">
	<input type="submit" name="calculator" value="">
</form>
</body>
</html>