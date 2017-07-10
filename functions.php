<?php
//登入資訊

$dbhost ='localhost';
$dbname='publications';
$dbuser='jim';
$dbpass='newpassword';
$appname="Sample";
$connection = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($connection-> connect_error) die($connection->connect_error);
//登入Mysql

//創造資料表並回報
function createTable($name,$query)
{
  queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
  echo"Table '$name' created or already exists.<br>";

}

//傳入查詢指令 回報結果
function queryMysql($query)
{
  global $connection;
  $result = $connection ->query($query);
  if(!$result) die($connection -> error);
  return $result;
}


//使用seesion
function destorySession()
{
  $_SESSION=array();

  if(session_id()!=""|| isset($_COOKIE[session_name]))
    setcookie(session_name(),'',time(),259200,'/');
    session_destroy();

}

//淨化字串防止駭客
function sanitizeString($var)
{
  global $connection;
  $var =strip_tags($var);
  $var = htmlentities($var);
  $var= stripcslashes($var);
  return $connection-> real_escape_string($var);
}


//顯示使用者資料

function showProFile($user)

{

  if (file_exists("$user.jpg"))
    echo"<img src='$user.jpg' style ='float:left'>";
$result =queryMysql("SELECT * FROM profiles WHERE user='$user'");
if($result->num_rows)
  {
    $row =$result->fetch_array(MYSQLI_ASSOC);
    echo stripslashes($row['text'])."<br style='clear:left;'><br>";
  }
}
 ?>
