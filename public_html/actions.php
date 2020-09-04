<?php


$error = "";
$success = "";
$passwordError = "";
include('function.php');

if($_GET['action'] == 'signIn'){

    if (!$_POST['email']){

        $error .= "Email <br>";

    }

    if (!$_POST['password']){

        $error .= "Password <br>";

    }
            
    if ($error != ""){

         $error = "The following field(s) were missing <br>".$error ;
         echo $error;

        }else{

            $query = "SELECT * FROM `user_info` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

            $result = mysqli_query($link,$query);

            $row = mysqli_fetch_array($result);


            if (isset($row)){
        
  
                if (password_verify($_POST["password"],$row['password'])) {
              
                        $_SESSION['id'] = $row['Id'];
                  
                        echo "1";
              
                }else {

                $error =  'Invalid password.';
                echo $error;
                
                }  

             }else{

                $error = "Email/Password did not match.";
                echo $error;
            }
     
     }



}


if ($_GET['action']=='signUp'){

            if (!$_POST['first-name']){

                $error .= "First Name <br>";

              }
            if (!$_POST['last-name']){

                $error .= "Last Name<br>";

              }
            if (!$_POST['email']){

                $error .= "Email <br>";

              }

            if (!$_POST['password']){

                $error .= "Password <br>";

              }
            if (!$_POST['confirm-password']){
              $error .= "Confirm Password <br>";
            }
            if (!$_POST['phone-number']){
              $error .= "Phone number <br>";
            }
            if ($_POST['password'] != $_POST['confirm-password']){
              $passwordError = "Password do not match <br>";
              echo $passwordError;
            }

            if ($error != "" || $passwordError != "" ){

                $error = "The following field(s) were missing <br>".$error ;
                echo $error;

              }else{

              $query = "SELECT `email` FROM `user_info` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
         
              $result = mysqli_query($link,$query);

                if (mysqli_num_rows($result) > 0 ){

                  $error =  "The user already exists";
                  echo $error;

                }else{

              $query = "INSERT INTO `user_info` (`first-name`, `last-name`,`email`,`password`,`phone-number`) VALUES ('".mysqli_real_escape_string($link, $_POST['first-name'])."', '".mysqli_real_escape_string($link, $_POST['last-name'])."','".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."','".mysqli_real_escape_string($link, $_POST['phone-number'])."')";

              if (mysqli_query($link,$query)){

                $id = mysqli_insert_id($link);
                
                $mypassword  = $_POST['password'];
                $query = "UPDATE `user_info` SET password = '".password_hash($mypassword, PASSWORD_DEFAULT).  "'  where id = '".$id. " 'LIMIT 1";

                    mysqli_query($link,$query);
 
                  $_SESSION['id']= $id;

                echo "1";

              }
              else{
                $error = "sign up failed";
                echo $error;
              }

          }
        }




}


