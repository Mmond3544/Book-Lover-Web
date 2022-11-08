<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g4";
$username_surachet = "surache1_room1g4";
$password_surachet = "NAA12547";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);
$sid=$_GET['sid'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Edit"] == "Yes") {
  $sid=$_POST['sid'];
  $Username=$_POST['Username'];
  $Email=$_POST['Email'];

  $strSQL = "SELECT * FROM Member WHERE Username = '$Username' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
  if($objResult)
  {
      echo '<script>alert("Username already exists!")</script>';
  }
  else {
    $sql=" UPDATE Member SET  Username='$Username',Email='$Email' WHERE IDMember='$sid'";
    $dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());
    header("location:member.php?sid=".$sid);
  }
  }
?>
<html>
<head>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- swiper css link  -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="Text.css">
   <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="table.css">
  <style>
  .editU{
  	width: 80%;
    padding: 12px 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #8c679e;
    border-radius: 15px;
    font-size: 15px;
  }
  .submit{
  border: none;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  background-color: rgba(255,255,255,0.7);
  color: #4CAF50;
  border: 2px solid #4CAF50;
  border-radius: 15px;
  }
  .submit:hover{
    background-color: #4CAF50;
 color: white;
  }
  .cp{
    border: none;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: rgba(255,255,255,0.7);
    color: #D4AC0D;
    border: 2px solid #F7DC6F;
    border-radius: 15px;
  }
  .cp:hover{
    background-color: #F7DC6F;
 color: white;
  }
  td {
    font-size: 30px;
  }
  table
  {
    width:60%;
    border-radius: 20px;
  }
  @media (max-width:450px){
    td {
      font-size: 20px;
    }
    table
    {
      width:100%;
      border-radius: 10px;
    }
    .editU
    {
      width: 100%;
    }
  }

</style>
</head>
<body>
  <section class="header">
    <a href="#" class="logo">Book Lover.</a>
    <nav class="navbar">
       <a href="member.php?sid=<?php echo $sid ?>">home</a>
       <a href="member.php?sid=<?php echo $sid ?>#Booksss1">book</a>
       <a href="editUser.php?sid=<?php echo $sid?>">Edit</a>
   </nav>

<div id="menu-btn" class="fas fa-bars"></div>

</section>
  <form style="margin-top:30px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?sid=<?php echo $sid ?>" class="" method="POST"  name="">
<center>
  <?php
  $sql_2="SELECT * FROM Member WHERE IDMember='$sid'";
  $qry_2 = mysql_query($sql_2,$surachet) or die(mysql_error());
  $data_2 = mysql_fetch_array($qry_2);
  ?>
    <table border="0" style="">
      <tr>
        <td>Username</td>
        <td><input class="editU" type="text" id="Username" name="Username" value="<?php echo $data_2['Username']?>"></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><input class="editU" type="text" id="Email" name="Email" value="<?php echo $data_2['Email']?>"></td>
      </tr>
      <tr>
        <td colspan = "2" align="center"><a href="changePass.php?sid=<?php echo $sid;?>"><button class="cp" type="button">Change Password</button></a></td>
  </tr>
      <tr>
  	  <td colspan = "2" align="center">
        <input type="hidden" name="sid" value="<?php echo $data_2['IDMember']; ?>">
<input type="hidden" name="Edit" value="Yes">
<input type="submit" class="submit" name="submit" value ="Submit">
      </tr>

      </table>
  </center>
</form>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>
