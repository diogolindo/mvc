<?php

class Mensagem{

    /*public function __construct () {
        echo "olá!";
    }*/

    public function setMsg ( $class, $string ) {

        if((!empty($class) || !empty($string)) && ($class == "success" || $class == "danger")){
            $msg['class'] = $class;
            $msg['msg'] = $string;

            $_SESSION['msg'][]=$msg;

            return true;
        }
        return false;

    }

}


?>