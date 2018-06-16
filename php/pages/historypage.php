<?php
$dbc->query("CREATE TABLE `history`(
		`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`name` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`history_image` VARCHAR(255) NOT NULL,
		`history_info` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`history_info_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL)");
$history=mysqli_query($dbc, "SELECT * FROM `history`");
while($his=mysqli_fetch_assoc($history))
{
	?>
	<div class="pagestyleone">
		<a href="pages/fullhistory.php?id=<?php echo $his['id']; ?>">
		<img src="<?php echo $his['history_image']; ?>">
		<div class="pagetextone">
			<h2><?php echo $his['name']; ?></h2>
			<?php echo mb_substr($his['history_info'], 0, 200, 'utf8');?>...<br/>
		</div>
		</a>
	</div>
	<?php
}
?>