<?php

namespace NV\ParejasBundle\Utilities;

class Dictionary{
    
    public static function getLang($v='couple'){
        switch ($v){
            case 'couple':
                $lang['introh2']="Explicar lo que buscáis, como sois, aficiones...";        
            break;
            case 'single':
                $lang['introh2']="Explica lo que buscas, como eres, aficiones...";
            break;
        }
        
        return $lang;
        
    }
    
}

?>