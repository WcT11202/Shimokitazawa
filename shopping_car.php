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
   
    
    .ttd {
      border-bottom: 2px solid #fdffb6;
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
                <li><a href="./orderdetail.php">訂單查詢</a></li>
                <li ><a href="./catalog.php">商店</a></li>
                <li><a href="./shopping_car.php" class="current-active">購物車</a></li>
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
                <li style="color: white;padding: auto;"><a href="./orderdetail.php">訂單查詢</a></li>
                <li style="color: white;padding: auto;"><a href="./catalog.php">商店</a></li>
                <li style="color: white;padding: auto;" class="current-active"><a href="./shopping_car.php">購物車</a></li>
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
    <tr style="background-color: #db6937;height:30;text-align:center;border-radius:5%">
      <td class="ttd" style="border-radius:  10px 0 0 0;">商品名稱</td>
      <td class="ttd" style="border-left:2px solid #fdffb6">定價</td>
      <td class="ttd" style="border-left:2px solid #fdffb6">數量</td>
      <td class="ttd" style="border-left:2px solid #fdffb6">小計</td>
      <td class="ttd" style="border-radius:  0 10px 0 0;border-left:2px solid #fdffb6">變更數量</td>
    </tr>
    <?php
    //若購物車是空的，就顯示 "目前購物車內沒有任何產品及數量" 訊息
    if (empty($_COOKIE["book_no_list"])) {
      echo "<tr align='center'>";
      echo "<td style='background-color:wheat;' colspan='6'>目前購物車內沒有任何商品！</td>";
      echo "</tr>";
    } else {
      //取得購物車資料
      $book_no_array = explode(",", $_COOKIE["book_no_list"]);
      $book_name_array = explode(",", $_COOKIE["book_name_list"]);
      $price_array = explode(",", $_COOKIE["price_list"]);
      $quantity_array = explode(",", $_COOKIE["quantity_list"]);

      //顯示購物車內容
      $total = 0;
      for ($i = 0; $i < count($book_no_array); $i++) {
        //計算小計
        $sub_total = $price_array[$i] * $quantity_array[$i];

        //計算總計
        $total += $sub_total;
        
        //顯示各欄位資料
        echo "<form method='post' action='change.php?book_no=" .
          $book_no_array[$i] . "'>"; 
        echo "<tr style='background-color: #ffd6a5;'>";		
        echo "<td style='border-top:2px solid #fdffb6;height:40px' align='center''>" . $book_name_array[$i] . "</td>";
        echo "<td style='border-top:2px solid #fdffb6' align='center'>$" . number_format($price_array[$i],0,'',',') . "</td>";
        echo "<td style='border-top:2px solid #fdffb6;' align='center'><input style='text-align:center;width:70px;' type='number' min='0'name='quantity'value='" .
        number_format($quantity_array[$i],0,'',',') . "'></td>";
        echo "<td style='border-top:2px solid #fdffb6' align='center'>$" . number_format($sub_total,0,'',',') . "</td>";
        echo "<td style='border-top:2px solid #fdffb6'align='center'><input class='btn btn-info'style='height:40px' type='submit' value='修改'></td>";
        echo "</tr>";
        echo "</form>";
      }

      echo "<tr align='right' bgcolor='#ffd6a5'>";
      echo "<td style='border-top:2px solid #fdffb6;padding-right:5px;' colspan='6'>總金額 = " . number_format($total,0,'',',') . "</td>";
      echo "</tr>";
      echo "<tr align='center'>";
      echo "<td style='padding:1% 0 1% 0;' colspan='6'>" . "<input class='btn btn-danger'  type='button' value='清除購物車'
              onClick=\"javascript:window.open('delete_order.php','_self')\">&emsp;<input class='btn btn-success'  type='button' value='送出訂單'
              onClick=\"javascript:window.open('update_order.php','_self')\">";
      echo "</td>";
      echo "</tr>";
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