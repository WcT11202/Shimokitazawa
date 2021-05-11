<?php
	setcookie("membername", "Guest", time()- 3600);
    setcookie("account", "", time()- 3600);
	header("Location: catalog.php");
	exit();
?>