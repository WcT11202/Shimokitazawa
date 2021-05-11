<?php
if (isset($_COOKIE["membername"])){
    $MemberName = $_COOKIE["membername"];}
else{
    $MemberName = "Guest";}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="./js/jquery-2.2.3.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/cartcss/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./css/P02.css">
    <script src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .modaldiv>img{width:400px}
    .modaidiv>img {
            width: 400px;
            height: 250px;
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
                <li><a href="./blog.php">認識咖啡</a></li>
                <li><a href="./orderdetail.php">訂單查詢</a></li>
                <li class="current-active"><a href="./catalog.php">商店</a></li>
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
                <li style="color: white;padding: auto;"><a href="./blog.php">認識咖啡</a></li>
                <li style="color: white;padding: auto;"><a href="./orderdetail.php">訂單查詢</a></li>
                <li style="color: white;padding: auto;" class="current-active"><a href="./catalog.php">商店</a></li>
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
    <?php

    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql = "SELECT * FROM products";
    $result = execute_sql($link, "shimokitazawa", $sql);
    $total_records = mysqli_num_rows($result);

    echo " <div class='container '>";
    echo "<div class='row' style='padding:2% 0% 5% 10% ' >";
    for ($i = 0; $i < $total_records; $i++) {
        $row = mysqli_fetch_assoc($result); //var_dump($row["image"]);
        echo "<form method='post' action='add_to_car.php?ProductID=" .
            $row["ProductID"] . "&ProductName=" . urlencode($row["ProductName"]) .
            "&UnitPrice=" . $row["UnitPrice"] . "'>";
        echo "<div class='card' style='margin-left:3%;margin-top:3%;'>";
        echo "<img class='img-fluid' id=" . $row["ProductID"] . " src='./img/shop/coffeebag/" . $row["image"] . ".png' alt=''>";
        echo "<h5>" . $row["ProductName"] . "</h5>";
        echo "<h6>$" . number_format($row["UnitPrice"],0,'',',') . "</h6>";
        echo "<input type='number'min='0'class='qty' name='quantity' size='5' value='1'>";
        echo "<button type='submit' class='addcart btn btn-danger my-cart-btn value='放入購物車'>加入購物車</button>";
        echo "</div>";
        echo "</form>";


    }
    echo "</div>";
    echo "</div>";

    //釋放資源及關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
    ?>
    <!-- </table> -->
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c00">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/EthiopianModal.jpg" alt="">
                <ul>衣索比亞 耶加雪菲
                    <li>重量｜半磅</li>
                    <li>產區｜衣索比亞</li>
                    <li>烘焙度｜中淺焙</li>
                    <li>處理法｜水洗 </li>
                    <li>風味敘述 ｜花香、檸檬、柑橘、熱帶水果</li>
                    <li>豐富的花香、檸檬香，口感酸值明亮；層次分明，由酸到甜，獨特檸檬香。</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c01">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/MandhelingModal.jpg" alt="">
                <ul>蘇門答臘 藍鑽 黃金曼特寧
                    <li>重量｜半磅</li>
                    <li>產區｜印尼</li>
                    <li>烘焙度｜中深焙</li>
                    <li>處理法｜濕刨法</li>
                    <li>風味敘述 ｜奶油、堅果、甘草、黑巧克力</li>
                    <li>奶油般的油脂，堅果香氣餘韻帶著甘草香，尾段搭配黑巧克力的香氣濃郁厚實口感。</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c02">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/KenyaAAModal.jpg" alt="">
                <ul>肯亞AA FAQ
                    <li>重量｜半磅</li>
                    <li>產區｜肯亞</li>
                    <li>烘焙度｜中焙</li>
                    <li>處理法｜水洗</li>
                    <li>風味敘述 ｜柑橘、紅酒、黑莓、果酸</li>
                    <li>柑橘淡淡果香，紅酒般質地，特別的黑莓香氣，豐富的甜感尾韻。</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c03">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/guatemalan Modal.jpg" alt="">
                <ul>瓜地馬拉 安提瓜 花神
                    <li>重量｜半磅</li>
                    <li>產區｜瓜地馬拉</li>
                    <li>烘焙度｜中焙</li>
                    <li>處理法｜水洗</li>
                    <li>風味敘述 ｜花香、柑橘、果香、檸檬</li>
                    <li>獨特花香，搭配上清新柔順的柑橘香氣，讓花香結合果香搭配出完美和諧的風味。</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c04">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/geishaModal.jpg" alt="">
                <ul>巴拿馬 藝伎
                    <li>重量｜半磅</li>
                    <li>產區｜巴拿馬</li>
                    <li>烘焙度｜淺中焙</li>
                    <li>處理法｜日曬</li>
                    <li>風味敘述｜花香、焦糖、柑橘、黑巧克力</li>
                    <li>佛手柑、茉莉花香、蜂蜜味和輕柔的口感，湧出微微檸檬花果香、淡淡香草氣息，在舌面化開帶出焦糖香甜。</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c05">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/guatemalan Modal.jpg" alt="">
                <ul>瓜地馬拉 薇薇特南果
                    <li>重量｜半磅</li>
                    <li>產區｜瓜地馬拉</li>
                    <li>烘焙度｜中深焙</li>
                    <li>處理法｜水洗</li>
                    <li>風味敘述 ｜花香、焦糖、可可、果香</li>
                    <li>明亮的花香氣息，風味清爽，焦糖般的尾韻，甘醇持久，並帶著獨特的水果香氣。</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c06">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/EthiopiansidamoModal.jpg" alt="">
                <ul>衣索比亞 獅子王
                    <li>重量｜半磅</li>
                    <li>產區｜衣索比亞</li>
                    <li>烘焙度｜淺中焙</li>
                    <li>處理法｜日曬</li>
                    <li>風味敘述 ｜莓果、蜜桃、花香、熱帶水果</li>
                    <li>豐富的花果香氣，桃子果乾及紅茶感，明亮酸感以及飽滿莓果香。</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c07">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/ddde55c88bdfbe3a255943c40145300c.jpg" alt="">
                <ul>仲夏夜紅茶
                    <li>重量｜1919g</li>
                    <li>產區｜下北澤</li>
                    <li>咖啡因含量｜致死量</li>
                    <li>滑順的口感，以及淡淡的苦杏仁味</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="mymodal">
        <div class="modal-content-p row">
            <span class="close" id="c08">&times;</span>
            <div class="modaldiv container">
                <img src="./img/shop/Modal/EthiopiansidamoModal.jpg" alt="">
                <ul>衣索比亞 西達摩 水洗G2
                    <li>重量｜半磅</li>
                    <li>產區｜衣索比亞</li>
                    <li>烘焙度｜淺焙</li>
                    <li>處理法｜水洗</li>
                    <li>風味敘述 ｜檸檬、橘皮、野薑、糖漿</li>
                    <li>甜美檸檬、橘皮、野薑、糖漿口感、多變化的水果香甜。</li>
                </ul>

            </div>
        </div>
    </div>

    </div>
    <script>
        $(function() {})
        var modal = document.getElementsByClassName("mymodal");
        console.log(modal)
        var pimg = document.getElementsByClassName('img-fluid')
        console.log(pimg)
        $(function() {
            $(".img-fluid").click(function() {
                var num = parseInt($(this).attr('id'));
                //console.log(num);
                modal[num - 1].style.display = 'block';

            })

        })
        $(function() {
            $(".close").click(function() {
                var num = parseInt($(this).attr('id').substr(1));
                modal[num].style.display = 'none';
                //console.log(num);
            })

        })

        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
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
     <footer
            style="background-color: #272626;">
            <div style="color: #777;">
                © Copyright 2021 SHIMOKITAZAWA 
            </div>
        </footer>

</body>

</html>