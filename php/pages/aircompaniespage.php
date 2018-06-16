<?php
$dbc->query("CREATE TABLE `aircompanies`(
		`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`name` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`comp_image` VARCHAR(255) NOT NULL,
		`company_info` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`company_info_en` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL)");
$dbc->query("CREATE TABLE `aircompanies_comments`(
		`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`id_company` INT(11) NOT NULL,
		`comment_text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		`pub_com_time` DATETIME NOT NULL,
		`id_user` INT(11) NOT NULL)");
$dbc->query("CREATE TABLE `aircompanies_rating`(
		`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`id_company` INT(11) NOT NULL,
		`rating` FLOAT NOT NULL,
		`id_user` INT(11) NOT NULL)");
$aircomp=mysqli_query($dbc, "SELECT * FROM `aircompanies`");
while($acp=mysqli_fetch_assoc($aircomp))
{
	?>
	<style type="text/css">
		.aircompanies{
			text-decoration: none;
		}
	</style>
	<a href="pages/infocompany.php?id=<?php echo $acp['id']; ?>" class="aircompanies">
	<img src="<?php echo $acp['comp_image']; ?>">
	</a>
	<?php
}
?>