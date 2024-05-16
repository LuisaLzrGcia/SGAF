<?php
session_start();

// Verifica si se ha enviado un archivo
if (isset($_FILES['archivo'])) {
    $file = $_FILES['archivo'];

    // Nombre original del archivo
    $fileName = $file['name'];
    // Ubicación temporal del archivo
    $fileTmpName = $file['tmp_name'];
    // Tamaño del archivo
    $fileSize = $file['size'];
    // Errores (si los hay)
    $fileError = $file['error'];

    // Extrae la extensión del archivo
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Extensiones permitidas
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf', 'txt', 'docx'); // Agregando txt y docx

    // Verifica si la extensión del archivo es válida
    if (in_array($fileExt, $allowedExtensions)) {
        // Verifica si no hay errores
        if ($fileError === 0) {
            // Verifica el tamaño del archivo (opcional)
            if ($fileSize < 50000000000) { // Por ejemplo: 5MB
                // Ruta donde se guardará el archivo (incluyendo el nombre original)
                $uploadDir = $_SESSION['actualDireccion'];
                // Ruta completa del archivo
                $uploadPath = $uploadDir . "/" . $fileName;

                // Mueve el archivo de la ubicación temporal a la ubicación deseada
                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    header("Location: main.php");
                } else {
                    echo "Ocurrió un error al subir el archivo.";
                }
            } else {
                echo "El archivo es demasiado grande.";
            }
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    } else {
        echo '<script>alert("Solo se permiten archivos de tipo JPG, JPEG, PNG, PDF, TXT o DOCX.");</script>';
        echo '<script>window.location.href = "main.php";</script>';
    }
}
?>