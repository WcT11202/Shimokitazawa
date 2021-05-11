<?php
if (isset($_COOKIE["membername"]))
    $MemberName = $_COOKIE["membername"];
else
    $MemberName = "Guest";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery-2.2.3.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/cartcss/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./css/P02.css">
    <script src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0 0 0 0;
            padding: 0 0 0 0;
        }

        body {
            font-family: Arial;
            font-size: 17px;
        }

        .card {
            width: 550px;
        }

        .card>img {
            width: 550px;
            height: 450px;
        }

        .card-footer {
            width: 550px;
        }

        /* Pagination links */
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        /* Style the active/current link */
        .pagination a.active {
            background-color: dodgerblue;
            color: white;
        }

        /* Add a grey background color on mouse-over */
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        .pagination {
            margin: auto;
            padding-top: 2%;
        }

        .container {
            position: relative;

            margin: 0 auto;
        }

        .container img {
            vertical-align: middle;
        }

        .container .content {
            position: absolute;
            bottom: 0;
            background: rgb(255, 255, 255);
            /* Fallback color */
            background: rgba(255, 255, 255, 0.5);
            /* Black background with 0.5 opacity */
            color: #f1f1f1;
            width: 100%;
            padding: 0 0 0 20px;
            visibility: visible;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
        }

        .blogimg {
            width: 552px;
            height: 350px;
            position: relative;
        }

        .col-6 h5 {
            background-color: rgba(255, 255, 255, 0.8);
            padding-left: 5px;
            position: absolute;
            top: 308px;
            left: 15px;
            width: 552px;
            text-align: left;
        }
        .menu {
            width: 100%;
            display: flex;
            background: #272626;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.15);
        }

        .menu ul {
            right: 10%;
        }

        .menu li {
            float: left;
            list-style: none;
            margin: 0px 50px 0px 0px;
            font-size: 20px;
            padding-top: 15px;
        }

        .menu li a {
            text-decoration: none;
            color: rgb(146, 151, 150);
            transition: color linear 0.15s;
            cursor: pointer;

        }

        .menu .menu-logo {
            margin: auto;
            margin-left: 46.5%;
            padding: 10px 10px 10px 20px;
        }

        .menu .menu-logo a {
            color: #fff;
        }

        .menu a:hover,
        .menu .current-active a {
            text-decoration: none;
            color: #FF9900;
        }

        .toggle-nav,
        .leftmenu {
            display: none;
        }

        #logo {
            height: 40px;
        }

        @media screen and (max-width: 1065px) {
            .menucontainer {
                display: flex;
            }

            .menu {
                position: relative;
                display: inline-block;
            }

            .toggle-nav {
                display: block;
                position: absolute;
                left: 4%;
                color: #ffffff;
                text-decoration: none;
                line-height: 40px;
            }

            .menu .menu-logo {
                position: relative;

            }

            .menu ul {
                display: none;
            }

            .closebtn {
                position: relative;
                margin: 16px;
                left: 80%;
                font-size: 1.5em;
            }

            .closebtn:hover {
                cursor: pointer;
                color: #FF9900;
            }

            .leftmenu {
                display: block;
                background-color: #272626;
                color: white;
                height: 100%;
                width: 45vw;
                z-index: 1;
                position: fixed;
                left: -100%;
                transition: all 1s;
                padding-left:30px;
            }

            .leftmenu.active {
                position: fixed;
                top: 0;
                left: 0%;
                transition: all 1s;
            }

            .leftul li {
                list-style: none;
                margin: 32px auto;
                font-size: 2em;
            }

            .leftul li.current-active,
            .leftul li:hover,
            .leftul li a:hover {
                color: #FF9900;
            }

            .leftul li :hover {
                cursor: pointer;
            }

            .leftul li a {
                text-decoration: none;
                color: rgb(146, 151, 150);
                transition: color linear 0.15s;
                cursor: pointer;

            }
        }
      


    </style>
</head>

