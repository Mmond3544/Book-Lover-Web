<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g4";
$username_surachet = "surache1_room1g4";
$password_surachet = "NAA12547";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["DeleteStudent"] == "Yes") {

$sid=$_POST['sid'];

$sql = "DELETE FROM student WHERE ID='$sid'";
$dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());
header("location:index.php");
}
 ?>


<html>
<head>
  <title="Student">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="insert.php"><button class="btn" onclick="insert.php">+ รายชื่อ</button></a>
  <div class="container">
    <center>
	<table>
		<thead>
			<tr>
				<th>ID</th>
        <th>prefix</th>
				<th>Name</th>
				<th>Surname</th>
				<th>Tel</th>
        <th>Book</th>
        <th></th>
        <th></th>
			</tr>
		</thead>
		<tbody>
      <?php
        $sql_1="SELECT ID,prefix,Name,Surname,Tel,bk FROM student,tbl_book WHERE student.Book = tbl_book.BookID ORDER BY ID ASC";
        $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
        while ($data_1 = mysql_fetch_array($qry_1)) {  ?>
        <tr>
          <td><?php echo $data_1['ID']; ?></td>
          <td><?php echo $data_1['prefix']; ?></td>
          <td><?php echo $data_1['Name']; ?></td>
          <td><?php echo $data_1['Surname']; ?></td>
          <td><?php echo $data_1['Tel']; ?></td>
          <td><?php echo $data_1['bk']; ?></td>
          <td><a href="edit.php?sid=<?php echo $data_1['ID']; ?>"><button class="edit">แก้ไข</button></a></td>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="" method="POST" name="Delete">
              <td>
              <input class="delete" type="submit" name="button" id="button" value="ลบ" />
              <input type="hidden" name="sid" value="<?php echo $data_1['ID']; ?>" />
              <input type="hidden" name="DeleteStudent" value="Yes" />
            </td>
            </form>

        </tr>
      <?php } ?>

		</tbody>
	</table>
</center>
</div>
</body>
</html>
