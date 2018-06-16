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
   	<option value="ru" title="pictures/ru.png"></option>
   	<option value="en" title="pictures/en.png"></option>
</select>
    <div class="top_right"> 
        <div class='button'>
            <?php echo"<a href='php/usersbase/editor.php'>"; ?>
                <div class='slide'>
                    <div class='arrow'>
                        <div class='stem'></div>
                        <div class='point'></div>
                    </div>
                </div>
                <p><?php echo "Личный кабинет"; ?></p>
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
   	<option value="ru" title="pictures/ru.png"></option>
   	<option value="en" title="pictures/en.png"></option>
</select> 
    <div class="top_right">
        <div class='button'>
            <?php echo"<a href='php/usersbase/login.php'>"; ?>
                <div class='slide'>
                    <div class='arrow'>
                        <div class='stem'></div>
                        <div class='point'></div>
                    </div>
                </div>
                <p><?php echo "Авторизация"; ?></p>
            </a>
        </div>
        <div class='button'>
            <?php echo"<a href='php/usersbase/signup.php'>"; ?>
                <div class='slide'>
                    <div class='arrow'>
                        <div class='stem'></div>
                        <div class='point'></div>
                    </div>
                </div>
                <p><?php echo "Регистрация"; ?></p>
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
                    <h3>База авиалайнеров</h3>
                    <p>Сайт располагает большой базой про различные авиалайнеры, различных авиапроизводителей. Сайт предоставляет информацию касательно каждого из представленных самолетов: от вместимости до скорости</p>
                </div>
                <div class="image_text2">
                    <h3>Информация про авиакомпании</h3>
                    <p>Детальное описание авиакомпаний и их истории. Также сайт предоставляет просмотр комментариев и оценок каждой из представленных авиакомпаний. При желании можно оставить и оценить авиакомпанию любому пользователю</p>
                </div>
                <div class="image_text3">
                    <h3>Калькулятор</h3>
                    <p>Сайт включает в себя абсолютно бесплатный калькулятор для сложных расчетов расхода топлива отдельных самолетов. Калькулятор является доступным все время и в зависимости от выбора пользователя делает расчет</p>
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
<a href="php/news.php" class="entry">Войти на сайт</a>

<script type="text/javascript" src="//code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/jquery.dd.js"></script>
<script type="text/javascript">
$("body select").msDropDown();
$("a[id='language-menu_msa_1']").attr("href", 'php/usersbase/signup.php');
$("a[href='php/usersbase/signup.php']").attr("onclick", "window.location.href='index_en.php'");
</script>
</body>
</html>