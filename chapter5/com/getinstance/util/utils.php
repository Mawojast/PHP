<?php
namespace com\getinstance\util {

    class Debug {

        public static function helloWorld(): void {

            echo "hello from namspace ".__NAMESPACE__."\n";
        }
    }
}

namespace anotherNamespace {

    class ClassInAnotherNamespace {

        public static function helloWorld(): void {

            echo "hello from anotherNamespace\n";
        }
    }
}