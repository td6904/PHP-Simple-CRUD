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

    if (!$user['name']){
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }

    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username'] > 16)){
        $isValid = false;
        $errors['username'] = 'Username is mandatory, must be between 6 and 16 characters';
    }

    //Stuck here, data not posting now and username always showing error when should be valid.
    //Timestamp 1h23m
    

    if ($isValid){
    $user = createUser($_POST);

    uploadImage($_FILES['picture'], $user);

    header("Location: index.php");


    }

}
//^^Moved isset to upload image function in users




?>


<?php include "_form.php" ?>

