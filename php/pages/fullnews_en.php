<!DOCTYPE html>
<html>
<head><link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
	<title>Airplanes ☆ News</title>
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
		<div class="menu_select">
			<div class="menu_segment">
				<span>News</span>
				<div class='menu_arrow'></div>
				<div class='menu_bar'></div>
			</div>
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
		$news = mysqli_query($dbc, "SELECT * FROM `news` WHERE `id` = " . (int) $_GET['id']);
		if(mysqli_num_rows($news) <= 0)
		{
			echo "Page not found";
		}
		else
		{
			$nw = mysqli_fetch_assoc($news);
			mysqli_query($dbc, "UPDATE `news` SET `views` = `views` + 1 WHERE `id` = ".(int)$nw['id']);
			?>
			<div class="title"><h1>
			<?php
			echo $nw['news_name_en']."<br/>";
			?>
			</h1>
			</div>
			<?php
			echo "<p style='float:right;'>".$nw['pub_new_time']."</p>";
			echo "<p style='float:left;'>".$nw['views']." views</p><br/>";
			echo "<br/><br/>".$nw['news_text_en']."<br/>";
			?>
			</div>
			<div class="pagefull">
			<?php
			$comments = mysqli_query($dbc, "SELECT * FROM `news_comments` WHERE `id_news` = ".(int)$nw['id']." ORDER BY `pub_com_time` DESC");
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
				<img style="width: 100px; height: 100px;" src="<?php echo $us['img']; ?>">
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
						mysqli_query($dbc, "INSERT INTO `news_comments` (id_news, comment_text, pub_com_time, id_user) VALUES ('".(int)$nw['id']."', '".$_POST['comment']."', NOW(), '".$_SESSION['id']."')");
					}
				}
			?>
			<form action="fullnews_en.php?id=<?php echo $nw['id']; ?>" method="POST">
				<textarea name = "comment" placeholder="Comment body..."></textarea>
				<input type="submit" name="do_post" value="Add comment">
			</form>
			<?php
			}
		$dbc->query("DELETE FROM `news_comments` WHERE `comment_text` = ''");
		}
		?>
	</div>
</div>
<div class="calc_href">
	<form action="fullnews_en.php?id=<?php echo $nw['id']; ?>" method="POST">
	<input type="submit" name="calculator" value="">
</form>
</div>
</body>
</html>