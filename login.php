<?php

include_once './includes/functions/user.php';
include_once './includes/functions/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    $_SESSION["name"] = $user->getNombre();
    $_SESSION['role'] = $user->getRole();
    include_once 'index.php';

}else if(isset($_POST['email']) && isset($_POST['contraseña'])){
    $userForm = $_POST['email'];
    $passForm = $_POST['contraseña'];

    if($user->userExists($userForm, $passForm)){
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        $_SESSION['name'] = $user->getNombre();
        $_SESSION['usuarioID'] = $user->getId();
        $_SESSION['role'] = $user->getRole();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['phone'] = $user->getPhone();
        $_SESSION['isValid'] = true;

        include_once 'index.php';
    }else{
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once './login/actionLogin.php';
    }

}else{
    include_once 'login/actionLogin.php';

}


?>