<?php
    //comentario 
   echo "Hola mundo \n"; 
    /**
     * Comentario en varias lineas 
     */

     //Variables 

     $string = "Santiago";
     echo $string . "\n";
    $int = 11;

    echo "El numero es $int y el String es $string .\n";
    
    //CONSTANTES
    const my_constant = "Valor";
    echo my_constant . "\n";

    //Listas

    $array = [$string, $int];
    echo $array[0] . "\n";
    array_push($array, $int);
    print_r($array);

    //diccionario
    $dic = array("string" => $string, "int" => $int);
    print_r($dic);
    echo $dic["int"] . "\n";

    //set
    array_push($array,"ok");
    array_push($array,"ok");
    print_r($array);

    //ciclos 

    for( $index = 0; $index < 11; $index ++){
        echo $index . "\n";
    }

    foreach($array as $item){
        echo $item . "\n";
    }   
        $a =0;
        while($a <= sizeof($array) -1){
            echo $array[$a] . "\n";
            $a ++;
        }

    if($int == 11){
        echo "El valor es 11". "\n";
    }else{
        echo "No es 11" ."\n";
    }

    //Funciones
    function print_number( int $number){
        echo $number. "\n";
    }

    print_number(52);

    //Clases--< objetos

    class myClass{
        public $name;
        public $edad;

        function __construct( $name, $edad ){
            $this->name = $name;
            $this -> edad = $edad;
    }
}
    $class = new myClass("Holaaaa", 56);
    print_r($class);
    echo $class ->edad;

?>