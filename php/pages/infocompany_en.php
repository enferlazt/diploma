<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes ☆ Aircompanies</title>
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
		<div class="menu_select">
			<div class="menu_segment">
				<span>Aircompanies</span>
				<div class='menu_arrow'></div>
				<div class='menu_bar'></div>
			</div>
		</div>
	</a>
	<a href="/php/history_en.php">
		<div class="menu_segment">
			<span>History</span>
			<div class='menu_arrow'></div>
			<div class='menu_bar'></div>
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
		$aircomp = mysqli_query($dbc, "SELECT * FROM `aircompanies` WHERE `id` = " . (int) $_GET['id']);
		if(mysqli_num_rows($aircomp) <= 0)
		{
			echo "Page not found";
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
					echo "<h3>The average rating is: 0</h3>";
				}
				else
				{
					echo "<h3>The average rating is: ".round($rat['rat'], 2)."</h3>";
				}
			}
			if(!isset($_SESSION['login']))
			{
				echo "Only authorized users can rate!&emsp;<a href='/php/usersbase/login_en.php'>Log In</a> or <a href='/php/usersbase/signup_en.php'>Sign Up</a>";
			}
			else{
			?>
			<form action="infocompany_en.php?id=<?php echo $acp['id']; ?>" method="POST">
			    <fieldset>
			     <legend>Select rating</legend>
			      <input type="radio" name="web" value="1">1
			      <input type="radio" name="web" value="2">2
			      <input type="radio" name="web" value="3">3
			      <input type="radio" name="web" value="4">4
			      <input type="radio" name="web" value="5">5
			    </fieldset>
			    <input type="submit" name="do_estimate" value="Estimate">
			</form>
			<?php
				$rating = mysqli_query($dbc, "SELECT * FROM `aircompanies_rating` WHERE `id_company` = ".(int)$acp['id']." AND `id_user` = ". $_SESSION['id']);

				if(isset($_POST['do_estimate']))
				{
					if(@$_POST['web'] == 0)
					{
						echo "<div style='color: red'>Select rating!</div>";
					}
					else{
						if($p = mysqli_num_rows($rating) > 0)
						{
							echo "<div style='color: red'>You have already voted!</div>";
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
			echo "<p style='margin-top: 180px;'>".$acp['company_info_en']."</p><br/>";
			$comments = mysqli_query($dbc, "SELECT * FROM `aircompanies_comments` WHERE `id_company` = ".(int)$acp['id']." ORDER BY `pub_com_time` DESC");
			$user = mysqli_query($dbc, "SELECT `img`,`login`,`id` FROM `users`");
			if(mysqli_num_rows($comments) <= 0)
			{
				echo "No comments<br/>";
			}
			else
				echo "Comments<br/>";
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
				echo "Only authorized users can comment on entries!&emsp;<a href='/php/usersbase/login_en.php'>Log In</a> or <a href='/php/usersbase/signup_en.php'>Sign Up</a>";
			}
			else
			{
					if(isset($_POST['do_post']))
				{
					if(trim($_POST['comment']) == '')
					{
						echo '<div style="color: red;">Fill the field!</div>';
					}
					else
					{
						echo '<div style="color: green;">Comment added successfully!</div>';
						mysqli_query($dbc, "INSERT INTO `aircompanies_comments` (id_company, comment_text, pub_com_time, id_user) VALUES ('".(int)$acp['id']."', '".$_POST['comment']."', NOW(), '".$_SESSION['id']."')");
					}
				}
			?>
			<form action="infocompany_en.php?id=<?php echo $acp['id']; ?>" method="POST">
				<textarea name = "comment" placeholder="Comment body..."></textarea>
				<input type="submit" name="do_post" value="Add comment">
			</form>
			<?php
			}
		$dbc->query("DELETE FROM `aircompanies_comments` WHERE `comment_text` = ''");
		}
		?>
	</div>
</div>
<div class="calc_href">
	<form action="infocompany_en.php?id=<?php echo $acp['id']; ?>" method="POST">
	<input type="submit" name="calculator" value="">
</form>
</body>
</html>