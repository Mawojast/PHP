<?php
class ClassInfo {

    public static function getData(ReflectionClass $class): string {

        $data = "";
        $name = $class->getName();

        $data .= ( $class->isUserDefined() ) ? "$name is user defined\n" : "";
        $data .= ( $class->isInternal() ) ? "$name is built-in\n" : "";
        $data .= ( $class->isInterface() ) ? "$name is interface\n" : "";
        $data .= ( $class->isAbstract() ) ? "$name is abstract\n" : "";
        $data .= ( $class->isFinal() ) ? "$name is final\n" : "";
        $data .= ( $class->isInstantiable() ) ? "$name can be instantiated\n" : "$name can not be instantiated\n";
        $data .= ( $class->isCloneable() ) ? "$name can be cloned\n" : "$name can not be cloned";

        return $data;
    }

    public static function getMethodData(ReflectionMethod $method): string {

        $data = "";
        $name = $method->getName();

        $data .= ($method->isUserDefined()) ? "$name is user defined\n" : "" ;
        $data .= ($method->isInternal()) ? "$name is built-in\n" : "" ;
        $data .= ($method->isAbstract()) ? "$name is an abstract class\n" : "" ;
        $data .= ($method->isPublic()) ? "$name is public\n" : "" ;
        $data .= ($method->isProtected()) ? "$name is protected\n" : "" ;
        $data .= ($method->isPrivate()) ? "$name is private\n" : "" ;
        $data .= ($method->isStatic()) ? "$name is static\n" : "" ;
        $data .= ($method->isFinal()) ? "$name is final\n" : "" ;
        $data .= ($method->isConstructor()) ? "$name is the constructor\n" : "" ;
        $data .= ($method->returnsReference()) ? "$name returns a reference (as opposed to a value)\n" : "" ;

        return $data;
    }

    public static function getArgData(ReflectionParameter $arg): string {

        $data = "";
        $declaringclass = $arg->getDeclaringClass();
        $name = $arg->getName();

        $position = $arg->getPosition();
        $data .= "\$$name has position $position\n";
        if ($arg->hasType()) {
            $type = $arg->getType();
            $typenames = [];
            if ($type instanceof \ReflectionUnionType) {
                $types = $type->getTypes();
                foreach ($types as $utype) {
                    $typenames[] = $utype->getName();
                }
            } else {
                $typenames[] = $type->getName();
            }
            
            $typename = implode("|", $typenames);
            $details .= "\$$name should be type {$typename}\n";
        }

        if ($arg->isPassedByReference()) {
            $details .= "\${$name} is passed by reference\n";
        }

        if ($arg->isDefaultValueAvailable()) {
            $def = $arg->getDefaultValue();
            $details .= "\${$name} has default: $def\n";
        }

        if ($arg->allowsNull()) {
            $details .= "\${$name} can be null\n";
        }
        
        return $details;
    }
}
?>