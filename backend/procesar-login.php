<?php

include_once __DIR__.'/controller/UsuarioController.php';

if(isset($_POST['rut']) && isset($_POST['clave'])) {
    if(UsuarioController::validarUsuario($_POST['rut'],$_POST['clave'])) {
        
        session_start();
        $user = UsuarioController::getDatosUsuario($_POST['rut']);
        $_SESSION['id'] = $user['id'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['perfil'] = $user['perfil'];
        
        if($_SESSION['perfil'] === 'Director') {
            header('location: ../frontend/director.php');
            return;
        }
        elseif($_SESSION['perfil'] === 'Administrador') {
            header('location: ../frontend/administrador.php');
            return;
        }
        elseif($_SESSION['perfil'] === 'Secretario') {
            header('location: ../frontend/secretaria.php');
            return;
        }
        elseif($_SESSION['perfil'] === 'Paciente') {
            header('location: ../frontend/paciente.php');
            return;
        }
        else {
            $error = "Perfil de usuario incorrecto. Contáctese con el administrador.";
            header('location: login.php');
            return;
        }
    }
    else {
        header('Refresh:1; url=/dai5501_examen/frontend/login.php');
        ?>
        <script>alert("Usuario o clave incorrectos");</script>
        <?php
    }
    
}
else {
    $error = "Falta completar alguno de los campos";
    ?>
    <script>alert("<?= $error ?>");</script>
    <?php
}
?>