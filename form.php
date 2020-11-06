<html>

<head>
<title>17BCE0343 CSE3002 DA-2</title>
<style>
.error {color: #FF0000;}
</style>
</head>

<body>  

<?php
$name = $username = $pwd = $pwdc = $email = $emailc = "";
$namer = $usernamer = $pwdr = $pwdcr = $emailr = $emailcr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $username = test_input($_POST["username"]);
  $pwd = test_input($_POST["pwd"]);
  $pwdc = test_input($_POST["pwdc"]);
  $email = test_input($_POST["email"]);
  $emailc = test_input($_POST["emailc"]);

  if (empty($_POST["name"])) {
    $namer = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["username"])) {
    $usernamer = "Userame is required";
  } else {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST["pwd"])) {
    $pwdr = "Password is required";
  } else {
    $pwd = test_input($_POST["pwd"]);
    if(strlen($pwd)>=8){
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/",$pwd)) {
            $pwdr = "Password should have at least one number and one uppercase and lowercase letter";
          }
    }

    else{
        $pwdr = "Password should be of atleast 8 or more characters";
    }
    
  }

  if (empty($_POST["pwdc"])) {
    $pwdcr = "Password is required";
  } else {
    $pwdc = test_input($_POST["pwdc"]);
    if ($pwd!=$pwdc) {
        $pwdcr = "Password does not match";
      }
  }

  if (empty($_POST["email"])) {
    $emailr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["emailc"])) {
    $emailcr = "Email is required";
  } else {
    $emailc = test_input($_POST["emailc"]);
    if ($email!=$emailc) {
        $emailcr = "Email does not match";
      }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<h1>User Registration</h1>
<p><span class="error">* required field</span></p>

<label for="name">Name:</label><br>
<input type="text" id="name" name="name">
<span class="error">* <?php echo $namer;?></span><br>

<label for="username">Username:</label><br>
<input type="text" id="username" name="username">
<span class="error">* <?php echo $usernamer;?></span><br>

<label for="pwd">Password:</label><br>
<input type="password" id="pwd" name="pwd">
<span class="error">* <?php echo $pwdr;?></span><br>

<label for="pwdc">Comfirm Password:</label><br>
<input type="password" id="pwdc" name="pwdc">
<span class="error">* <?php echo $pwdcr;?></span><br>

<label for="email">Email Address:</label><br>
<input type="email" id="email" name="email">
<span class="error">* <?php echo $emailr;?></span><br>

<label for="emailc">Confirm Email Address:</label><br>
<input type="email" id="emailc" name="emailc">
<span class="error">* <?php echo $emailcr;?></span><br>

<input type="submit" value="Register">

</form> 

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $username;
echo "<br>";
echo $pwd;
echo "<br>";
echo  $pwdc;
echo "<br>";
echo $email;
echo "<br>";
echo $emailc;
echo "<br>";
?>

</body>

</html>
