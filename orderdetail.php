<?php
if (isset($_COOKIE["membername"])){
    $MemberName = $_COOKIE["membername"];}
else{
    $MemberName = "Guest";}
    $UserID=$_COOKIE["account"];
  //var_dump($UserID);
    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql= <<<sqlCommond
    SELECT MemberID FROM members WHERE userid='{$UserID}'
    sqlCommond;
    $result=mysqli_query($link,$sql);
    $row = mysqli_fetch_row($result);
    //var_dump($row[0]);
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
        .ttd {
            border-bottom: 2px solid #fdffb6;
            color: whitesmoke;
        }
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
                <li><a href="./orderdetail.php"class="current-active">訂單查詢</a></li>
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
                <li style="color: white;padding: auto;" ><a href="./blog.php">認識咖啡</a></li>
                <li style="color: white;padding: auto;" class="current-active"><a href="./orderdetail.php">訂單查詢</a></li>
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
    <table class="container" style="margin-top:5%; width:800;">
    <!-- <form action=""method="post" class="container">
        <input type="date"name="ordered">
        <input type="submit">
    </form>          -->
        <tr style="background-color: #db6937;height:30;text-align:center;border-radius:5%">
            <td class="ttd" style="border-radius:  10px 0 0 0;">訂購時間</td>
            <td class="ttd" style="border-left:2px solid #fdffb6">商品名稱</td>
            <td class="ttd" style="border-left:2px solid #fdffb6">定價</td>
            <td class="ttd" style="border-left:2px solid #fdffb6">數量</td>
            <td class="ttd" style="border-radius:  0 10px 0 0;border-left:2px solid #fdffb6">小計</td>
        </tr>
        <?php
        
        require_once("dbtools.inc.php");
        $link = create_connection();
        $sql= <<<sqlCommond
        SELECT p.ProductName,p.UnitPrice,od.Quantity,o.OrderDate 
        FROM orderdetails od ,products p , orders o 
        WHERE od.ProductID=p.ProductID AND o.OrderID=od.OrderID 
        AND o.MemberID='{$row[0]}'
        Order by OrderDate desc
        sqlCommond;
        $result=mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
        $total_records = mysqli_num_rows($result);
        $total=0;
        
        //var_dump($_POST["ordered"]);
        //exit;            
        if ($MemberName == "Guest") {
            echo " <script>alert('請先登入會員!');</script>";
            echo "<script>window.location.href = 'sign_in.html'</script>";
        } else {
            if (empty($row)) {
                echo "<tr align='center'>";
                echo "<td style='background-color:wheat;' colspan='6'>目前沒有任何訂購明細</td>";
                echo "</tr>";
            } else {
                $result=mysqli_query($link,$sql);
                
                //var_dump($row);
                //顯示過去訂單內容 
                $total_records = mysqli_num_rows($result);
                for( $i=0;$i <$total_records; $i++){
                    $row = mysqli_fetch_assoc($result);
                    //計算小計
                    $sub_total = $row["UnitPrice"] * $row["Quantity"];
                    //計算總計
                    $total += $sub_total;
                    //顯示各欄位資料
                    echo "<form method='post' action=''>";
                    echo "<tr style='background-color: #ffd6a5;'>";
                    echo "<td style='border-top:2px solid #fdffb6'align='center'>".$row["OrderDate"]."</td>";
                    echo "<td style='border-top:2px solid #fdffb6;border-left:2px solid #fdffb6;height:40px' align='center''>" . $row["ProductName"] . "</td>";
                    echo "<td style='border-top:2px solid #fdffb6;border-left:2px solid #fdffb6;padding-right:5px;' align='right'>$" .  number_format($row["UnitPrice"],0,'',',') . "</td>";
                    echo "<td style='border-top:2px solid #fdffb6;border-left:2px solid #fdffb6' align='center'>". $row["Quantity"] ."</td>";
                    echo "<td style='border-top:2px solid #fdffb6;border-left:2px solid #fdffb6;padding-right:5px;' align='right'>$" . number_format($sub_total,0,'',',') . "</td>";
                    echo "</tr>";
                    echo "</form>";
                }
                echo "<tr align='right' >";
                echo "<td style='border-top:2px solid #fdffb6 ;background-color:wheat;' colspan='6'></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <footer
            style="background-color: #272626;">
            <div style="color: #777;">
                © Copyright 2021 SHIMOKITAZAWA 
            </div>
        </footer>
        
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