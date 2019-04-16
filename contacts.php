<?php

// Message Variables
$msg='';
$msgClass='';
//Check For Submit
if(filter_has_var(INPUT_POST, 'submit')){
    //GET FORM DATA
    $name= htmlspecialchars($_POST['name']);
    $email= htmlspecialchars($_POST['email']);
    $message= htmlspecialchars($_POST['message']);

    if(!empty($email) && !empty($name) && !empty($message)) {
        //PASSED
        //Check Email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) ===false) {
            //FAILED
            $msg = 'Please use a valid email';
            $msgClass = 'alert-danger';
        }else{
            $toEmail='silvarute99@outlook.com';
            $subject = 'contact request from' .$name;
            $body = '<h2>Contact Request</h2>
<h4>Name</h4><p> '.$name.'</p>
<h4>Email</h4><p> '.$email.'</p>
<h4>Message</h4><p> '.$message.'</p>
';

//Email Headers
            $headers = "MIME-Version: 1.0"."r\n";
            $headers .="Content-Type:text/html; charset=UTF-8"."\r\n";
            // HEADERS
            $headers.= "From:".$name. "<".$email.">". "r\n";
            if(mail($toEmail, $subject, $body, $headers)) {
                $msg = 'Your message has been sent, thank you!';
                $msgClass = 'alert-success';
            }else {
                //Failed
                $msg = 'Your message was not sent, please try again';
                $msgClass = 'alert-danger';
            }
        }
    }else{
        //FAILED
        $msg='Please fill all';
        $msgClass = 'alert-danger';
    }
}
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jéssica Vidas & Rute Silva">
    <meta name="description" content="MET Website">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Catamaran|Lora" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>
<body>
<header>
    <div class="row">
        <!--Logo-->
        <div class="logo">
            <a href="index.html">
                <img src="images/themet.png"></a>
        </div>
    </div>
    <!--Menu-->
    <ul class="main-nav">
        <a href="index.html"  class="nav-style">HOME</a>
        <a href="exhibitions.html"  class="nav-style">EXHIBITIONS</a>
        <a href="events.html"  class="nav-style">EVENTS</a>

        <div class="dropdown">
            <a class="nav-style" onclick="myFunction()">ARCHIVE</a>
            <div class="dropbtn">
                <div class="dropdown-content" id="myDropdown">
                    <a href="archive3.html">MET 1</a>
                    <a href="index.html">MET 2</a>
                    <a href="index.html">MET 3</a>
                </div>
            </div>
        </div>
    </ul>
    <nav>
        <!--Search Bar-->
        <div id="bar">
            <form>
                <input type="search" name="bar" placeholder="Search">
                <input type="submit" value="Go">
            </form>
        </div>
        <!--Tittle-->
        <div class="container">
            <p>The Metropolitan Museum of Art</p>
        </div>
    </nav>
</header>
<!--Image-->
<section id="showcase2">
    <img src="images/aboutus.jpg">
</section>
<hr>
<!--About The Met-->
<div class="contact-tittle">
    <h1>Contact Us</h1>
    <p>We would love to hear from you!</p>
</div>
<br>
<br>

<div class="contact-form">
    <?php if($msg !=''): ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg;?></div>
    <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
          <br>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name:'';?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email:'';?>">
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ?$message: '';?></textarea>
    </div>
    <br>
    <input type="submit" name="submit" class="form-group submit" value="SEND MESSAGE">
    </form>
</div>
<hr>
<footer>
    <!--Contacts Table-->
    <table class="ctable">
        <tr>
            <th>
                <p><a href="contacts.php">Contacts</a></p>
                <p><a href="aboutthemet.html">About</a></p>
                <p><a href="index.html">Press</a></p>
            </th>
            <th> <img src="images/museums/img1.jpg"></th>
            <th> <img src="images/museums/img2.jpg"></th>
            <th> <img src="images/museums/img3.jpg"></th>
        </tr>
        <tr>
            <td></td>
            <td>
                <h4>The Met Fifth Avenue</h4>
                <p>1000 Fifth Avenue</p>
                <p>New York, NY 10028</p>
                <p>Phone: 212-535-7710</p>
            </td>
            <td>
                <h4>The Met Breuer</h4>
                <p>945 Madison Avenue</p>
                <p>New York, NY 10021</p>
                <p>Phone: 212-731-1675</p>
            </td>
            <td>
                <h4>The Met Cloisters</h4>
                <p>99 Margaret Corbin Drive</p>
                <p>New York, NY 10040</p>
                <p>Phone: 212-923-3700</p>
            </td>
        </tr>
    </table>
    <section id="fcontainer">
        <!--NewsLetter-->
        <div class="newsletter">
            <form action="newsletter.php" method="POST">
                <input type="email" name="email" placeholder="Enter Email...">
                <button type="submit" class="button_1">Subscribe</button>
            </form>
        </div>
        <!--Icons-->
        <div class="icons">
            <ul>
                <li><a href="https://www.facebook.com/metmuseum/">
                        <img width="40" height="40" src="images/icons/facebook.png"></a></li>
                <li><a href="https://www.instagram.com/metmuseum/?hl=pt">
                        <img width="40" height="40" src="images/icons/instagram.png"></a></li>
                <li><a href="hhttps://www.pinterest.pt/metmuseum/">
                        <img width="40" height="40" src="images/icons/pinterest.png"></a></li>
                <li><a href="https://twitter.com/metmuseum">
                        <img width="40" height="40" src="images/icons/twitter.png"></a></li>
            </ul>
        </div>
    </section>
</footer>
</body>
</html>