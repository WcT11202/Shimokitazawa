<?php
//登入資料庫
require_once("dbtools.inc.php");
$link = create_connection();

//密碼md5加密
$account = $_POST['username'];
$password = md5($_POST['password']);
//echo $account."<br>".$password."<hr>";

$sqlcheck = <<<sqlCommand
SELECT * FROM members where UserID = '$account'
sqlCommand;
$result = mysqli_query($link, $sqlcheck);
$row = mysqli_fetch_row($result);
//[0]=> string(1) "1" [1]=> string(13) "CHING TE WANG" [2]=> string(8) "u09e0678" [3]=> string(21) "943811a65c02a2b0563d2" [4]=> string(18) "u09e0678@gmail.com" 
//var_dump($row);
//exit;
if ($account != $row[2] || $password != $row[3]) {
    echo " <script>alert('帳號或密碼錯誤!請重新登入!');</script>";
    echo "<script>window.location.href = 'sign_in.html'</script>";
} else {
    setcookie("membername", $row[1]);
    setcookie("account", $row[2]);
    echo " <script>alert('歡迎回來!" . $row[1] . "');</script>";
    echo "<script>window.location.href = 'catalog.php'</script>";
}


?>
