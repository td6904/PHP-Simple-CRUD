<?php
include 'partials/header.php';

require __DIR__.'/users/users.php';


$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

$errors = [
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = array_merge($user, $_POST);

//^^^^^ Makes the info stay on page when errors declared! Very useful
    $isValid = validateUser($user, $errors);
    
    if ($isValid){
    $user = createUser($_POST);

    uploadImage($_FILES['picture'], $user);

    header("Location: index.php");


    }

}
//^^Moved isset to upload image function in users




?>


<?php include "_form.php" ?>

