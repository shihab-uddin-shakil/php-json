<!DOCTYPE html>
<html>

<head>
    <title>Registration Form Self</title>
</head>

<body>

    <?php 

		$firstName = $lastName = $email=  $remail=$gender=$password=$userName=$msg="";
		$firstNameErr = $lastNameErr = $emailErr = $remailErr=$genderErr=$passwordErr=$userNameErr="";

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			if(empty($_POST['fname'])) {
				$firstNameErr = "Please fill up the firstname";
			}
			else {
				$firstName = $_POST['fname'];
			}

			if(empty($_POST['lname'])) {
				$lastNameErr = "Please fill up the lastname";
			}
			else {

				$lastName = trim($_POST['lname']);
				$lastName = htmlspecialchars($_POST['lname']);
			}

			if(empty($_POST['email'])) {
				$emailErr = "Please fill up the website";
			}
			/*else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  				$emailErr = "Invalid Email Format";
			}*/
			else {
				$email = $_POST['email'];
            
                $myfile = fopen("email.txt", "w") ;
                 $txt = $email;
                  fwrite($myfile, $txt);
                  $_SESSION["email"]=$email;
                  // $txt = $email;
                  //fwrite($myfile, $txt);
                    fclose($myfile);
			}

          /*  if(empty($_POST['gender'])) {
                $gender = $_POST['gender'];
				$genderErr = "Please fill up the Gender";
			}
			else {
				$gender = $_POST['gender'];
			}*/
            $gender = $_POST['gender'];
            if(empty($_POST['userName'])) {
				$userNameErr = "Please fill up the firstname";
			}
			else {
				$userName= $_POST['userName'];
			}
       
        if(empty($_POST['password'])) {
            $passwordErr = "Please fill up the firstname";
        }
        else {
            $password= $_POST['password'];
        }

        if(empty($_POST['remail'])) {
            $remailErr = "Please fill up the website";
        }

        else {
            
            $myfile = fopen("email.txt", "r") or die("Unable to open file!");
            echo fgets($myfile);
           if(fgets($myfile)==$remail) {
            $remail = $_POST['remail'];
           }
           else{
            $remailErr = "Invalid Email";
           }
           fclose($myfile);  
        }
      /*  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $remailErr = "Invalid Email Format";
        // }*/
        // else if($_SESSION["email"]==$remail) {
        //     echo $_SESSION["email"];
           
        //   // if($_SESSION["email"]==$remail) {
        //     $remail = $_POST['remail'];
        //     $myfilee= fopen("email.txt", "r") or die("Unable to open file!");
        //     fwrite($myfilee, $remail);
        //     fclose($myfile);  
        //    }
        //    else{
        //     $remailErr = "Invalid Email";
        //    }
           
      //  }

            



			if($firstNameErr == "" && $lastNameErr == "" && $emailErr == "" && $passwordErr == "" && $remailErr == ""&& $userNameErr == "") {
                $arr1 = array('userId' => $userName, 'password' => $password, 'fname' => $firstName,'lname' =>  $lastName ,'email' => $email,'gender'=> $gender );
                $json_encoded_text =  json_encode($arr1); 

		          $file1 = fopen("info.txt", "w");
		         fwrite($file1, $json_encoded_text);

		          fclose($file1);
               
                //  $txtInfo = $userName." ". $firstName . " " . $lastName . " ". $password. " " . $email ." " .$gender  ;
                //   fwrite($myInfofile, $txtInfo);
                  echo "<br>";
                  $msg=  $firstName . " " . $lastName . " Successful  registered" ;
                 // if (!logged_id()) {
                    header("Location:Login.php");
                    exit; // <- don't forget this!
               // }
                
               // delete_everything();
                // header("Login.php"); 
                // echo "<br>";
			}

            else{
                echo "<br>";
                $msg=   "Invalid  registered. Please try again!!" ;
            }
		}
    
	?>

    <h1>Registration Form Self</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="fname" value="<?php echo $firstName ?>">
        <p><?php echo $firstNameErr; ?></p>

        <br>

        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lname" value="<?php echo $lastName ?>">
        <p><?php echo $lastNameErr; ?></p>

        <br>
        <br>

        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
        <p><?php echo $genderErr; ?></p>
        <br>
        <br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $email ?>">
        <p><?php echo $emailErr; ?></p>

        <br>


        <label for="userName">User Name</label>
        <input type="text" id="userName" name="userName" value="<?php echo $userName ?>">
        <p><?php echo $userNameErr; ?></p>

        <br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo $password ?>">
        <p><?php echo $passwordErr; ?></p>

        <br>

        <label for="remail">Email</label>
        <input type="email" id="remail" name="remail" value="<?php echo $remail ?>">
        <p><?php echo $remailErr; ?></p>

        <br>

        <br>
        <p><?php echo $msg; ?></p>


        <input type="submit" value="Submit">

    </form>

</body>

</html>