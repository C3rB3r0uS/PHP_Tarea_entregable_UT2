<html>
    <head>
        <title>Formulario</title>
    </head>
    <body>

        <form action = "<?= $_SERVER["PHP_SELF"] ?>" method="POST">

            <strong>Dirección de correo electrónico:</strong><input type="text" name="correo" value="" /><br>
            <strong>Nombre y apellidos de la persona física:</strong><input type="text" name="datosPersona" value="" /><br>
            <strong>Número de pasaporte de la persona física titular:</strong><input type="text" name="pasaporte" value="" /><br>
            <strong>Nacionalidad de la persona física:</strong><input type="text" name="nacionalidad" value="" /><br>

            <input type = "hidden" name="array" value="<?php echo serialize($users) ?>"/> 
            <input type="submit" value="Introducir" name="intro"/>

        </form>

    </body>
</html>


