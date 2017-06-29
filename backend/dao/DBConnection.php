<?php


 class DBConnection{

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
            CREATE TABLE IF NOT EXISTS 'paciente'(
              'PACIENTE_RUT' int(8) NOT NULL,
              'PACIENTE_NOMBRE_COMPLETO' varchar(50) DEFAULT NULL,
              'PACIENTE_FECHA_NACIMIENTO' DATE DEFAULT NULL,
              'PACIENTE_SEXO' varchar(20) DEFAULT NULL,
              'PACIENTE_DIRECCION' varchar(25) DEFAULT NULL,
              'PACIENTE_TELEFONO' int(9) DEFAULT NULL,
              PRIMARY KEY (PACIENTE_RUT)
              )ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
            CREATE TABLE IF NO EXISTS 'medico'(
              'MEDICO_RUT' int(8) NOT NULL,
              'MEDICO_NOMBRE_COMPLETO' varchar(50) DEFAULT NULL,
              'MEDICO_FECHA_CONTRATACION' DATE DEFAULT NULL,
              'MEDICO_ESPECIALIDAD' varchar(25) DEFAULT NULL,
              'MEDICO_VALOR_CONSULTA' int(7) DEFAULT NULL,
              PRIMARY KEY('MEDICO_RUT')
              )ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
            CREATE TABLE IF NOT EXISTS 'atencion'(
               'ATENCION_ID' int(6) NOT NULL,
               'ATENCION_FECHA_HORA' DateTime DEFAULT NULL,
               'ATENCION_PACIENTE_RUT'INT(8) NOT NULL,
               'ATENCION_MEDICO_RUT' INT(8) NOT NULL,
              'ATENCION_ESTADO' VARCHAR(15),
              PRIMARY KEY (ATENCION_ID)
              )ENGINE=InnoDB DEFAULT CHARSET=utf8");

            $mysqlConexion->exec("
            ALTER TABLE 'atencion'
            ADD CONSTRAINT 'atencion_paciente_fk' FOREIGN KEY ('ATENCION_PACIENTE_RUT') REFERENCES 'paciente' ('PACIENTE_RUT') ON UPDATE CASCADE");

            $mysqlConexion->exec("
            ALETER TABLE 'atencion'
            ADD CONSTRAIT 'atencion_medico_fk' FOREIGN KEY ('ATENCION_MEDICO_RUT') REFERENCES 'medico' ('MEDICO_RUT') ON UPDATE CASCADE ");

            $mysqlConexion->exec("
            INSERT INTO 'paciente' ('PACIENTE_RUT','PACIENTE_NOMBRE_COMPLETO','PACIENTE_FECHA_NACIMIENTO','PACIENTE_SEXO','PACIENTE_DIRECCION','PACIENTE_TELEFONO') VALUES
            (11111111,'Pedro Pablo Valenzuela Reyes','1991-09-12','Masculino','Los Laureles 6969',67483929),
            (16276515, 'Maria Jose Valdivia Libano', '1987-12-02', 'Femenino','Huerfanos 670', 74652734),
            (6154337,'Raul Andres Alvarez Jimenez','1950-12-16', 'Masculino', 'Republica 768',75894037),
            (21321321, 'Marcela Andrea Infante Perez','2013-01-14', 'Femenino','Italia 6574', 75649302)");

            $mysqlConexion->exec("
            INSERT INTO  'medico' ('MEDICO_RUT','MEDICO_NOMBRE_COMPLETO', 'MEDICO_FECHA_CONTRATACION','MEDICO_ESPECIALIDAD', 'MEDICO_VALOR_CONSULTA') VALUES
            (12345678,'Natalia Javiera Alvarez Mandel','2014-08-03','Nutricionista', 15000),
            (1123321,'Rafael Martinez Bunster','2010-07-01','Traumatologo',25000),
            (15678345,'Andres Antonio Quiroga Gonzalez','2010-08-09','Medicina General',20000),
            (17897456,'Macarena Alejandra Alvarado Soto','2012-08-09','Fonoaudiologa', '15000'),
            (17345676,'Valentin Catalan Henriquez','2010-07-12','Kinesiologo', 15000)");

            $mysqlConexion->exec("
            INSERT INTO 'atencion' ('ATENCION_ID','ATENCION_FECHA_HORA','ATENCION_PACIENTE_RUT','ATENCION_MEDICO_RUT','ATENCION_ESTADO') VALUES
            (1,'2017-06-27 13:00',16276515 ,12345678,'Realizada'),
            (2,'2017-06-03 14:30',16276515,17897456, 'Anulada'),
            (3, '2017-06-12 11:30',21321321, 12345678, 'Agendada' )");





            return $mysqlConexion;

        }catch(Exception $e){
          echo $e->getMessage();
          die($e->getCode());
        }







 }
 }
