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
  <style>
.center {
  text-align: center;
  border: 0px solid ;
}
</style>
  <title="member">
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

    <a href="#" class="logo">Book Lover.</a>

    <nav class="navbar">
       <a href="#">home</a>
       <a href="#Booksss1">book</a>
       <a href="editUser.php?sid=<?php echo $sid?>">Edit</a>
   </nav>

<div id="menu-btn" class="fas fa-bars"></div>

</section>
<!-- header section ends -->

<!-- home section starts  -->
<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg) no-repeat">
            <div class="content">
               <span>what's new awaits you?</span>
               <h3>you can choose the book you want</h3>
               <!-- <a href="package.php" class="btn">treatise more</a> -->
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg) no-repeat">
            <div class="content">
               <span>choose as you wish</span>
               <h3>reading can provide new knowledge for you</h3>
               <!-- <a href="package.php" class="btn">treatise more</a> -->
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide-3.jpg) no-repeat">
            <div class="content">
               <span>what you know might not be true!</span>
               <h3>find the book that interests you here.</h3>
               <!-- <a href="package.php" class="btn">treatise more</a> -->
            </div>
         </div>

      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
   </div>
</section>
<!-- home section ends -->
<section class="Booksss" id="Booksss1" style="height:auto;">
  <center>
  <table class="ta">
    <thead>
      <th>Book name</th>
      <th>Picture Book</th>
    </thead>
    <tbody>
      <?php
        $sql_1="SELECT bk,pic FROM Member,tbl_book,Member_Book WHERE  Member_Book.IDMember = '$sid' AND Member_Book.IDMember = Member.IDMember AND Member_Book.IDBook = tbl_book.BookID";
        $qry_1 = mysql_query($sql_1,$surachet) or die(mysql_error());
        while ($data_1 = mysql_fetch_array($qry_1)) {  ?>
        <tr>
          <td align="center"><?php echo $data_1['bk'];?></td>
          <td align="center"><?php echo "<img src='pic/{$data_1['pic']}' width='50%'>";?></td>
        </tr>
      <?php } ?>

		</tbody>
  </table>

<a href="selectBook.php?sid=<?php echo $sid;?>"class="btn"><h2>choose a book</h2></button></a>
</center>
</section>
<!-- footer section starts  -->
<section class="footer">

   <div class="box-container">

     <div class="box">
       <h3>quick links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> home</a>

         <!-- <a href="#"> <i class="fas fa-angle-right"></i> book</a> -->
     </div>

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

   <div class="credit"> created by <span>mr. benjapol suparapong , wannawong boontalok , suvijak pannasutti, tanakit krabuansri</span> | all rights reserved! </div>

</section>
<!-- footer section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>
