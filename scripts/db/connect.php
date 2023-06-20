<?php
    interface environments{
        public function __get($name);
    }

    abstract class connect extends credentials implements environments{
        use getInstance;
        protected $connec;
        function __construct(public $driver = "mysql", private $port = 3306){
            try {
                $this->connec = new PDO($this->driver.":host=".$this->__get('host').";port=".$this->port.";dbname=".$this->__get('dbname').";user=".$this->username.";password=".$this->password.";");
                $this->connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//!conexión PDO 
            } catch (\PDOException $e) {
                $this->conecc = $e->getMessage();
            }
        }
    }
?>