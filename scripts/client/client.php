<?php
    class client extends connect{
        use getInstance;
        function __construct(private $ID_Client, public $Name_Client, public $Email_Client, public $Client_Address, public $Client_Phone){
            parent::__construct();
            print_r($this->__get('Name_Client'));
        }
    }
?>