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
if ( isset($_POST['password_upd']))
{
	if (trim($_POST['password_old']) == '' || trim($_POST['password_new']) == '')
	{
		echo '<div style="color: red;">Заполните поля!</div>';
	}
	else
	{
		$rezult = $dbc->query("SELECT `password` FROM `users` WHERE `id`='".$_SESSION['id']."'");
		$myrow = mysqli_fetch_array($rezult);
		if ($myrow['password']==sha1($_POST['password_old']))
		{
			if(preg_match("#[^\w\s]#i", trim($_POST['password_new'])) || strlen(trim($_POST['password_new'])) < 6 || strlen(trim($_POST['password_new'])) > 50)
			{
				echo '<div style="color: red;">Новый пароль меньше 6 символов или содержит неверные символы!</div>';
			}
			else{
				$dbc->query("UPDATE `users` SET `password` = '".sha1($_POST['password_new'])."'");
				echo '<div style="color: green;">Пароль успешно изменен!</div>';
			}
		}
		else
		{
			echo '<div style="color: red;">Старый пароль не совпадает!</div>';
		}
	}


}
?>

<form method="POST" action="editor_password.php">
	<p><strong>Введите старый пароль</strong>:</p>
    <input type="password" name="password_old" maxlength="50">
    <p><strong>Введите новый пароль</strong>:</p>
    <input type="password" name="password_new" maxlength="50">
    <button type="submit" name="password_upd">Изменить</button>
</form>
<div class="editor">
<h3><a href="editor.php">Назад</a></h3>
</div>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 