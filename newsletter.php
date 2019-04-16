
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form data</title>
</head>
<body>

<h1>You submitted to our newsletter! </h1>
<br>
<a href="index.html">Go Back</a>
<br>
<style>
    h1{
        font-family: 'Catamaran', sans-serif;

    }
    a{
        font-family: 'Catamaran', sans-serif;
        color: #E4082B;
    }
</style>

<?php

$filename = 'data.txt';

$email = $_POST['email'];




htmlOutputForm($email);


fileOutputForm($email, $filename);



mailOutputForm( $email);


/**

 * @param $email
 */
function htmlOutputForm( $email)
{

    echo $email;
}

/**

 * @param $email
 * @param $filename
 */
function fileOutputForm( $email, $filename)
{
    $line_to_write =  $email . "\n";

    file_put_contents($filename, $line_to_write, FILE_APPEND);
}


function mailOutputForm($email)
{

    $message = "Hello,
You've submitted to our newsletter, thank you! You'll now receive tons of information and news from us!
   
Registration data:
Email: $email
 
Enjoy,
The MET
    ";

    mail("$email",
        'Form submitted',
        $message,
        'From: rutesilva@student.dei.uc.pt');
}
?>
</body>
</html>