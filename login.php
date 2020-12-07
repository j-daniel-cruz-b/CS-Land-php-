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

        include_once 'index.php';
    }else{
        //echo "nombre de usuario y/o password incorrecto";
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once './login/actionLogin.php';
    }

}else{
    //echo "Login";
    // $errorLogin = "NO HAY SESIÓN";
    include_once 'login/actionLogin.php';

}


?>