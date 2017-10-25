<?php
session_start();
//initialize variable
$name = "";
$address = "";
$id = 0;
$edit_state = false;

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'crud');

// if save button is checked

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $address = $_POST['address'];

    $query = "INSERT INTO info (name, address) VALUE ('$name', '$address')";
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Address Saved";
    header('location: index.php'); //redirect index page.
}

//update records
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
    $_SESSION['msg'] = "Address updated!";
    header('location: index.php');
}

//delete data or records
if(isset($_GET['del'])){
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM info WHERE id=$id");
    $_SESSION['msg'] = "Address deleted";
    header('location: index.php');
}




// retrieve records

$results = mysqli_query($db, "SELECT * FROM info");


