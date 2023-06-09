<?php
session_start();

require('fileDatabase.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="Login">
    </form>
    <p>Sign up <a href="register.php">here</a> if you haven't already signup</p>
</body>

</html>

<?php
$db = new FileDatabase('database.json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($db->checkData($email, $password)) {
            $_SESSION['token'] = 'I\'m a valid token and I\'m logged in :D';

            header('Location: index.php');
            die;
        } else {
            echo '<br> Wrong Credentials!';
        }
    }
}
?>