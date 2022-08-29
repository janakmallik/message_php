<?php

$error1 = '';
$error2 = '';
$error3 = '';
$error4 = '';
$error5 = '';
$error6 = '';

$name = '';
$email = '';
$phonenumber = '';
$message = '';

function text_empty($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 return $string;
}

// function text_empty($string)
// {
//  $string = trim($string);
//  $string = stripslashes($string);
//  //$string = htmlspecialchars($string);
//  return $string;
// }

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error2 .= '<label class="text-danger">(Please Enter your Name)</label>';
 }
 else
 {
  $name = text_empty($_POST["name"]);
 }

 if(empty($_POST["email"]))
 {
  $error3 .= '<label class="text-danger">(Please Enter your Email)</label>';
 }
 else
 {
  $email = text_empty($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error4 .= '<label class="text-danger">(Invalid email format)</label>';
  }
 }

 if(empty($_POST["phonenumber"]))
 {
  $error5 .= '<label class="text-danger">(Please Enter your phone number)</label>';
 }
 else
 {
  $phonenumber = text_empty($_POST["phonenumber"]);
 }

 if(empty($_POST["message"]))
 {
  $error6 .= '<label class="text-danger">(Forgotten the Message)</label>';
 }
 else
 {
  $message = text_empty($_POST["message"]);
 }

 if($error1 == '' and $error2 == '' and $error3 == '' and $error4 == '' and $error5 == '' )
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'phonenumber' => $phonenumber,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error1 = '<label class="text-success">Thank you for sending us message</label>';
  $name = '';
  $email = '';
  $phonenumber = '';
  $message = '';
 }
}

?>
<!DOCTYPE html>
<html>

<head>
        <title>Send Us A Message</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    


</head>



<body>
        <div class="container" style="position: relative; margin: auto; width: 70%; padding: 20px;">
                <img style="filter: brightness(40%);width: 100%; height: 100%;object-fit: contain; " src="bk01.jpg">
            

                
                <div class="col-md-6" style="height: 100%; background-color: transparent; position: absolute;top: 0%;left: 0%; margin:0 auto; float:left;">
                        <div style="margin-top: 100px;margin-left:100px">
                                <h3 style="color: white;"><b><i class="fa-solid fa-location-dot"></i> Address<b></h3>
                                        <p style="color: #3bcf1d; margin-left:30px">Station road, Dhaka-1240</p><br>
                                        <h3 style="color: white;"><b><i class="fa-solid fa-phone"></i> Let's Talk<b></h3>
                                            <p style="color: #3bcf1d; margin-left:30px">+88 01793711207</p><br>
                                                <h3 style="color:white;"><b><i class="fa-solid fa-envelope"></i> General Support<b></h3>
                       <p style="color: #3bcf1d; margin-left:30px">contact@example.com</p>
                        </div>
                </div>
                       
                <br />
                <div class="col-md-6" style="height: 100%; background-color: white; position: absolute;top: 0%;left: 50%; margin:0 auto; float:right;">
                        <div style="margin-top:80px">
                        <h2 align="center">Send Us a Message</h2>
                        <form method="post">
                                
                                <div class="form-group">
                                        <label style="margin-left:5px"><br>Enter Name* <?php echo $error2; ?> </label>
                                        <input type="text" name="name" placeholder="Your Name" class="form-control"
                                                value="<?php echo $name; ?>" />
                                </div>

                                <!-- last name  -->

                                <div class="form-group">
                                        <label style="margin-left:5px">Enter Email* <?php echo $error3; ?> <?php echo $error4; ?> </label>
                                        <input type="text" name="email" class="form-control" placeholder="available@email.com"
                                                value="<?php echo $email; ?>" />
                                </div>
                                <div class="form-group">
                                        <label style="margin-left:5px">Enter Phone Number* <?php echo $error5; ?></label>
                                        <input type="text" name="phonenumber" class="form-control"
                                                placeholder="+880 1793 711207" value="<?php echo $phonenumber; ?>" />
                                </div>
                                <div class="form-group">
                                        <label style="margin-left:5px">Enter Message* <?php echo $error6; ?></label>
                                        <textarea name="message" class="form-control"
                                                placeholder="your Message"><?php echo $message; ?></textarea>
                                </div>
                                <!-- <?php echo $error; ?> -->
                                <div class="form-group" align="center">
                                        <!-- <button> -->
                                        <input type="submit" name="submit" class="btn btn-info " style="margin-top:20px;height:50px;width:200px;background-color:green" value="Send Message" />
                                        <!-- </button> -->
                                </div>

                                <div align="center">
                                <?php echo $error1; ?>
                                </div>

                        </form>
       

                        </div>        
                </div>
        </div>


        


<div class="container table_data col-md-10" style="margin:0 auto; float:none; color: green;   margin: auto;
  width: 50%;
  padding: 10px;">
   <h3 align="center">DATA TABLE</h3>
     
        <table border='2' style="width:100%">
	
    <tr>
    
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>phone</td>
        <td>message</td>
   
        
        
    </tr>
    
    <?php
    
        $fp = fopen ( "contact_data.csv" , "r" );
        while (( $data = fgetcsv ( $fp , 5000 , "," )) !== FALSE ) {
            
            $i = 1;
            echo "<tr>";
            foreach($data as $row) {
               echo "<td>" . $row . "</td>";
               echo "   ";
               $i++ ;
            }
            
            echo "</tr>";
        }
        
        fclose ( $fp );
        
        ?>
        
    </table>
    </div>

</body>

</html>