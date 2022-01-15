<?php
    require_once("../libs/UserValidator.php");
    require_once("../libs/ValidationException.php");
    require_once("../libs/DBUser.php");

    $postData = json_decode(file_get_contents('php://input'), true);
    //session_start();
    $postData = $_POST;

    spl_autoload_register(function ($className) {
         require_once("../libs/$className.php");
    });

    try {
        UserValidator::validateData($postData, true);
    }
    catch (ValidationException $e) {
        die(json_encode($e->getErrors(), JSON_UNESCAPED_UNICODE));
    }

    $isRegisteredUser = DBUser::isUserRegistered($postData["email"]);
    echo $isRegisteredUser == false;

    if (!$isRegisteredUser) {
        DBUser::addUser($postData);
        //$_SESSION["email"] = $postData["email"]];
    }

    //echo json_encode(['success' => $registerSuccessful]);
?>
