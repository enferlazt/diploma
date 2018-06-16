<?php
$dbc->query("CREATE TABLE `aircrafts`(
		`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`plane` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`model` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`plane_image` VARCHAR(255) NOT NULL,
		`plane_info` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`plane_info_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`capacity` INT(4) NOT NULL,
		`speed` INT(5) NOT NULL)");
$plane=mysqli_query($dbc, "SELECT * FROM `aircrafts`");
?>
<div class="top-page">
<form action="aircrafts.php" method="GET">
	<input type="number" name="pas_min" placeholder="Мин. кол. пассажиров" size="4">
	<input type="number" name="pas_max" placeholder="Макс. кол. пассажиров" size="4">
	<input type="number" name="pac_min" placeholder="Мин. скорость" size="5">
	<input type="number" name="pac_max" placeholder="Макс. скорость" size="5">
	<br/>
	<input type="submit" value="Поиск">
</form>
</div>
<?php
if(!empty($_GET['pas_min']) && !empty($_GET['pas_max']))
{
	$plane=mysqli_query($dbc, "SELECT * FROM `aircrafts` WHERE `capacity` BETWEEN '".$_GET['pas_min']."' AND '".$_GET['pas_max']."'");
}
if(!empty($_GET['pac_min']) && !empty($_GET['pac_max']))
{
	$plane=mysqli_query($dbc, "SELECT * FROM `aircrafts` WHERE `speed` BETWEEN '".$_GET['pac_min']."' AND '".$_GET['pac_max']."'");
}
if(!empty($_GET['pas_min']) && !empty($_GET['pas_max']) && !empty($_GET['pac_min']) && !empty($_GET['pac_max']))
{
	$plane=mysqli_query($dbc, "SELECT * FROM `aircrafts` WHERE `capacity` BETWEEN '".$_GET['pas_min']."' AND '".$_GET['pas_max']."' AND `speed` BETWEEN '".$_GET['pac_min']."' AND '".$_GET['pac_max']."'");
}
while($pl=mysqli_fetch_assoc($plane))
{
	?>
	<div class="pagestyleone">
		<a href="pages/infoaircraft.php?id=<?php echo $pl['id']; ?>">
		<img src="<?php echo $pl['plane_image']; ?>">
		<div class="pagetextone">
			<h2><?php echo $pl['plane'].$pl['model']; ?></h2>
			<small><?php echo $pl['capacity']." пассажиров<br/>"; ?></small>
			<small><?php echo $pl['speed']." км/ч<br/>"; ?></small>
			<?php echo mb_substr($pl['plane_info'], 0, 200, 'utf8');?>...<br/>
		</div>
		</a>
	</div>
	<?php
}
?>