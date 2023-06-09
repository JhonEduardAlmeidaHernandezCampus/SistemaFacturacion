<?php
    class seller{
        use getInstance;
        function __construct(public $seller){
            print_r($seller);
        }
    }
?>