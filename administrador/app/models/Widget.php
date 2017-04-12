<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

final class Widget {

    //------------------------------------------------
    const ROUTE = IS_API ? '../widgets/' : 'widgets/';


    /**
    * Controlador de Widget
    */

    final public static function load(string $widget){

        $file = self::ROUTE . $widget . '/' . ucwords($widget) . '.php';
        if(file_exists($file)) {
          include_once($file);
        } else {
          trigger_error('El widget ' . $widget . ' no existe en la librería de Widgets.', E_USER_ERROR);
        }
    }

}
?>
