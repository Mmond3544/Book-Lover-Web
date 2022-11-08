<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_631017";
$username_surachet = "surache1_631017";
$password_surachet = "AC4964MJ";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertNewStudent"] == "Yes") {


$initial=$_POST['initial'];
$name=$_POST['name'];
$file=$_POST['file'];

$locate_img ="mypic/";

// Insert File

	$filenames = $_FILES["file"]["name"];

  $allowedExts = array("doc", "docx", "pdf", "gif", "jpeg", "jpg", "png","xls","xlsx");
  $extension = end(explode(".", $_FILES["file"]["name"]));
  if (($_FILES["file"]["type"] == "application/pdf")
  || ($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/jpg")
  || ($_FILES["file"]["type"] == "application/msword")
  || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
  || ($_FILES["file"]["type"] == "image/pjpeg")
  || ($_FILES["file"]["type"] == "image/x-png")
  || ($_FILES["file"]["type"] == "image/png")
  || ($_FILES["file"]["type"] == "application/vnd.ms-excel")
  || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
  && in_array($extension, $allowedExts))

	{
	if ($_FILES["file"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{

	if (file_exists($locate_img . $_FILES["file"]["name"]))

	  {
	  echo $_FILES["file"]["name"] . " already exists. ";
	  }

	else
	  {
	  move_uploaded_file($_FILES["file"]["tmp_name"],$locate_img.$_FILES["file"]["name"]);


	  echo "Stored in: " . $locate_img . $_FILES["file"]["name"];
	  }

	 }
	 }
	else
	{
	echo "Invalid file";
	 }

// End Insert File

$sql = "INSERT INTO tbl_lab7 (Title,Sname,Picture) VALUES ('$initial','$name','$filenames')";
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
  <body><center>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-group" method="POST" enctype="multipart/form-data" >

  <fieldset><legend><font color="#0000FF"><b>เพิ่มนักศึกษาใหม่ + รูป</b></font></legend>
    <table width="60%" border="0" cellpadding="5" cellspacing="0">
      <tr bgcolor= "#0066ff">
  	  <td colspan="2" align="center"><font color="white"><b>ประวัตินักศึกษา</b></font>
  	  </td>
      </tr>
  	<tr>
  	  <td>คำนำหน้า</td>
  	  <td align="left">
            <input type="radio" name="initial" value="1" checked>นาย
            <input type="radio" name="initial" value="2">นางสาว
  	  </td>
      </tr>

      <tr>
        <td>ชื่อ</td>
        <td align="left"><input type="text" name="name" size="50" maxlength="50"></td>
     </tr>
  	<tr>
        <td>รูปภาพ</td>
        <td align="left"><input class="w3-input" type="file" name="file" id="file"></td>
      </tr>
  	<tr>
  	  <td colspan = "2" align="center">
            <input type="hidden" name="InsertNewStudent" value="Yes">
            <input type="submit" name="submit" value ="Submit">
            <input type="reset" name="reset" value="&nbsp;Reset&nbsp;"></td>
      </tr>
    </table>
    <hr width="60%" color="red">
  </fieldset></form>
  </center>
  </body>
</html>
