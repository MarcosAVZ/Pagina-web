<?php
        //credenciales de acceso a la base datos
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'login_educativo';

        // conexion a la base de datos
        $conexion = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

        // Verificar la conexión
        if ($conexion->connect_error) {
            // si se encuentra error en la conexión
            die('Hubo un fallo en la conexión' . $conexion->connect_error);
        }
