<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>

    <link rel='stylesheet' href='/assets/fontawesome/css/all.min.css'>
    <link rel='stylesheet' href='/assets/css/auth.css'>

</head>

<body translate="no">
    <!-- Page Content  -->
    <?php require_once VIEWS.'/layouts/partials/_flash-message.php'; ?>
    <?php include(VIEWS."/".$template); ?>
   

    <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
    </script>

</body>

</html>