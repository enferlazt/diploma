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
if ( isset($_POST['login_upd']))
{
	if (trim($_POST['login']) == '')
	{
		echo '<div style="color: red;">Заполните поле!';
	}
	else
	{
		$rezult = $dbc->query("SELECT `id` FROM `users` WHERE `login`='".$_POST['login']."'");
		$myrow = mysqli_fetch_array($rezult);
		if (!empty($myrow['id']))
		{
			echo '<div style="color: red;">Пользователь с таким логином уже есть!</div>';
		}
		else
		{
			$dbc->query("UPDATE `users` SET `login` = '".$_POST['login']."'");
			echo '<div style="color: green;">Логин успешно изменен!</div>';
		}
	}


}
?>

<form method="POST" action="editor_login.php">
	<p><strong>Введите новый логин</strong>:</p>
    <input type="text" name="login" maxlength="100">
    <button type="submit" name="login_upd">Изменить</button>
</form>
<div class="editor">
<h3><a href="editor.php">Назад</a></h3>
</div>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 