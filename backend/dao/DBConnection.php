<?php


class DBConnection {

    const HOST = "localhost";
    const DBNAME = "DAI5501_examen";
    const PORT = "3306";
    const USER = "root";
    const PASS = "";

    public static function getConexion() {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";port=" . self::PORT . ";charset=utf8";

        try {
            $dbConexion = new PDO($dsn, self::USER, self::PASS);
            return $dbConexion;
        } catch (PDOException $exception) {
            switch ($exception->getCode()) {
                case 2002:
                    echo '<div class="error">No se pudo establecer la conexión con la base de datos, revise que &eacute;sta se encuentre en ejecuci&oacute;n.</div>';
                    exit;
                case 1045:
                    echo '<div class="error">No se pudo conectar a la base de datos, revise las credenciales configuradas</div>';
                    exit;
                case 1049: // La base de datos no existe.
                    $dbConexion = self::crearBaseDatos();
                    return $dbConexion;
                default:
                    echo '<div class="error">' . $exception->getMessage() . '</div>';
                    break;
            }
        }
    }

    private static function crearBaseDatos() {

        echo '<div class="warning">Base de datos no encontrada, se crear&aacute;...</div>';

        try {
            $dsn = "mysql:host=" . self::HOST . ";port=" . self::PORT . ";charset=utf8";
            $mysqlConexion = new PDO($dsn, self::USER, self::PASS);
            $mysqlConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mysqlConexion->exec("CREATE DATABASE " . self::DBNAME);
            $mysqlConexion->exec("USE " . self::DBNAME);

            $mysqlConexion->exec("
            CREATE TABLE IF NOT EXISTS `paciente`(
              `PACIENTE_RUT` int(8) NOT NULL DEFAULT '0',
              `PACIENTE_NOMBRE` varchar(50) DEFAULT NULL,
              `PACIENTE_APELLIDO_PATERNO` varchar(50) DEFAULT NULL,
              `PACIENTE_APELLIDO_MATERNO` varchar(50) DEFAULT NULL,
              `PACIENTE_FECHA_NACIMIENTO` DATE DEFAULT NULL,
              `PACIENTE_SEXO` varchar(20) DEFAULT NULL,
              `PACIENTE_DIRECCION` varchar(100) DEFAULT NULL,
              `PACIENTE_TELEFONO` int(9) DEFAULT NULL,
              `PACIENTE_TELEFONO_2` int(9) DEFAULT NULL,
              PRIMARY KEY (`PACIENTE_RUT`)
              )ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
            CREATE TABLE IF NOT EXISTS `medico`(
              `MEDICO_RUT` int(8) NOT NULL,
              `MEDICO_NOMBRE` varchar(50) DEFAULT NULL,
              `MEDICO_APELLIDO_PATERNO` varchar(50) DEFAULT NULL,
              `MEDICO_APELLIDO_MATERNO` varchar(50) DEFAULT NULL,
              `MEDICO_FECHA_CONTRATACION` DATE DEFAULT NULL,
              `MEDICO_ESPECIALIDAD` varchar(25) DEFAULT NULL,
              `MEDICO_VALOR_CONSULTA` int(7) DEFAULT NULL,
              PRIMARY KEY(`MEDICO_RUT`)
              )ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
            CREATE TABLE IF NOT EXISTS `atencion`(
               `ATENCION_ID` int(6) NOT NULL AUTO_INCREMENT,
               `ATENCION_FECHA_HORA` DateTime DEFAULT NULL,
               `ATENCION_PACIENTE_RUT`INT(8) NOT NULL,
               `ATENCION_MEDICO_RUT` INT(8) NOT NULL,
               `ATENCION_ESTADO` varchar(15) DEFAULT 'Agendada',
              PRIMARY KEY (`ATENCION_ID`)
              )ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
            ALTER TABLE `atencion`
            ADD CONSTRAINT `atencion_paciente_fk` FOREIGN KEY (`ATENCION_PACIENTE_RUT`) REFERENCES `paciente` (`PACIENTE_RUT`) ON UPDATE CASCADE");

            $mysqlConexion->exec("
            ALTER TABLE `atencion`
            ADD CONSTRAINT `atencion_medico_fk` FOREIGN KEY (`ATENCION_MEDICO_RUT`) REFERENCES `medico` (`MEDICO_RUT`) ON UPDATE CASCADE ");

            $dir1 = 'Los Laureles 6969';
            $enc1 = base64_encode($dir1);

            $dir2 = 'Huerfanos 670';
            $enc2 = base64_encode($dir2);

            $dir3 = 'Republica 768';
            $enc3 = base64_encode($dir3);

            $dir4 = 'Italia 6574';
            $enc4 = base64_encode($dir4);


            $mysqlConexion->exec("
            INSERT INTO `paciente` (`PACIENTE_RUT`,`PACIENTE_NOMBRE`,`PACIENTE_APELLIDO_PATERNO`,`PACIENTE_APELLIDO_MATERNO`,`PACIENTE_FECHA_NACIMIENTO`,`PACIENTE_SEXO`,`PACIENTE_DIRECCION`,`PACIENTE_TELEFONO`) VALUES
            (11111111,'Pedro Pablo','Valenzuela','Reyes','1991-09-12','Masculino','$enc1',67483929),
            (16276515,'Maria Jose','Valdivia','Libano','1987-12-02', 'Femenino','$enc2', 74652734),
            (6154337,'Raul Andres','Alvarez','Jimenez','1950-12-16', 'Masculino','$enc3',75894037),
            (21321321,'Marcela Andrea','Infante','Perez','2013-01-14', 'Femenino','$enc4', 75649302)");

            $mysqlConexion->exec("
            INSERT INTO  `medico` (`MEDICO_RUT`,`MEDICO_NOMBRE`,`MEDICO_APELLIDO_PATERNO`,`MEDICO_APELLIDO_MATERNO`, `MEDICO_FECHA_CONTRATACION`,`MEDICO_ESPECIALIDAD`, `MEDICO_VALOR_CONSULTA`) VALUES
            (12345678,'Natalia Javiera','Alvarez','Mandel','2014-08-03','Nutricionista', 15000),
            (10123321,'Rafael','Martinez','Bunster','2010-07-01','Traumatologia',25000),
            (15678345,'Andres Antonio','Quiroga','Gonzalez','2010-08-09','Medicina General',20000),
            (17897456,'Macarena Alejandra','Alvarado','Soto','2012-08-09','Fonoaudiologia', '15000'),
            (17345676,'Valentin','Catalan','Henriquez','2010-07-12','Kinesiologia', 15000)");

            $mysqlConexion->exec("
            INSERT INTO `atencion` (`ATENCION_FECHA_HORA`,`ATENCION_PACIENTE_RUT`,`ATENCION_MEDICO_RUT`,`ATENCION_ESTADO`) VALUES
            ('2017-09-27 13:00',16276515,12345678,'Realizada'),
            ('2017-06-03 14:30',11111111,17897456,'Anulada'),
            ('2017-09-12 11:30',21321321,12345678,'Agendada'),
            ('2017-09-03 14:30',16276515,10123321,'Realizada'),
            ('2017-05-29 14:30',21321321,12345678,'Anulada'),
            ('2017-02-04 14:30',11111111,17897456,'Anulada'),
            ('2017-07-03 14:30',21321321,10123321,'Realizada'),
            ('2017-10-03 14:30',6154337,12345678,'Realizada'),
            ('2017-07-03 14:30',21321321,15678345,'Realizada'),
            ('2017-10-03 14:30',11111111,10123321,'Realizada'),
            ('2017-11-03 14:30',21321321,15678345,'Realizada'),
            ('2017-02-03 14:30',6154337,10123321,'Realizada'),
            ('2017-03-06 14:30',16276515,15678345,'Realizada'),
            ('2017-06-03 14:30',21321321,17897456,'Realizada'),
            ('2017-01-21 14:30',16276515,12345678,'Anulada'),
            ('2017-08-03 14:30',21321321,17897456,'Realizada'),
            ('2017-08-23 14:30',6154337,15678345,'Anulada'),
            ('2017-06-17 14:30',11111111,12345678,'Realizada'),
            ('2017-01-18 14:30',16276515,15678345,'Realizada'),
            ('2017-08-03 14:30',16276515,12345678,'Anulada'),
            ('2017-09-29 11:30',6154337,10123321,'Agendada'),
            ('2017-01-28 11:30',21321321,12345678,'Agendada'),
            ('2017-06-12 11:30',11111111,15678345,'Agendada')");

            $mysqlConexion->exec("
            CREATE TABLE IF NOT EXISTS `usuario`(
              `USUARIO_ID` int(8) NOT NULL DEFAULT '0',
              `USUARIO_CLAVE` varchar(100) NOT NULL DEFAULT '',
              `USUARIO_PERFIL` varchar(20) NOT NULL DEFAULT '',
              `USUARIO_NOMBRE` varchar(50) DEFAULT NULL,
              `USUARIO_FECHA_REGISTRO` DATE DEFAULT NULL,
              PRIMARY KEY (`USUARIO_ID`)
              )ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $algo = 1;

            $passDirector = "shield1945d1r3ct0r";
            $dirHash = password_hash($passDirector, $algo);

            $passAdministrador = "admin2017";
            $admHash = password_hash($passAdministrador, $algo);

            $passSecretario = "1234";
            $secHash = password_hash($passSecretario, $algo);

            $passPaciente1 = "pac1";
            $pac1Hash = password_hash($passPaciente1, $algo);

            $passPaciente2 = "pac2";
            $pac2Hash = password_hash($passPaciente2, $algo);

            $passPaciente3 = "pac3";
            $pac3Hash = password_hash($passPaciente3, $algo);

            $passPaciente4 = "pac4";
            $pac4Hash = password_hash($passPaciente4, $algo);

            $mysqlConexion->exec("
            INSERT INTO `usuario` (`USUARIO_ID`,`USUARIO_CLAVE`,`USUARIO_PERFIL`,`USUARIO_NOMBRE`,`USUARIO_FECHA_REGISTRO`) VALUES
            (7774695,'$dirHash','Director','Nick Fury','2017-01-01'),
            (8082710,'$admHash','Administrador','Osvaldo Karambio','2017-03-15'),
            (17586681,'$secHash','Secretario','Cristoph Krumbach','2017-03-15'),
            (11111111,'$pac1Hash','Paciente','Pedro Valenzuela','2017-06-21'),
            (16276515,'$pac2Hash','Paciente','María José Valdivia','2017-06-01'),
            (6154337,'$pac3Hash','Paciente','Raúl Álvarez','2017-06-01'),
            (21321321,'$pac4Hash','Paciente','Marcela Infante','2017-06-01')");


            return $mysqlConexion;

        }catch(Exception $e){
          echo $e->getMessage();
          die($e->getCode());
        }







 }
 }
