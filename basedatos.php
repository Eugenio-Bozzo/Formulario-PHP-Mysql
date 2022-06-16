<?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $bdname = "basedatos";
    $conn = new mysqli($host,$dbusername,$dbpassword,$bdname);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="basedatos.css">
    <title>Base De Datos</title>
</head>

<body>
    <div class="datagrid">
        <table>
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Fecha Naciemiento</th>
                    <th>Domicilio</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="9">
                </tr>
            </tfoot>
            <tbody>
                <?php 
		        $sql="SELECT * from participantes";
		        $result=mysqli_query($conn,$sql);

		        while($mostrar=mysqli_fetch_array($result)){
		        ?>
                <tr class="alt">
                    <td><?php echo $mostrar['Nombres'] ?></td>
                    <td><?php echo $mostrar['Apellido'] ?></td>
                    <td><?php echo $mostrar['Documento'] ?></td>
                    <td><?php echo $mostrar['Fecha_Nacimiento'] ?></td>
                    <td><?php echo $mostrar['Domicilio'] ?></td>
                    <td><?php echo $mostrar['Telefono'] ?></td>
                    <td><?php echo $mostrar['Email'] ?></td>
                    <td><?php echo $mostrar['Curso'] ?></td>
                </tr>
            </tbody>
            <?php 
	        }
	        ?>
        </table>
    </div>
</body>

</html>