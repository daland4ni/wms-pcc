<?php

include "conn.php";
session_start();

$action = $_GET['action'];

if ($action === 'login') {
    $username = $_POST['username'];
    $pword = $_POST['pword'];
    $pword = md5($pword);

    $sql = "SELECT * FROM rehomer_info WHERE username='$username' and pword='$pword'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {  
        $row = $result->fetch_assoc();
        $_SESSION['username']= $row['username'];
        header('Location: profile.php');
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
    }

} else if ($action === 'register') {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pword = $_POST['pword'];
    $pword = md5($pword);
    $phonenum = $_POST['phonenum'];
    $honorific = $_POST['honorific'];

    $checkUser="SELECT * From rehomer_info where username='$username'";
    $result = $conn->query($checkUser);
    if($result->num_rows > 0) {
        header('Location: login.php?action=register&error=1');
        exit();
    } else {
        $insertQuerty = "INSERT INTO rehomer_info(username,pword,fname,lname,phonenum,honorific) 
        VALUES ('$username','$pword','$fname','$lname','$phonenum','$honorific')";
        if ($conn->query($insertQuerty)) {
            header("Location: login.php?success=1");
            exit();
        }
    }

}