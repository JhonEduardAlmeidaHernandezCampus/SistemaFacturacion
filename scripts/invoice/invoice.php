<?php
    class invoice{
        use getInstance;
        function __construct(public $N_Invoice, public $D_Invoice){
            print_r($N_Invoice);
        }
    }
?>