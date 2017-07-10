<?php

session_start();
echo "<!DOCTYPE html>\n<html><head>";
require_once 'functions.php';
$userstr='(Guest)';

if(isset($_SESSION['user']))
{
  $user=$_SESSION['user'];
  $loggedin=TRUE;
  $userstr="($user)";
}
else $loggedin=false;

//檢查SEESION中是否有USER的存在，如果不存在
//即為登出狀態

echo "<title>$appname$userstr</title><link rel='stylesheet' href='style.css' type='text/css'>".
    "</head><body><center><canvas id='logo' width='624' height='96'>$appname</canvas></center>".
    "<script src='javascript.js'></script><div class ='appname'>$appname$userstr</div> ";

//檢查是否為登出狀態 根據登出登入狀態顯示不同的東西

if($loggedin)
echo "<br><ul class='menu'>".
    "<li><a href='members.php?view=$user'>Home</a></li>".
    "<li><a href='members.php'>Members</a></li>".
    "<li><a href='friends.php'>Friends</a></li>".
    "<li><a href='messages.php'>Messages</a></li>".
    "<li><a href='profile.php'>Edit Profile</a></li>".
    "<li><a href='logout.php'>Log out</a></li></ul><br>";
else {
  echo(
    "<br><ul class='menu'>".
    "<li><a href='index.php'>Home</a></li>".
    "<li><a href='signup.php'>Sign up</a></li>".
    "<li><a href='login.php'>Log in</a></li></ul><br>".
    "<span class='info'> &#8658;  You must be logged in to view this page.</span><br><br>"
  );
}

 ?>
