<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <?php 
    $passworde=$userNamee="";
$passwordErre=$userNameErre="";
$Erre="";
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty($_POST['userNamee'])) {
        $userNameErre = "Please fill up the username";
    }
    else {
        $userNamee = $_POST['userNamee'];
    }

    if(empty($_POST['passworde'])) {
        $passwordErre = "Please fill up the password";
    }
    else {
        $passworde=$_POST['passworde'];
    }
    if($passwordErre == "" && $userNameErre == ""){
        $file2 = fopen("info.txt", "r");
		$read = fread($file2, filesize("info.txt"));
		fclose($file2);

		$json_decoded_text = json_decode($read, true);


          $_SESSION["userid"] = $json_decoded_text['userId'];
           $_SESSION["pass"] = $json_decoded_text['password'];
           $_SESSION["fname"] = $json_decoded_text['fname'];
           $_SESSION["lname"] = $json_decoded_text['lname'];
           if($userNamee==$json_decoded_text['userId'] && $passworde==$json_decoded_text['password']){
            $Erre= "Successfully login";
           }
           else{
            $Erre="Unable login";
           }
    }
    

   else{
    $Erre="Unable login";
   }
}
    
	?>

    <h1>Login</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">



        <label for="userNamee">User Name</label>
        <input type="text" id="userNamee" name="userNamee" value="<?php echo $userNamee ?>">
        <p><?php echo $userNameErre; ?></p>

        <br>

        <label for="passworde">Password</label>
        <input type="password" id="passworde" name="passworde" value="<?php echo $passworde ?>">
        <p><?php echo $passwordErre; ?></p>

        <br>


        <br>
        <p><?php echo $Erre; ?></p>


        <input type="submit" value="Submit">

    </form>

</body>

</html>