if ($_GET['action'] == 'postDonation') {
        
        if (!$_POST['donationInfo']) {
                    
            echo "Description is empty!";
                    
            } else if (strlen($_POST['donationInfo']) > 140) {
            
            echo "Your Description is too long!";
            
        } else {
            
            mysqli_query($link, "INSERT INTO donationbox (`donationInfo`, `status`, `datetime`,`userid`) VALUES ('".mysqli_real_escape_string($link, $_POST['donationInfo'])."', '".mysqli_real_escape_string($link, $_POST['status'])."',NOW(),'".mysqli_real_escape_string($link, $_SESSION['id'])."')");
            
            echo "1";
            
        }
        
    }


    if ($_GET['action'] == 'postRequest') {
        
        if (!$_POST['requestInfo'] || !$_POST['title']) {
                    
            echo "Description or Title is empty!";
                    
            } else if (strlen($_POST['requestInfo']) > 140  || strlen($_POST['title']) > 50 ) {
            
            echo "Your Description or title is too long!";
            
        } else {
            
            mysqli_query($link, "INSERT INTO requestbox (`requestInfo`, `title`, `datetime`,`userid`) VALUES ('".mysqli_real_escape_string($link, $_POST['requestInfo'])."', '".mysqli_real_escape_string($link, $_POST['title'])."',NOW(),'".mysqli_real_escape_string($link, $_SESSION['id'])."')");
            
            echo "1";
            
        }
        
    }

    if ($_GET['action'] == 'postMedicine') {
        
        if (!$_POST['medicineInfo'] || !$_POST['name']) {
                    
            echo "Description or Name is empty!";
                    
            } else if (strlen($_POST['medicineInfo']) > 140  || strlen($_POST['name']) > 50 ) {
            
            echo "Your Description or Name is too long!";
            
        } else {
            
            mysqli_query($link, "INSERT INTO medicinebox (`medicineInfo`, `name`, `datetime`,`userid`) VALUES ('".mysqli_real_escape_string($link, $_POST['medicineInfo'])."', '".mysqli_real_escape_string($link, $_POST['name'])."',NOW(),'".mysqli_real_escape_string($link, $_SESSION['id'])."')");
            
            echo "1";
            
        }
        
    }




 if ($_GET['action'] == 'deleteDonation') {
 			global $link;
        	$query = "DELETE FROM `donationbox` WHERE `donationbox`.`Id` =".$_POST['value'] ;   
            if(mysqli_query($link,$query)){ 
            echo "1";
        }else
        echo "0";
            
        
        
    }

if ($_GET['action'] == 'deleteRequest'){
    global $link;
    $query = "DELETE FROM `requestbox` WHERE `requestbox`.`Id` =".$_POST['value'] ;
    if(mysqli_query($link,$query)){ 
            echo "1";
        }else
        echo "0";
            

}


if ($_GET['action'] == 'deleteMedicine'){
    global $link;
    $query = "DELETE FROM `medicinebox` WHERE `medicinebox`.`Id` =".$_POST['value'] ;
    if(mysqli_query($link,$query)){ 
            echo "1";
        }else
        echo "0";
            

}

if ($_GET['action'] == 'changeStatus'){
    global $link;
    $query = "SELECT * FROM `donationbox` WHERE `donationbox`.`Id` = ".$_POST['value'];
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);

    if($row['status'] == "Available"){

        $query = "UPDATE `donationbox` SET `status` = 'Unavailable' WHERE `donationbox`.`Id` =".$_POST['value'];
        if(mysqli_query($link,$query)){ 
            echo "1";
        }


    }elseif($row['status'] == "Unavailable"){
        $query = "UPDATE `donationbox` SET `status` = 'Available' WHERE `donationbox`.`Id` =".$_POST['value'];
        if(mysqli_query($link,$query)){ 
            echo "1";
        }
    }else{
        echo "0";
    }


}


    if ($_GET['action'] == 'sendMail'){
               
                if (!$_POST['mailDescription'] || !$_POST['phone-number'] ){

                    echo "Mail Description or Phone number is missing";
                }
                else{
                            
                            require 'views/phpmailer/PHPMailerAutoload.php';

                            $mail = new PHPMailer;
                                
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'noreplygivefoundation.com@gmail.com';                 // SMTP username
                            $mail->Password = '@qwertyuiop123';                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to

                            $mail->setFrom('noreplygivefoundation.com@gmail.com', 'GIVE FOUNDATION');
                            // $mail->addAddress('ankit.rouniyar@gmail.com');     // Add a recipient
              

                            $mail->Subject = 'Some Body Needs Your Help';
                            $mail->Body    = $_POST['mailDescription'] ."<br>Contact them if you can help in the following number: " . $_POST['phone-number'];
                            $mail->AltBody = $_POST['mailDescription'] . "Contact them if you can help in the following number:". $_POST['phone-number'];

                            global $link;

                                $query = "SELECT * FROM `user_info` ";
                                $result = mysqli_query($link,$query);
                                if (mysqli_num_rows($result) == 0){
                                    echo "There is no user Available";
                                }else{

                                while($row = mysqli_fetch_assoc($result)){
                                        $mail->addAddress($row['email']);
                                        $mail->send();

                                }
                                echo "1" ; 
                             }
                            



                        }
}

?>