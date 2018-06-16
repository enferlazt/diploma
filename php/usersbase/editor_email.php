<?php
require "db.php";
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
            <?php echo"<a href='logout.php'>"; ?>
                <div class='slide'>
                    <div class='arrow'>
                        <div class='stem'></div>
                        <div class='point'></div>
                    </div>
                </div>
                <p><?php echo "Выйти"; ?></p>
            </a>
        </div>
        <?php echo "<div class='top_editor'>Здравствуйте, ".$_SESSION['login']."</div>"; ?>
    </div>
</div>
<?php
echo "<div class='block'>";
if ( isset($_POST['email_upd']))
{
	if (trim($_POST['email']) == '')
	{
		echo '<div style="color: red;">Заполните поле!';
	}
	else
	{
		$rezult = $dbc->query("SELECT `id` FROM `users` WHERE `email`='".$_POST['email']."'");
		$myrow = mysqli_fetch_array($rezult);
		if (!empty($myrow['id']))
		{
			echo '<div style="color: red;">Пользователь с таким email уже есть!</div>';
		}
		else
		{
			$dbc->query("UPDATE `users` SET `email` = '".$_POST['email']."'");
			echo '<div style="color: green;">email успешно изменен!</div>';
		}
	}


}
?>

<form method="POST" action="editor_email.php">
	<p><strong>Введите новый email</strong>:</p>
    <input type="email" name="email" maxlength="100">
    <button type="submit" name="email_upd">Изменить</button>
</form>
<div class="editor">
<h3><a href="editor.php">Назад</a></h3>
</div>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 