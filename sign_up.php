<?php
//登入資料庫
require_once("dbtools.inc.php");
$link = create_connection();

//把密碼用md5加密
$membername = $_POST['membername'];
$account = $_POST['account'];
$password = md5($_POST['password']);
$eMail = $_POST['email'];

//把帳號密碼分別寫入資料庫的account和password欄位

//$result2=mysqli_query($link, $sql);

$sqlcheck = <<<sqlCommand
SELECT * FROM members where UserID = '$account'
sqlCommand;
$result = mysqli_query($link, $sqlcheck);
$row = mysqli_fetch_row($result);
//[0]=> string(1) "1" [1]=> string(13) "CHING TE WANG" [2]=> string(8) "u09e0678" [3]=> string(21) "943811a65c02a2b0563d2" [4]=> string(18) "u09e0678@gmail.com" 
//var_dump($row);
if ($row[2] == $account) {
    echo " <script>alert('帳號重複，請洽管理員!');</script>";

    echo "<script>window.location.href = 'sign_in.html'</script>";
} else if ($membername != null && $account != null && $password != null && $eMail != null) {


    //新增資料進資料庫語法
    $sql = <<<sqlCommand
INSERT INTO members(MemberName,UserID,UserPassword,eMail)
values
('$membername','$account','$password','$eMail')
sqlCommand;
    if (mysqli_query($link, $sql)) {
        echo " <script>alert('註冊成功!');</script>";

        echo "<script>window.location.href = 'sign_in.html'</script>";
        // echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    } else {
        echo " <script>alert('新增失敗!請確認各項欄位填寫正確!');</script>";

        echo "<script>window.location.href = 'sign_in.html'</script>";
        // echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
} else {
    echo " <script>alert('註冊失敗!');</script>";
    echo "<script>window.location.href = 'sign_in.html'</script>";
}
