<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g4";
$username_surachet = "surache1_room1g4";
$password_surachet = "NAA12547";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);
$sid=$_GET['sid'];
?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylenav.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header>
    <div class="navbar">
  <a class="active" href="index1.php"><i class="fa fa-fw fa-home"></i>Home</a>
  <a href="Book.php"><i class="fa fa-fw fa-user"></i>หนังสือ</a>
</div>
  </header>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="">
<center>
  <?php
  $sql_2="SELECT * FROM tbl_book WHERE BookID='$sid'";
  $qry_2 = mysql_query($sql_2,$surachet) or die(mysql_error());
  $data_2 = mysql_fetch_array($qry_2);
  ?>
    <table border="0" style="width:60%;">
      <tr>
        <td align="center"><p style="font-size:30px;"><?php echo $data_2['bk']?></p></td>
        </tr>
      <tr>
        <td align="center"><?php echo "<img src='pic/{$data_2['pic']}' width='40%'>";?></td>
      </tr>
      </table>
  </center>
</body>
</html>
