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
  $password = $_POST['np'];
  $Cpassword = $_POST['cnp'];
    if($_POST["np"] == $_POST["cnp"])
	   {
       $sql=" UPDATE Member SET  Password = '$password' WHERE IDMember='$sid'";
       $dbquery = mysql_db_query($database_surachet, $sql)or die(mysql_error());
       header("location:editUser.php?sid=".$sid);
	    }
    else {
      echo '<script>alert("Password not match");</script>';
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

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="cp.css">
  <link rel="stylesheet" href="Text.css">
  <style>
  @media (max-width:450px){
    #regForm {
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
  <form id="regForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?sid=<?php echo $sid; ?>" method="POST">
  <h1>Change Password</h1>
  <div class="tab"><p style="font-size:15px;">Old Password:</p>
    <p><input placeholder="Old Password..." oninput="this.className = ''" id="op" name="op"></p>
  </div>
  <div class="tab"><p style="font-size:15px;">New Password:</p>
    <p><input placeholder="New Password..." oninput="this.className = ''" id="np" name="np"></p>
    <p><input placeholder="Confirm New Password...." oninput="this.className = ''" id="cnp" name="cnp"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
  </div>
  <input type="hidden" name="sid" value="<?php echo $sid; ?>">
<input type="hidden" name="Edit" value="Yes">
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}
function test(a)
{
  var op = getElementById('op');
  alert("test");
  nextPrev(1);
}
function nextPrev(n) {
  <?php
  $sql_2="SELECT * FROM Member WHERE IDMember='$sid'";
  $qry_2 = mysql_query($sql_2,$surachet) or die(mysql_error());
  $data_2 = mysql_fetch_array($qry_2); ?>
  var o = "<?php echo $data_2['Password']; ?>";
  var op = document.getElementById("op");
  if(o == op.value){
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }
  else {
    alert("Your Password is wrong");
  }

}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>


</body>
</html>
