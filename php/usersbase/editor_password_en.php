<?php
require "db.php";
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
            <?php echo"<a href='logout_en.php'>"; ?>
                <div class='slide'>
                    <div class='arrow'>
                        <div class='stem'></div>
                        <div class='point'></div>
                    </div>
                </div>
                <p><?php echo "Logout"; ?></p>
            </a>
        </div>
        <?php echo "<div class='top_editor'>Hello, ".$_SESSION['login']."</div>"; ?>
    </div>
</div>
<?php
echo "<div class='block'>";
if ( isset($_POST['password_upd']))
{
	if (trim($_POST['password_old']) == '' || trim($_POST['password_new']) == '')
	{
		echo '<div style="color: red;">Fill in the fields!</div>';
	}
	else
	{
		$rezult = $dbc->query("SELECT `password` FROM `users` WHERE `id`='".$_SESSION['id']."'");
		$myrow = mysqli_fetch_array($rezult);
		if ($myrow['password']==sha1($_POST['password_old']))
		{
			if(preg_match("#[^\w\s]#i", trim($_POST['password_new'])) || strlen(trim($_POST['password_new'])) < 6 || strlen(trim($_POST['password_new'])) > 50)
			{
				echo '<div style="color: red;">New password is less than 6 characters or contains invalid characters!</div>';
			}
			else{
				$dbc->query("UPDATE `users` SET `password` = '".sha1($_POST['password_new'])."'");
				echo '<div style="color: green;">Password edited successfully!</div>';
			}
		}
		else
		{
			echo '<div style="color: red;">The old password does not match!</div>';
		}
	}


}
?>

<form method="POST" action="editor_password_en.php">
	<p><strong>Enter a old password</strong>:</p>
    <input type="password" name="password_old" maxlength="50">
    <p><strong>Enter a new password</strong>:</p>
    <input type="password" name="password_new" maxlength="50">
    <button type="submit" name="password_upd">Edit</button>
</form>
<div class="editor">
<h3><a href="editor_en.php">Go back</a></h3>
</div>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />