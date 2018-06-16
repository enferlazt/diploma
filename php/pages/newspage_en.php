<?php
$dbc->query("CREATE TABLE `news`(
		`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`news_name` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`news_name_en` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`news_image` VARCHAR(255) DEFAULT '/pictures/news/default.jpg',
		`news_text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`news_text_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`theme_id` INT(11) NOT NULL,
		`pub_new_time` DATETIME NOT NULL,
		`views` INT(11) DEFAULT 0)");
$dbc->query("CREATE TABLE `news_themes`(
		`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`theme` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`theme_en` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL)");
$dbc->query("CREATE TABLE `news_comments`(
		`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`id_news` INT(11) NOT NULL,
		`comment_text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`pub_com_time` DATETIME NOT NULL,
		`id_user` INT(11) NOT NULL)");
$theme=mysqli_query($dbc, "SELECT * FROM `news_themes`");
$news=mysqli_query($dbc, "SELECT * FROM `news` ORDER BY `pub_new_time` DESC");
?>
<div class="top-page">
<form action="news_en.php" method="GET">
	<select name=theme required>
		<option value="" disabled selected>Select topic:</option>
		<option value="1">All</option>
		<option value="2">Planes</option>
		<option value="3">Airline companies</option>
	</select>
	<input type="submit" value="Search">
</form>
</div>
<?php
if(@$_GET['theme'] == 1)
{}
if(@$_GET['theme'] == 2)
{
	$news=mysqli_query($dbc, "SELECT * FROM `news` WHERE `theme_id`='1' ORDER BY `pub_new_time` DESC");
}
if(@$_GET['theme'] == 3)
{
	$news=mysqli_query($dbc, "SELECT * FROM `news` WHERE `theme_id`='2' ORDER BY `pub_new_time` DESC");
}
while($nw=mysqli_fetch_assoc($news))
{
	?>
	<div class="pagestyleone">
		<a href="pages/fullnews_en.php?id=<?php echo $nw['id']; ?>">
		<img src="<?php echo $nw['news_image']; ?>">
		<div class="pagetextone">
			<h2><?php echo $nw['news_name_en']; ?></h2>
			<?php
			$nw_th = false;
			foreach($theme as $th)
			{
				if($th['id'] == $nw['theme_id'])
				{
					$nw_th = $th;
					break;
				}
			}
			?>
			<p><?php echo "Topic: ".$nw_th['theme_en']; ?></p>
			<?php echo mb_substr($nw['news_text_en'], 0, 200, 'utf8');?>...<br/>
		</div>
		</a>
	</div>
	<?php
}
?>