<body>
    <div class="menucontainer">
        <div class="leftmenu">
            <div class="closebtn">
                X
            </div>
            <ul id="menuUl" class="leftul">
                <li class="current-active"><a href="./blog.php">認識咖啡</a></li>
                <li><a href="./orderdetail.php">訂單查詢</a></li>
                <li ><a href="./catalog.php">商店</a></li>
                <li><a href="./shopping_car.php">購物車</a></li>
                <li><?php if ($MemberName == "Guest") { ?>
                        <a href="sign_in.html">登入<i class="fa fa-sign-in" aria-hidden="true"></i></a>
                    <?php } else { ?>
                        <?= $MemberName . "<a href='logout.php'><i stytle='color:white;' class='fa fa-sign-out' aria-hidden='true'></i></a></li> " ?>

                    <?php } ?>
                </li>
            </ul>
        </div>
        <nav class="menu">
            <a id="menubtn" class="toggle-nav" href="#">☰</a>
            <div class="menu-logo"><a href="./home.html"><img id="logo" src="./img/top/logo.png" alt=""></a></div>
            <ul id="menuUl" class="">
                <li style="color: white;padding: auto;" class="current-active"><a href="./blog.php">認識咖啡</a></li>
                <li style="color: white;padding: auto;"><a href="./orderdetail.php">訂單查詢</a></li>
                <li style="color: white;padding: auto;"><a href="./catalog.php">商店</a></li>
                <li style="color: white;padding: auto;"><a href="./shopping_car.php">購物車</a></li>
                <li style="color: white;padding: auto;">
                    <?php if ($MemberName == "Guest") { ?>
                        <a href="sign_in.html"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                    <?php } else { ?>
                        <?= $MemberName . "<a style='margin-left:5px' href='logout.php'><i class='fa fa-sign-out' aria-hidden='true'></i></a></li> " ?>
                    <?php } ?>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container" style="margin-bottom:2.5%;">
        <div class="row">

            <div class="col-6" style="margin-top:1%;">
                <img class="blogimg" src="./img/blog/CoffeeFamilyTree.jpg" alt="">
                <a href="./blog/blog01.html">
                    <h5>咖啡豆的栽種</h5>
                </a>
            </div>
            <div class="col-6" style="margin-top:1%;">
                <img class="blogimg" src="./img/blog/Roastedcoffee.jpg" alt="">
                <a href="./blog/blog03.html">
                    <h5>烘焙</h5>
                </a>

            </div>
            <div class="col-6" style="margin-top:2%;">
                <img class="blogimg" src="./img/blog/Natural_processing.jpg" alt="">
                <a href="./blog/blog02.html">
                    <h5>處理法</h5>
                </a>

            </div>
            <div class="col-6" style="margin-top:2%;">
                <img class="blogimg" src="./img/blog/espressomachine.jpeg" alt=""><a href="./blog/blog04.html">
                    <h5>咖啡的萃取（上）</h5>
                </a>

            </div>
            <div class="col-6" style="margin-top:2%;">
                <img class="blogimg" src="./img/top/barista.jfif" alt=""><a href="./blog/blog05.html">
                    <h5>咖啡的萃取（下）</h5>
                </a>

            </div>
            <div class="col-6" style="margin-top:2%;">
                <img class="blogimg" src="./img/top/visual-2.jpg" alt=""><a href="./blog/blog06.html">
                    <h5>濾杯的種類</h5>
                </a>

            </div>

        </div>
    </div>
    <footer style="background-color: #272626;">
        <div style="color: #777;">
            © Copyright 2021 SHIMOKITAZAWA
        </div>
    </footer>

    <!-- <div class="container"><img style="width: 1200px; position: absolute;top: 0px;" src="./img/top/keyvisual.jpeg" alt=""></div> -->
    <script>
        $('#menubtn').click(function() {
            $('.leftmenu').toggleClass('active');
        })

        $('#menuUl li').click(function() {
            $(this).parent().find('li').each(function() {
                if ($(this).hasClass('current-active')) {
                    $(this).toggleClass('current-active');
                }
            })
            $(this).toggleClass('current-active');
        })

        $('.closebtn').click(function() {
            $('.leftmenu').toggleClass('active');
        })
    </script>
</body>

</html>