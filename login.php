<?php
session_start();
include_once 'connect.php';
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $existingEmails = [];

    $query = "SELECT Email FROM users;";
    $sql = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($sql)) {
        $existingEmails[] = $row['Email'];
    }
    if(in_array($email,$existingEmails)){
        $query = "SELECT Password FROM users WHERE Email = '$email';";
        $sql = mysqli_query($conn,$query);

        if($row = mysqli_fetch_array($sql)){
            $password = $row['Password'];
        }
        if($password == $pass){
            $_SESSION['user'] = $email;
            header('Location: home.html');
            exit();
        }else{
            header('Location: index.html');
            exit();
        }
    }else{
        header('Location: register.html');
        exit();
    }
}
?>