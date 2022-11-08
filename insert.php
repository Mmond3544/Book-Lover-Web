<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g4";
$username_surachet = "surache1_room1g4";
$password_surachet = "NAA12547";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

$sid=$_GET['ID'];


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertNewStudent"] == "Yes") {
  $prefix=$_POST['prefix'];
  $name=$_POST['Name'];
  $surname=$_POST['Surname'];
  $tel=$_POST['tel'];
  $book=$_POST['book'];

  $sql = "INSERT INTO  student (prefix,Name,Surname,Tel,Book) VALUES ('$prefix','$name','$surname','$tel','$book')";
  $dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());
  header("location:index.php");
  }?>



<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST"  name="">
  <center>
    <table border="0" style="width:60%;">
      <tr>
        <td><p>คำนำหน้า</p></td>
        <td><input type="radio" id="Mr" name="prefix" value="Mr">
  <label for="Mr">Mr</label>
  <input type="radio" id="Ms" name="prefix" value="Ms">
  <label for="Ms">Ms</label><br></td>
        </tr>
      <tr>
        <td>ชื่อ-นามสกุล</td>
        <td><input type="text" placeholder="ชื่อ" id="Name" name="Name"> <input type="text" placeholder="นามสกุล" id="Surname" name="Surname"></td>
      </tr>
      <tr>
        <td>เบอร์โทร</td>
        <td><input type="text" placeholder="เบอร์โทร" id="tel" name="tel" maxlength="10"></td>
      </tr>
      <tr>
        <td>เลือกหนังสือที่ชอบ</td>
        <td>
          <select name="book">
          <option value="">เลือกหนังสือ</option>
        <?php
$sql_1="SELECT * FROM tbl_book";
$qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
$data_1 = mysql_fetch_array($qry_1);

do {  ?>

<option value="<?php echo $data_1['BookID']?>"><?php echo $data_1['bk']?></option>

<?php
} while ($data_1 = mysql_fetch_assoc($qry_1));
  $rows = mysql_num_rows($qry_1);
  if($rows > 0) {
  mysql_data_seek($qry_1, 0);
  $data_1 = mysql_fetch_assoc($qry_1);
} ?>
</select>
</td>
      </tr>
      <tr>
  	  <td colspan = "2" align="center">
            <input type="hidden" name="InsertNewStudent" value="Yes">
            <input type="submit" name="submit" value ="Submit">
            <input type="reset" name="reset" value="&nbsp;Reset&nbsp;"></td>
      </tr>

      </table>
  </center>
</body>
</html>
