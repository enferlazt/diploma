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
if ( isset($_POST['login_upd']))
{
    if (trim($_POST['login']) == '')
    {
        echo '<div style="color: red;">Fill the field!';
    }
    else
    {
        $rezult = $dbc->query("SELECT `id` FROM `users` WHERE `login`='".$_POST['login']."'");
        $myrow = mysqli_fetch_array($rezult);
        if (!empty($myrow['id']))
        {
            echo '<div style="color: red;">User with such username already exists!</div>';
        }
        else
        {
            $dbc->query("UPDATE `users` SET `login` = '".$_POST['login']."'");
            echo '<div style="color: green;">Username edited successfully</div>';
        }
    }


}
?>

<form method="POST" action="editor_login_en.php">
    <p><strong>Enter new username</strong>:</p>
    <input type="text" name="login" maxlength="100">
    <button type="submit" name="login_upd">Edit</button>
</form>
<div class="editor">
<h3><a href="editor_en.php">Go back</a></h3>
</div>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 