<?php

namespace DDStudio\Widget;

use DDStudio\Widget\ddw\event;
use DDStudio\Widget\widgets\layout;
use Exception;

class ddw {
    
    private static $layouts = array();
    private static $widgets = array();

    public static function init($request) {
        $data =  event::fire(event::ASK_LAYOUTS,$request);
        if(count($data) > 0) {
            return $data[0]['response'];
        } else {
            return false;
        }
    }

    public static function create($type,$config) {
        if($type == 'layout') {
            self::$layouts[] = new layout($config);
        }
    }

    public static function get_layout($id) {
        $layout = false;
        foreach (self::$layouts as $l) {
            if($l->id == $id) {
                $layout = $l;
                break;
            }
        }
        return $layout;
    }

    public static function start_layout($id) {
        $layout = self::get_layout($id);
        if($layout) {
            return $layout;
        } else {
            throw new Exception('ddstudio/widget exception: layoud is not found!');
        }
    }

}
