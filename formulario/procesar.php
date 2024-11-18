<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];
    $genero = $_POST['genero'];
    $intereses = isset($_POST['intereses']) ? $_POST['intereses'] : [];

   
    if (empty($nombre) || empty($edad) || empty($email) || empty($curso) || empty($genero) || empty($intereses)) {
        header('Location: index.php?vista=error');
        exit;
    }

  
    session_start();
    $_SESSION['datos'] = compact('nombre', 'edad', 'email', 'curso', 'genero', 'intereses');

    
    header('Location: index.php?vista=resultados');
    exit;
} else {
    header('Location: index.php?vista=registro');
    exit;
}
?>
