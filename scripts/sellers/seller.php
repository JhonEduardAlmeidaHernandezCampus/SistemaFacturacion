<?php
    class seller{
        use getInstance;
        function __construct(public $Seller){
            print_r($Seller);
        }
    }
?>