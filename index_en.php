<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/pictures/AWT-Plane.ico" />
    <title>Airplanes</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/dd.css">
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<?php 
require "php/usersbase/db.php";
?>
<?php if(isset($_SESSION['login']))
{
	   ?>
<div class="top">
    <select id="language-menu">
        <option value="en" title="pictures/en.png"></option>
        <option value="ru" title="pictures/ru.png"></option>
    </select> 
    <div class="top_right"> 
        <div class='button'>
            <?php echo"<a href='php/usersbase/editor_en.php'>"; ?>
                <div class='slide'>
                    <div class='arrow'>
                        <div class='stem'></div>
                        <div class='point'></div>
                    </div>
                </div>
                <p><?php echo "Your account"; ?></p>
            </a>
        </div>
    </div>
</div>
<?php
}
else
{
	?> 
<div class="top">
    <select id="language-menu">
        <option value="en" title="pictures/en.png"></option>
       	<option value="ru" title="pictures/ru.png"></option>
    </select> 
    <div class="top_right">
        <div class='button'>
            <?php echo"<a href='php/usersbase/login_en.php'>"; ?>
                <div class='slide'>
                    <div class='arrow'>
                        <div class='stem'></div>
                        <div class='point'></div>
                    </div>
                </div>
                <p><?php echo "Log In"; ?></p>
            </a>
        </div>
        <div class='button'>
            <?php echo"<a href='php/usersbase/signup_en.php'>"; ?>
                <div class='slide'>
                    <div class='arrow'>
                        <div class='stem'></div>
                        <div class='point'></div>
                    </div>
                </div>
                <p><?php echo "Create Account"; ?></p>
            </a>
        </div>
    </div>
</div> <?php
}
?>
<div class="blockslider">
    <div class="main_view">
        <div class="window">
            <div class="image_reel">
                <img src="pictures/Plane.jpg" alt="" />
                <img src="pictures/Company.jpg" alt="" />
                <img src="pictures/Calculator.jpg" alt="" />
                <div class="image_text1">
                    <h3>Base of Aircrafts</h3>
                    <p>The site has a large base about various aircraft, various aircraft manufacturers. On site provides information on each of the presented aircraft: from capacity to speed</p>
                </div>
                <div class="image_text2">
                    <h3>Information about airlines</h3>
                    <p>Detailed description of airlines and their history. Also resource provides viewing of comments and ratings of each of the presented airlines. Any user can be commenting and evaluate the airline to</p>
                </div>
                <div class="image_text3">
                    <h3>Calculator</h3>
                    <p>Site includes a completely free calculator for complex calculations of fuel consumption of individual aircraft. The calculator is available all the time and does the calculation at the request of the site visitor</p>
                </div>
            </div>
        </div>
        <div class="paging">
            <a href="" rel="1"><img src="pictures/Paging.png"></a>
            <a href="" rel="2"><img src="pictures/Paging.png"></a>
            <a href="" rel="3"><img src="pictures/Paging.png"></a>
        </div>
    </div>
</div>
<a href="php/news_en.php" class="entry">Go To Website</a>

<script type="text/javascript" src="//code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/jquery.dd.js"></script>
<script type="text/javascript">
$("body select").msDropDown();
$("a[id='language-menu_msa_1']").attr("href", 'php/usersbase/signup.php');
$("a[href='php/usersbase/signup.php']").attr("onclick", "window.location.href='index.php'");
</script>
</body>
</html>