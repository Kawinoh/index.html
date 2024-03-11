<?php
$conn = mysqli_connect('127.0.0.1', 'root', '');
mysqli_select_db($conn, 'register');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users(Name,Email,Password) VALUES ('$name','$email','$password')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header('Location: home.html');
        exit();
    }
}
