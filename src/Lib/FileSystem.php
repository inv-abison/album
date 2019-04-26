<?php

namespace App\Lib;

class FileSystem {

    function getMediaImages() {

        $path = realpath('../webroot/media/images');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST);
        $files = [];
        foreach ($objects as $name => $object) {
            if (!$object->isDir()) {
                $files[] = $objects->getSubPathName();    
            }
        }
        return $files;
    }

}
