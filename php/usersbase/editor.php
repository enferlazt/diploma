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
$sql = mysqli_query($dbc, "SELECT `login`, `email`, `img` FROM `users` WHERE `id` = ".(int)$_SESSION['id']);
$row = mysqli_fetch_assoc($sql);
?>
<h2><?php echo $row['login']; ?></h2>
<h2><?php echo $row['email']; ?></h2>
<img style="max-width: 200px; max-height: 200px;" src="<?php echo $row['img']; ?>"/>
<?php
$errorSubmit = false;
    if(isset($_POST["load_photo"])){
        if(isset($_FILES['img']) && $_FILES['img'] !="")
        {
            $whitelist = array(".jpeg", ".png", ".jpg");
            $error = true;
            foreach  ($whitelist as  $item) {
                if(preg_match("/$item\$/i",$_FILES['img']['name'])) $error = false;
            }
            if($error){
                $errorSubmit = 'Неверный формат картинки!';
            }else{
                move_uploaded_file($_FILES["img"]["tmp_name"], "/php/usersbase/usersimg/".$_FILES["img"]["name"]);
                $path_file = "/php/usersbase/usersimg/".$_FILES["img"]["name"];
                $sql = mysqli_query($dbc, "UPDATE `users` SET `img` = '".$path_file."' WHERE `id` = ".(int)$_SESSION['id']);
                if($sql) 
                    echo "Аватар изменен!";
            }
            if(!$errorSubmit){
                 
            }
        }
    }       
?>
<form name="user_frm" method="POST" action="editor.php" enctype="multipart/form-data">
    <input type="file" name="img"><br/>
    <input type="submit" value="Загрузить картинку" name="load_photo">
</form>
<div class="editor">
<h3><a href="editor_login.php">Изменить логин </a><br/>
<a href="editor_email.php">Изменить email </a><br/>
<a href="editor_password.php">Изменить пароль </a></h3>
</div>
</div>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 