<?php
// PHP Contact Form

$errors = [];
    
$name = '';
$email = '';
$subject = '';
$message = '';
$contact_copy = '';
  
if ($_POST) {

    // if($_POST['name'] == ''){
    //     $errors[] = 'Name is required';
    // }
    // // validate email
    // if($_POST['email'] == ''){
    //     $errors[] = 'Email is required';
    // }
    // // validate subject
    // if($_POST['subject'] == ''){
    //     $errors[] = 'Subject is required';
    // }
    // // validate message
    // if($_POST['message'] === ''){
    //     $errors[] = 'Message is required';
    // }

// ====================SANITIZE============================
    // validate name
    if($_POST['name'] != ''){
        $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        if($name == ''){
            // $errors[] = 'Name is not valid';
            array_push($errors, 'Name is not valid');
        }
    }else{
        // $errors[] = 'Name is required';
        array_push($errors, 'Name is required');
    }
         
    // validate email
    if($_POST['email'] != ''){
        $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
         
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Email is not valid';
        }
    }else{
        $errors[] = 'Email is required';
    }
         
    // validate subject
    if($_POST['subject'] != ''){
        $subject = filter_var($_POST['subject'],FILTER_SANITIZE_STRING);
        if($subject == ''){
            $errors[] = 'Subject is not valid';
        }
    }else{
        $errors[] = 'Subject is required';
    }
         
    // validate message
    if($_POST['message'] != ''){
        $message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
        if($message == ''){
            $errors[] = 'Message is not valid';
        }
    }else{
        // $errors[] = 'Message is required';
        array_push($errors, 'Message is required');
    }

// ====================FILTER_VALIDATE_BOOLEAN=======================

// Returns TRUE for "1", "true", "on" and "yes"
// Returns FALSE for "0", "false", "off" and "no"
// Returns NULL on failure if FILTER_NULL_ON_FAILURE is set

// validate contact_copy
    $contact_copy = filter_var($_POST['contact-copy'],FILTER_VALIDATE_BOOLEAN);
    if($contact_copy){
        $feedback_msg = 'We are send You a copy of this message';
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- form contact -->
    <form class="text-center border border-light p-5 m-auto" action="" method="POST">

        <h4 class="h4 mb-4">Feedback form</h4>
        <?php
        if ($_POST) {
            if(count($errors) === 0){
                var_dump($_POST);
                echo '<div class="alert alert-success"><p>Thank you! your message has been sent.</p></div>';
                if ($feedback_msg){
                    echo "<h3>$feedback_msg</h3>";
                }
            }else{
                echo '<div class="alert alert-block alert-error fade in">
                <p>The following error(s) occurred:</p><ul>';
                // foreach ($errors as $error) {
                //     echo "<li>$error</li>";
                // }
                while (count($errors)>0) {
                    echo "<li>".array_pop($errors)."</li>";
                }
                echo '</ul></div>';
            } 
        }
        ?>
        <!-- Name -->
        <input type="text" class="form-control mb-4" placeholder="Name" name="name" required>

        <!-- Email -->
        <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" required>

        <!-- Subject -->
        <label>Subject</label>
        <select class="custom-select mb-4" name="subject">
            <option value="" disabled>Choose option</option>
            <option value="1" selected>Feedback</option>
            <option value="2">Report a bug</option>
            <option value="3">Feature request</option>
            <option value="4">Feature request</option>
        </select>

        <!-- Message -->
        <div class="form-group">
            <textarea class="form-control rounded-0" rows="3" placeholder="Message" name="message"></textarea>
        </div>

        <!-- Copy -->
        <div class="custom-control custom-checkbox mb-4">
            <input type="checkbox" class="custom-control-input" id="contactFormCopy" name="contact-copy">
            <label class="custom-control-label" for="contactFormCopy">Send me a copy of this message</label>
        </div>

        <!-- Send button -->
        <div class="btn-block">
            <button class="btn btn-submit" type="submit">Send</button>
            <button class="btn btn-reset" name="reset" type="reset">Reset</button>
        </div>
    </form>
    <!-- ./form contact -->
</body>

</html>