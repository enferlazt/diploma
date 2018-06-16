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
                $errorSubmit = 'Wrong picture format!';
            }else{
                move_uploaded_file($_FILES["img"]["tmp_name"], "/php/usersbase/usersimg/".$_FILES["img"]["name"]);
                $path_file = "/php/usersbase/usersimg/".$_FILES["img"]["name"];
                $sql = mysqli_query($dbc, "UPDATE `users` SET `img` = '".$path_file."' WHERE `id` = ".(int)$_SESSION['id']);
                if($sql) 
                    echo "Avatar changed!";
            }
            if(!$errorSubmit){
                 
            }
        }
    }       
?>
<form name="user_frm" method="POST" action="editor_en.php" enctype="multipart/form-data">
    <input type="file" name="img"><br/>
    <input type="submit" value="Load image" name="load_photo">
</form>
<div class="editor">
<h3><a href="editor_login_en.php">Edit username</a><br/>
<a href="editor_email_en.php">Edit email</a><br/>
<a href="editor_password_en.php">Edit password</a></h3>
</div>
</div>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />