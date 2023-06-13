<?php
    trait getInstance{
        public static $instance;
        public static function getInstance() {
            $arg = func_get_args();
            $arg = array_pop($arg);
            return (self::$instance == null) ? self::$instance = new self(...(array) $arg) : self::$instance;
            // return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;
        }

        //modificadores de acceso 
        function __set($name, $value){
            $this->$name = $value;
        }

        function __get($name){
            return $this->name;
        }
    }

    function autoload($class) {

        // Directorios donde buscar archivos de clases
        $directories = [
            dirname(__DIR__).'/scripts/sellers/',
            dirname(__DIR__).'/scripts/client/',
            dirname(__DIR__).'/scripts/invoice/',
            dirname(__DIR__).'/scripts/product/',
            dirname(__DIR__).'/scripts/db/'
        ];

        // Convertir el nombre de la clase en un nombre de archivo relativo 
        $classFile = str_replace('\\', '/', $class) . '.php';

        // Recorrer los directorios y buscar el archivo de la clase
        foreach ($directories as $directory) {
            $file = $directory.$classFile;
            // Verificar si el archivo existe y cargarlo
            if (file_exists($file)) {
                require $file;
                break;
            }
        }

    }
    spl_autoload_register('autoload');

    class Datos{
        use getInstance;
        public function __construct(private $_METHOD, public $_HEADER, private $_DATA){
            match($_METHOD){
                "POST" => $this->datosRecibidos($_DATA),  
                "GET" => $this->doSomethingForGetMethod(),
                
            };
        }

        function datosRecibidos($_DATA){
            invoice::getInstance($_DATA["Invoice"]);
            seller::getInstance($_DATA["Seller"]);
            client::getInstance($_DATA["Client"]);
            products::getInstance($_DATA["Products"]);
        }

        function doSomethingForGetMethod() {
            // Lógica para el método GET
        }

    }

    $data = [
        "_METHOD"=>$_SERVER['REQUEST_METHOD'], 
        "_HEADER"=> apache_request_headers(), 
        "_DATA" => json_decode(file_get_contents("php://input"), true)
    ];

    var_dump($data);

    //llmamos la instancia y le pasamos la data del contrsuctor
    Datos::getInstance($data);

?>