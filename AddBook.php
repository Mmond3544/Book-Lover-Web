<?php
session_start();
$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g4";
$username_surachet = "surache1_room1g4";
$password_surachet = "NAA12547";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["InsertNewStudent"] == "Yes") {


$name=$_POST['name'];
$file=$_POST['file'];

$locate_img ="pic/";
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
$sql = "INSERT INTO tbl_book (bk,pic) VALUES ('$name','$filenames')";
$dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());
header("location:Book.php");
}

 ?>

<html>
<head>
  <link rel="stylesheet" href="stylenav.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <title>AddBook</title>
	<style>
		input[type=text]
		{
			width: 80%;
	    padding: 8px 10px;
	    margin: 8px 0;
	    box-sizing: border-box;
	    border: 3px solid #8c679e;
	    border-radius: 15px;
	    font-size: 20px;
			background-color: rgba(255,255,255,0.7);
		}
		input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #A569BD;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #0d45a5;
}
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
	border-radius: 10px;
}

.submit {background-color: #2ECC71;} /* Blue */
.reset {background-color: #EC7063;} /* Blue */
.back {background-color: #808B96;} /* Blue */
	</style>
</head>
<body>
	<header>
    <div class="navbar">
  <a class="active" href="index1.php"><i class="fa fa-fw fa-home"></i>Home</a>
  <a href="Book.php"><i class="fa fa-fw fa-user"></i>หนังสือ</a>
</div>

  </header>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-group" method="POST" enctype="multipart/form-data" >
			<center>
	<table style="width:50%;margin-top:100px;">
    <tr>
      <td style="font-size:25px;">ชื่อหนังสือ</td>
      <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td style="font-size:25px;">รูปหนังสือ</td>
      <td align="left"><input class="pic" type="file" name="file" id="file"></td>
    </tr>
    <tr>
    <td colspan = "2" align="center">
            <input type="hidden" name="InsertNewStudent" value="Yes">
            <a href="Book.php"><button class="button back" onclick="Book.php">Back</button></a>
            <input type="reset" class="button reset" name="reset" value="&nbsp;Reset&nbsp;">
					<input type="submit" class="button submit" name="submit" value ="Submit"></td>
    </tr>
  </table>
</form>
</body>

</html>
