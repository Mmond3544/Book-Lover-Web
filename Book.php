<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g4";
$username_surachet = "surache1_room1g4";
$password_surachet = "NAA12547";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["search"] == "Yes")
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $sql_1 = "SELECT BookID,bk FROM tbl_book WHERE CONCAT(`BookID`, `bk`) LIKE '%".$valueToSearch."%'";

}
else {
  $sql_1 = "SELECT BookID,bk FROM tbl_book ORDER BY BookID ASC";
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["DeleteStudent"] == "Yes") {

$sid=$_POST['sid'];
$sql = "DELETE FROM Member_Book WHERE IDBook ='$sid'";
$dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

$sql = "DELETE FROM tbl_book WHERE BookID='$sid'";
$dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

header("location:Book.php");

}
 ?>


<html>
<head>
  <title="Student">
  <link rel="stylesheet" href="stylenav.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header>
    <div class="navbar">
  <a class="active" href="index1.php"><i class="fa fa-fw fa-home"></i>Home</a>
  <a href="#"><i class="fa fa-fw fa-user"></i>หนังสือ</a>
  <div class="search-container">
      <form style="margin:0px;" class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="search">
        <input style="border-radius:8px;" type="text" name="valueToSearch" placeholder="Search..">
        <input type="hidden" name="search" value="Yes" />
        <button style="border-radius:8px;margin-left:5px;" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
</div>

  </header>
  <a href="AddBook.php"><button class="btn" onclick="AddBook.php">+ หนังสือ</button></a>
  <div class="container">
    <center>
	<table style="width:40%;margin-top:50px;">
		<thead>
			<tr>
				<th>ID</th>
        <th>Book</th>
        <th></th>
        <th></th>
			</tr>
		</thead>
		<tbody>
      <?php
        $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
        while ($data_1 = mysql_fetch_array($qry_1)) {  ?>
        <tr>
          <td><?php echo $data_1['BookID']; ?></td>
          <td><?php echo $data_1['bk']; ?></td>
          <td><a href="showbook.php?sid=<?php echo $data_1['BookID']; ?>"><button class="edit" style="width:120px;">แสดงหนังสือ</button></a></td>
          <td>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST" name="Delete" style="margin-bottom:0px;">
            <div class="w3-col" style="width:100%;" align="center">
            <input class="delete" type="submit" name="button" id="button" value="ลบ" />
            <input type="hidden" name="sid" value="<?php echo $data_1['BookID']; ?>" />
            <input type="hidden" name="DeleteStudent" value="Yes" />
            </div>
          </form></td>
        </tr>
      <?php } ?>

		</tbody>
	</table>
</center>
</div>
</body>
</html>
