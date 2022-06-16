<?php
$Nombres = $_POST['Nombres'];
$Apellido = $_POST['Apellido'];
$Documento = $_POST['Documento'];
$Fecha_Nacimiento = $_POST['Fecha_Nacimiento'];
$Domicilio = $_POST['Domicilio'];
$Telefono = $_POST['Telefono'];
$Email = $_POST['Email'];
$Curso = $_POST['Curso'];

if(!empty($Nombres) || !empty($Apellido) || !empty($Documento) || !empty($Fecha_Nacimiento) || !empty($Domicilio) || !empty($Telefono) || !empty($Email) || !empty($Curso)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $bdname = "basedatos";
    $conn = new mysqli($host,$dbusername,$dbpassword,$bdname);
    if (mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else {
        $SELECT = "SELECT Documento from participantes where Documento = ? limit 1 ";
        $INSERT = "INSERT INTO participantes (Nombres,Apellido,Documento,Fecha_Nacimiento,Domicilio,Telefono,Email,Curso)values(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare ($SELECT);
        $stmt->bind_param( "i" , $Documento);
        $stmt->execute();
        $stmt->bind_result($Documento);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssississ" , $Nombres, $Apellido, $Documento, $Fecha_Nacimiento, $Domicilio, $Telefono, $Email, $Curso);
            $stmt->execute();
            echo "Registro completado.";
        }

        else {
            echo "El numero de documneto ya esta registrado.";
        }
        $stmt->close();
        $conn->close();

    }
 } 
else {
    echo "Por favor completar todos los datos.";
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br/>
    Volviendo en 3 segundos...
<script>
        setTimeout(() => window.location.replace("."), 3000);
</script>
</body>
</html>