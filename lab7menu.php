<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_631017";
$username_surachet = "surache1_631017";
$password_surachet = "AC4964MJ";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["DeleteStudent"] == "Yes") {

$sid=$_POST['sid'];

$sql = "DELETE FROM tbl_lab7 WHERE SID='$sid'";
$dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

header("location:lab7menu.php");

}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  </head>
  <body>

    <div class="w3-container">
      <div class="w3-content">
        <div class="w3-col s3 m3 l3"> <a class="w3-button w3-indigo" href="form_insert_picture.php">เพิ่มนักศึกษาใหม่+รูป</a></div>
<div class="w3-col s3 m3 l3"> <a class="w3-button w3-indigo" href="form_login.php">ล็อกอิน</a></div>
      </div>

      <div class="w3-col" style="height:15px;">&nbsp;</div>

    </div>


    <div class="w3-container">

      <div class="w3-content">
        <?php
        $sql_1="SELECT tbl_lab7.* FROM tbl_lab7";
        $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());

        while ($data_1 = mysql_fetch_array($qry_1)) {  ?>

        <div class="w3-row w3-amber w3-border-bottom w3-border-black">
          <div class="w3-col w3-center" style="width:5%;"><?php echo $data_1['SID']; ?></div>
          <div class="w3-col" style="width:10%;"><?php echo $data_1['Sname']; ?></div>
          <?php echo "<img src='mypic/{$data_1['Picture']}' width='40%'>";?>
          <div class="w3-col w3-padding" style="width:10%;"> <a class="w3-button w3-orange" href="form_edit.php?sid=<?php echo $data_1['SID']; ?>">แก้ไขข้อมูล</a> </div>
          <div class="w3-col w3-padding" style="width:10%;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST" name="Delete">
              <div class="w3-col" style="width:100%;" align="center">
              <input class="w3-button w3-red" type="submit" name="button" id="button" value="ลบ" />
              <input type="hidden" name="sid" value="<?php echo $data_1['SID']; ?>" />
              <input type="hidden" name="DeleteStudent" value="Yes" />
              </div>
            </form>
           </div>

        </div>
      <?php } ?>

      </div>

    </div>


  </body>
</html>
