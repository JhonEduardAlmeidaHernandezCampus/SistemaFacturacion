<?php
    class products{
        use getInstance;
        function __construct(private $Cod_Product, public $Name_Product, public $amount_Product, public $Unit_Value_Product){
            print_r($Name_Product);
        }
    }
?>