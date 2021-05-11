<?php
if (isset($_COOKIE["membername"])) {
    $MemberName = $_COOKIE["membername"];
    $UserID = $_COOKIE["account"];
    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql = <<<sqlCommond
    SELECT memberid FROM members WHERE userid='{$UserID}'
    sqlCommond;
    $result = mysqli_query($link, $sql);
    $memberid =mysqli_fetch_row($result);
    //$memberidInt=intval($memberid["MemberID"][0]);
    var_dump($memberid[0]);
    $orderdate = date("YmdHis");
    echo $orderdate;
    var_dump($memberid);
    $sql2=<<<sqlCommond
    insert into orders(MemberID,OrderDate)
    Values({$memberid[0]},{$orderdate})
    sqlCommond;
    //新增orders

    $result = mysqli_query($link, $sql2);
    //var_dump($result);
   
  
} else {
    $MemberName = "Guest";
}





if ($MemberName == "Guest") {
    echo " <script>alert('請先登入會員!');</script>";
    echo "<script>window.location.href = 'sign_in.html'</script>";
} else {
    require_once("dbtools.inc.php");
    $product_no_array = explode(",", $_COOKIE["book_no_list"]);
    $product_name_array = explode(",", $_COOKIE["book_name_list"]);
    $price_array = explode(",", $_COOKIE["price_list"]);
    $quantity_array = explode(",", $_COOKIE["quantity_list"]);
    $length = count($product_no_array);
    // var_dump($length);
    // var_dump($product_no_array[0]);
    // var_dump($product_name_array[0]);
    $sql3=<<<sqlCommond
    Select OrderID FROM orders
    WHERE MemberID={$memberid[0]} AND OrderDate ={$orderdate}
    sqlCommond;
    $result = mysqli_query($link, $sql3);
    $orderid=mysqli_fetch_row($result);
    //var_dump($result);
    //var_dump($orderid[0]);
    for($i=0;$i<$length;$i++){
        $sql4="insert into orderdetails(OrderID,ProductID,UnitPrice,Quantity)Values({$orderid[0]},{$product_no_array[$i]},{$price_array[$i]},{$quantity_array[$i]})";
        $result = mysqli_query($link, $sql4);
    }
    //var_dump($result);
    setcookie("book_no_list", "");
    setcookie("book_name_list", "");
    setcookie("price_list", "");
    setcookie("quantity_list", "");	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <script>
        alert("您所選取的商品已完成訂購！");
        location.href = 'catalog.php';
    </script>

</body>

</html>