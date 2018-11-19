<html>
    <head>
        <title>Formulario principal</title>
    </head>
    <body>

        <h1>Introduce un nuevo USER</h1>

        <?php
        $users = []; // Definimos el array que contendrá a los usuarios 

        if (!$_POST) {

            include "Formulario.php";
            ?>

            <?php
        } else {

            $errores = []; // Definimos el array que contendrá los posibles errores

            if (!empty($_POST["array"])) {


//                Impresiones de comprobación
//                echo "Impresión antes de unserialize: " . $_POST["array"] . "<br>";
//                print_r($_POST["array"]);
//                
//                echo "<br>";

                $users = unserialize(($_POST["array"])); // Unserialize del array que contiene los datos de los usuarios
//                echo "Impresión tras el unserialize: " . "<br>";
//                print_r($users);
            }

            if (isset($_POST["correo"]) && empty($_POST["correo"])) { // comprobación de que existe el campo correo (isset) y de que el campo está vacío (empty)
                $errores[] = "Debes de introducir un correo";
            }

            // Si contiene algún error, lo muestra
            if ($errores) {
                foreach ($errores as $value) {

                    echo $value;
                }
            } else {

                // Recogida de los datos introducidos en los diversos campos

                $correo = $_POST["correo"];
                $datosPersona = $_POST["datosPersona"];
                $pasaporte = $_POST["pasaporte"];
                $nacionalidad = $_POST["nacionalidad"];
                // Uso de variable auxiliar para almacenar el resultado de la comprobación
                $existe = false;

                // Comprobación de que el correo no se encuentra en el array

                foreach ($users as $arrays) {
                    foreach ($arrays as $key => $value) {

                        if ($key == $correo) {

                            $existe = true;
                        }
                    }
                }

                if ($existe == false && !empty($_POST["datosPersona"]) && !empty($_POST["pasaporte"]) && !empty($_POST["nacionalidad"])) {

                    $users[] = [$correo => $pasaporte];
                } else if ($existe && empty($_POST["datosPersona"]) && empty($_POST["pasaporte"]) && empty($_POST("nacionalidad"))) {

                    // Comprobación de que el correo se encuentra almacenado
                    
                    foreach ($users as $arrays) {
                        foreach ($arrays as $key => $value) {

                            if ($key == $correo) {
                                unset($users[$key]);
                            }
                        }
                    }
                }
                
                // Impresión de los datos de usuarios

                foreach ($users as $arrays) {
                    foreach ($arrays as $key => $value) {

                        echo "Correo electrónico: " . $key . "<br>";
                        echo "Número de pasaporte: " . $value . "<br>";
                        echo "<hr>";
                    }
                }
            }

            include "Formulario.php";
        }
        ?>

    </body>
</html>

