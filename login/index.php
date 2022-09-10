<?php

include_once 'includes/user.php';
include_once 'includes/userSession.php';


$userSession = new userSession();
$user = new User();

if (isset($_SESSION['user'])) {
    //echo 'Hay session';
    $user->setUser($userSession->getCurrentUser());
    include_once 'views/home.php';
} else if (isset($_POST['username']) && isset($_POST['password'])) {
    //echo 'Validación de login';
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExist($userForm,$passForm)){
        //echo 'Usuario validado';
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'views/home.php';
    }else{
        //echo 'Nombre de usuario y/o password incorrecto';
        $errorLogin = 'Nombre de usuario y/o password incorrecto';
        include_once 'views/login.php';
    }
}else{
    //echo 'login';
    include_once 'views/login.php';
}

?>