<?php
include 'partials/header.php';

require __DIR__.'/users/users.php';

if (!isset($_GET['id'])){
    include 'partials/not_found.php';
    exit;
}


$userId = $_GET["id"];


$user = getUserById($userId);
if (!$user){
   include 'partials/not_found.php';
       exit;
}

$errors = [
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

//var_dump($_SERVER);
//^^^ Interesting, can tell me when if in GET or POST! Under request method!
//So this makes sense to me now! v v v v v
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Want to know what data comes from $_POST initially? Use following:
    //var_dump($_POST);   ******
    //Notice if I do this with get I get the ID!
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid) {

    $user = updateUser($_POST, $userId);

    uploadImage($_FILES['picture'], $user);    
    
    header("Location: index.php");

    }
}


?>


<?php include "_form.php" ?>
      