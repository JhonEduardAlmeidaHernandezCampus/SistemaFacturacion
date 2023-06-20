<?php
    class client extends connect{

        private $sql = 'INSERT INTO tb_client(id_client, name_client, email_client, client_address, client_phone) VALUES (:cedula, :name, :email, :address, :phone)';
        private $sqlGetAll = 'SELECT * FROM tb_client';
        private $Message;
        use getInstance;

        function __construct(private $ID_Client, public $Name_Client, public $Email_Client, public $Client_Address, public $Client_Phone){parent::__construct();}

        public function postClient(){
            try {
               
                $res = $this->connec->prepare($this->sql); // Preparamos la consulta para ejecutarla
                $res->bindValue("cedula", $this->ID_Client);
                $res->bindValue("name", $this->Name_Client);
                $res->bindValue("email", $this->Email_Client);
                $res->bindValue("address", $this->Client_Address);
                $res->bindValue("phone", $this->Client_Phone);
                $res->execute();
                $Message = ["Code" => 200+$res->rowCount(), "Message" => "Inserted data"];

            } catch (\PDOException $e) {
                $Message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];

            }finally{
                print_r($Message);
            }
        }

        public function getClient(){
            try {
               
                $res = $this->connec->prepare($this->sqlGetAll); // Preparamos la consulta para ejecutarla
                
                $res->bindColumn("cedula");
                $res->bindColumn("name");
                $res->bindColumn("email");   // Colocar alias a las columnas en get
                $res->bindColumn("address");
                $res->bindColumn("Cellphone");
                
                $res->execute();
                $Message = ["Code" => 200, "Message" => $res->fetchAll(PDO::FETCH_BOUND)];

            } catch (\PDOException $e) {
                $Message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];

            }finally{
                print_r($Message);
            }
        }
    }
?>