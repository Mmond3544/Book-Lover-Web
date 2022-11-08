<?php
session_start();
$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g4";
$username_surachet = "surache1_room1g4";
$password_surachet = "NAA12547";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);
$sid=$_GET['sid'];


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["selectBook"] == "Yes") {
    $sid=$_GET['sid'];

    $sql = "DELETE FROM Member_Book WHERE IDMember ='$sid'";
    $dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());

  foreach ($_POST['cb'] as $checkbox) {
    $strSQL = "INSERT INTO Member_Book (IDMember,IDBook) VALUES ('$sid','$checkbox')";
    $objQuery = mysql_query($strSQL);
  }
  header("location:member.php?sid=".$sid);
}
 ?>

 <html>
 <head>
   <title="member">
   <meta charset="utf-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Text.css">
    <link rel="stylesheet" href="table.css">
 </head>
 <body>
   <!-- header section ends -->
   <section class="header">

     <a href="#" class="logo">Book lover.</a>


         <nav class="navbar">
            <a href="member.php?sid=<?php echo $sid?>">home</a>

        </nav>

     <div id="menu-btn" class="fas fa-bars"></div>


 </section>
 <!-- header section ends -->
<section class="Booksss">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?sid=<?php echo $sid; ?>" method="post">
   <center>
     <table>
       <thead>
         <th>เลือกหนังสือที่ชอบ</th>
       </thead>
       <tbody>
       <tr>
         <td>
         <?php
           $sql_1="SELECT tbl_book.* FROM tbl_book";
           $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());

           while ($data_1 = mysql_fetch_array($qry_1)) {

             $sql_2="SELECT * FROM Member_Book WHERE  Member_Book.IDMember = '$sid' AND Member_Book.IDBook = '".$data_1['BookID']."'";
             $qry_2 = mysql_query($sql_2,$surachet) or die(mysql_error());
             $data_2 = mysql_fetch_array($qry_2);
             ?>
             <input type="checkbox" name="cb[]" id="<?php echo $data_1['BookID']; ?>" value="<?php echo $data_1['BookID']; ?>" <?php if (!(strcmp($data_1['BookID'],$data_2['IDBook'])))
             {echo "checked=\"checked\"";} ?>>
             <label for="<?php echo $data_1['BookID']; ?>"><?php echo $data_1['bk'];?></label>
             <br>
             <br>
         <?php } ?>
       </td>
       </tr>
     </tbody>
     </table>
   </canter>
     <input class="btn" type="submit" >
     <input type="hidden" name="sid" id="sid" value="<?php echo $sid;?>">
     <input type="hidden" name="selectBook" value="Yes" />
     <?php $ID = $_POST['$sid']?>
 </form>
</section>
 <!-- footer section starts  -->
 <section class="footer">

    <div class="box-container">

      <!-- <div class="box">
        <h3>quick links</h3>
          <a href="#"> <i class="fas fa-angle-right"></i> home</a>
          <a href="#Booksss1"> <i class="fas fa-angle-right"></i> book</a>
      </div> -->

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> 099-456-xxxx </a>
         <a href="#"> <i class="fas fa-phone"></i> 062-222-xxxx </a>
         <a href="#"> <i class="fas fa-envelope"></i> tanakit@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i>Thung Khru District, Thung Khru Subdistrict, thailand - 10104 </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> line </a>
      </div>

    </div>

    <div class="credit"> created by <span>mr. benjapol suparapong , wannawong boontalok , suwichak phansut , tanakit krabuansri</span> | all rights reserved! </div>

 </section>
 <!-- footer section ends -->

 <!-- swiper js link  -->
 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

 <!-- custom js file link  -->
 <script src="script.js"></script>




 </body>
 </html>
