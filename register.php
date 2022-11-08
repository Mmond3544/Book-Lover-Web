<?php
session_start();

$hostname_surachet = "localhost";
$database_surachet = "surache1_room1g4";
$username_surachet = "surache1_room1g4";
$password_surachet = "NAA12547";
$surachet = mysql_pconnect($hostname_surachet, $username_surachet, $password_surachet) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_surachet, $surachet);

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["register"] == "Yes") {
  $Username = $_POST['Username'];
  $Email = $_POST['Email'];
  $password = $_POST['Password'];
  $Cpassword = $_POST['CPassword'];
    if($_POST["Password"] == $_POST["CPassword"])
	   {
       $strSQL = "SELECT * FROM Member WHERE Username = '$Username' ";
       $objQuery = mysql_query($strSQL);
       $objResult = mysql_fetch_array($objQuery);
       if($objResult)
       {
           echo "Username already exists!";
       }
       else
       {
         $strSQL = "INSERT INTO Member (Username,Email,Password,UserType) VALUES ('$Username',
         '$Email','$password',2)";
         $objQuery = mysql_query($strSQL);
         header("location:index.php");
       }
	    }
    else {
      echo "Password not match";
      }


}
?>

<html>
<head>
  <title="Log in">
  <title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400');

body, html {
  font-family: 'Source Sans Pro', sans-serif;
  background-color: #1d243d;
  padding: 0;
  margin: 0;
}

#particles-js {
  position: absolute;
  width: 100%;
  height: 100%;
}

.container{
  margin: 0;
  top: 50px;
  left: 50%;
  position: absolute;
  text-align: center;
  transform: translateX(-50%);
  background-color: rgb( 33, 41, 66 );
  border-radius: 9px;
  border-top: 10px solid #79a6fe;
  border-bottom: 10px solid #8BD17C;
  width: 600px;
  height: 550px;
  box-shadow: 1px 1px 108.8px 19.2px rgb(25,31,53);
}

.box h2 {
  font-family: 'Source Sans Pro', sans-serif;
  color: #5c6bc0;
  font-size: 30px;
  margin-top:80px;;
}

.box h2 span {
  color: #dfdeee;
  font-weight: lighter;
}

.box h5 {
  font-family: 'Source Sans Pro', sans-serif;
  font-size: 13px;
  color: #a1a4ad;
  letter-spacing: 1.5px;
  margin-top: -15px;
  margin-bottom: 50px;
}

.box input[type = "text"],.box input[type = "password"] {
  display: Sand;
  margin: 20px auto;
  background: #262e49;
  border: 0;
  border-radius: 5px;
  padding: 14px 10px;
  width: 80%;
  font-size: 20px;
  outline: none;
  color: #d6d6d6;
      -webkit-transition: all .2s ease-out;
    -moz-transition: all .2s ease-out;
    -ms-transition: all .2s ease-out;
    -o-transition: all .2s ease-out;
    transition: all .2s ease-out;

}
::-webkit-input-placeholder {
  color: #565f79;
}

.box input[type = "text"]:focus,.box input[type = "password"]:focus {
  border: 1px solid #79A6FE;

}
 label input[type = "checkbox"] {
  display: none; /* hide the default checkbox */
}
/* style the artificial checkbox */
label span {
  height: 13px;
  width: 13px;
  border: 2px solid #464d64;
  border-radius: 2px;
  display: inline-block;
  position: relative;
  cursor: pointer;
  float: left;
  left: 7.5%;
}

@media (max-width: 450px){
  .container{
    width: 100%;
    height: auto;
    border-top: 15px solid #79a6fe;
    border-bottom: 10px solid #8BD17C;
    padding-bottom: 20px;
  }
  .box input[type = "text"],.box input[type = "password"] {

    width: 100%;
    font-size: 15px;
  }
}

  </style>
</head>
<body>
  <div class="animated bounceInDown">
  <div class="container">

    <span class="error animated tada" id="msg"></span>
    <form name="register" class="box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <center>
        <table width=80%>
          <tr>
            <td><label class="w3-text-Light-Blue" >Username</label></td>
            <td><input type="text" id="Username" name="Username" required placeholder="Please input Username"></td>
          </tr>
          <tr>
            <td><label class="w3-text-Light-Blue">Email</label></td>
            <td><input type="text" id="Email" name="Email" required placeholder="Please input Email"></td>
          </tr>
          <tr>
            <td><label class="w3-text-Light-Blue">Password</label></td>
            <td><input type="password" id="Password" name="Password" required placeholder="Please input Password"></td>
          </tr>
          <tr>
            <td><label class="w3-text-Light-Blue">Confirm Password</label></td>
            <td><input type="password" id="CPassword" name="CPassword" required  placeholder="Confirm Password"></td>
          </tr>
          <tr>
            <td><a href="index.php"><input style="margin-top:25px;" type="button" class="w3-button w3-xlarge w3-grey w3-round-large"Red value="Back"></a></td>
              <td><input style="margin-top:25px;" type="submit" class="w3-button w3-xlarge w3-Khaki w3-round-large"Red value="submit"></td>
          </tr>
        </table>
      </center>
      <input type="hidden" name="register" value="Yes" />
      </form>

  </div>

</div>
</body>
</html>
