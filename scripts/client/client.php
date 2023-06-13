<?php
    class client{
        use getInstance;
        function __construct(private $ID_Client, public $Name_Client, public $Email_Client, public $Client_Address, public $Client_Phone){
            print_r($Name_Client);
        }
    }
?>