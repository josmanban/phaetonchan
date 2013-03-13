<?php

require_once 'config.php';

class DbConnection {
        
    private $db_server;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $db;

    /* private $strConn='mysql:host='..';dbname='..';charset=utf8'; */

    function __construct() {
        $this->db_server = DB_SERVER;
        $this->db_user = DB_USER;
        $this->db_pass = DB_PASS;

        $this->db_name = DB_NAME;

        $this->connect();
    }

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }

    private function connect() {
        if (!isset($this->db)) {
            /* $this->db = mysql_connect($this->db_server, $this->db_user, $this->db_pass);
              mysql_select_db($this->db_name); */

            $this->db = new PDO(
                            'mysql:host=' . $this->db_server . ';dbname=' . $this->db_name . ';charset=utf8',
                            $this->db_user, $this->db_pass, array(PDO::ATTR_EMULATE_PREPARES => FALSE,
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }

    public function execute($parameters) {



        $sql = $parameters['sql'];

        try {
            $stmt = $this->db->prepare($sql);
            if (isset($parameters['array'])) {
                $values = $parameters['array'];

                $stmt->execute($values);
            } else {
               
                $stmt->execute();
            }
            return $stmt;
        } catch (Exception $e) {
            header('Location: error.php?errorMessage=Error de la base de datos¡¡');
            
        }
    }

    public function foundRows() {
        $stmt = $this->db->query('SELECT FOUND_ROWS() as total ');
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }

}

?>
