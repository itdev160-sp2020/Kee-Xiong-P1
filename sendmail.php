<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="description" content="WEBDEV 114Responsive Web Design project 8.">
    <meta name="keywords" content="Highlander Home Healthcare, Home Healthcare, personal care assist">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="style.css">
    <link href="contactstyle.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <!--- <link rel="stylesheet" media="screen and (max-width: 600px)" href="styleMobile.css">
    <link rel="stylesheet" media="screen and (min-width: 601px)" href="styleTablet.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function myFunction(){
            var x = document.getElementById("myTopNav");
            if (x.className === "topNav") {
                x.className += " responsive";
            }
            else{
                x.className = "topNav";
            }
        }
    </script>
</head>

<body>
    <main>
    <header>
        <h1><b><img id="headerHHHC" src="images/main_logo3.png" alt="HHHC"></b></h1>
        </header>
        <nav class="topNav" id="myTopNav">
           <a href="index.html" class="active">Home</a>
            <a href="services.html">Services</a>
            <a href="staff.html">Staff</a>
            <a href="contact.html">Contact</a>
            <a href="faqs.html">FAQ's</a>
            <a href="javascript:void(0)" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <!-- &nbsp; is code to not let text wrap -->
        </nav>
    <section>
        <h1>Contact Us</h1>
            <p>
            Highlander Home Health Care, LLC
        We are more than happy to work with you and provide you the best service for your needs. Please contact us at the following:
        <br>
        <br>
        5626 North 91st Street Suite 203 Milwaukee, WI 53225
        <br>
        Phone: 414-461–2331
        <br>
        Fax: 414-461–2332
        <br>
        e-mail: email@gmatc/matc.edu
            </p>
        <form action="sendmail.php" method="post" name="contact_form" id="contact_form">
            
		<fieldset>
        	<legend>Contact Information</legend>
    		<label for="first_name">First Name:</label>
			<input type="text" name="first_name" id="first_name" value="<?php echo $_REQUEST['first_name'] ?>" disabled><br>
			<label for="last_name">Last Name:</label>
			<input type="text" name="last_name" id="last_name" value="<?php echo $_REQUEST['last_name'] ?>" disabled><br>
        	<label for="email">Email Address:</label>
        	<input type="email" name="email" id="email" value="<?php echo $_REQUEST['email'] ?>" disabled><br>
        	<label for="verify">Verify Email:</label>
        	<input type="email" name="verify" id="verify" value="<?php echo $_REQUEST['email'] ?>" disabled><br>
			<label for="phone">Phone Number:</label>
			<input type="tel" name="phone" id="phone" value="<?php echo $_REQUEST['phone'] ?>" disabled><br>
		</fieldset>
		<fieldset>
    		<legend>Message Information</legend>
			<label for="today_date">Today's  Date:</label>
			<input type="date" name="today_date" id="today_date" value="<?php echo $_REQUEST['today_date'] ?>" disabled><br>
			<label for="subject">Subject:</label>
			<input type="text" name="subject" id="subject" value="<?php echo $_REQUEST['subject'] ?>" disabled><br>
			<label for="Message">Message:</label>
			<textarea id="message" name="message" rows="4" disabled><?php echo $_REQUEST['message'] ?></textarea>
		</fieldset>
 
<!-- This entire script, including the opening and closing ?php tags, can be nested inside of any other tag, such as div or p, to control positioning and formatting of confirmation message spit out by the email script -->
<h2>
<?php
  if (isset($_REQUEST['email'])) { //if "email" variable is filled out, send email
  
  //Set admin email for email to be sent to (use you own MATC email address)
    $admin_email = "xionk13@gmatc.matc.edu"; 

  //Set PHP variable equal to information completed on the HTML form
    $email = $_REQUEST['email']; //Request email that user typed on HTML form
    $phone = $_REQUEST['phone']; //Request phone that user typed on HTML form
    $subject = $_REQUEST['subject']; //Request subject that user typed on HTML form
    $message = $_REQUEST['message']; //Request message that user typed on HTML form
  //Combine first name and last name, adding a space in between
    $name = $_REQUEST['first_name'] . " " .  $_REQUEST['last_name']; 
            
  //Start building the email body combining multiple values from HTML form    
    $body  = "From: " . $name . "\n"; 
    $body .= "Email: " . $email . "\n"; //Continue the email body
    $body .= "Phone: " . $phone . "\n"; //Continue the email body
    $body .= "Message: " . $message; //Continue the email body
  
  //Create the email headers for the from and CC fields of the email     
    $headers = "From: " . $name . " <" . $email . "> \r\n"; //Create email "from"
    $headers .= "CC: " . $name . " <" . $email . ">"; //Send CC to visitor
    
  //Actually send the email from the web server using the PHP mail function
  mail($admin_email, $subject, $body, $headers); 
    
  //Display email confirmation response on the screen
  echo "Thank you for contacting us!"; 
  }
  
  //if "email" variable is not filled out, display an error
  else  { 
     echo "There has been an error!";
        }
?>

</h2>
    </section>
    <footer>
    </footer>
</main>
</body>
</html>