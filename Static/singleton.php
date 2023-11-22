<?php
class Singleton{

    private static Singleton $instance = null;

    public static function getInstance(){

        if(is_null(self::$instance)){
            self::$instance = new Singleton();
        }
        
        return self::$instance;
    }
}