<?php

namespace App\Lib;

class FileSystem {

    function getMediaImages($start = 0, $num = 0) {

        $path = realpath('../webroot/media/images');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST);
        $files = [];
        $fileCount = 0;
        foreach ($objects as $name => $object) {
            if (!$object->isDir()) {
                $pths=explode(".",$name);
                $ext=strtolower(end($pths));
                if ($fileCount >= $start && ($num == 0 || $fileCount < ($start + $num)) && in_array($ext,["jpg","jpeg","png"])) {
                    $files[] = $objects->getSubPathName();
                }
                $fileCount++;
            }
        }
        return $files;
    }

    function getTotalImageCount() {

        $path = realpath('../webroot/media/images');
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST);
        $imgCount = 0;
        foreach ($objects as $name => $object) {
            if (!$object->isDir()) {
                $imgCount++;
            }
        }
        return $imgCount;
    }

    function generateThumbs() {

        $sourceFolder = realpath('../webroot/media/images');
        $destFolder = realpath('../webroot/media/thumbs');
        $maxNum = 100;
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($sourceFolder, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST);
        $fileNum = 0;
        foreach ($objects as $name => $object) {
            if (!empty($maxNum) && $fileNum >= $maxNum) {
                break;
            }
            $subPath = $objects->getSubPathName();
            if ($object->isDir()) {
                $destPath = $destFolder . DIRECTORY_SEPARATOR . $subPath;
                if (!is_dir($destPath)) {
                    mkdir($destPath);
                    chmod($destPath, 0777);
                    echo $subPath . "<br/>";
                    ob_flush();
                    flush();
                }
            } else {
                $imagePath = $sourceFolder . DIRECTORY_SEPARATOR . $subPath;
                $savePath = $destFolder . DIRECTORY_SEPARATOR . $subPath;
                $pths=explode(".",$name);
                $ext=strtolower(end($pths));
                if (!file_exists($savePath) && in_array($ext,["jpg","jpeg","png"])) {
                    $fileNum++;                  
                    $image = new \Imagick(realpath($imagePath));
                    $orientation = $image->getImageOrientation(); 
                    if($orientation!=\Imagick::ORIENTATION_TOPLEFT){
                        $image->setImageOrientation(\Imagick::ORIENTATION_TOPLEFT);
                        $image->writeImage($imagePath);
                    }
                    
                    $image->resizeImage(150, 150, 0, 1, true);                 
                    $image->writeImage($savePath);
                    echo $subPath . "<br/>";
                    ob_flush();
                    flush();
                    chmod($savePath, 0777);
                    $image->clear();
                    $image->destroy();
                }
            }
        }
    }

    function rotateImage($path, $angle) {
        $imageFolder = realpath('../webroot/media/images');
        $thumbFolder = realpath('../webroot/media/thumbs');
        $imagePath = $imageFolder . DIRECTORY_SEPARATOR . $path;
        $thumbPath = $thumbFolder . DIRECTORY_SEPARATOR . $path;
        $fullImage = new \Imagick(realpath($imagePath));
        $fullImage->rotateImage(new \ImagickPixel('none'), $angle);
        $fullImage->writeImage($imagePath);
        $fullImage->clear();
        $fullImage->destroy();
        $thumb = new \Imagick(realpath($thumbPath));
        $thumb->rotateImage(new \ImagickPixel('none'), $angle);
        $thumb->writeImage($thumbPath);
        $thumb->clear();
        $thumb->destroy();
        echo $imagePath . "<br/>";
        echo $thumbPath . "<br/>";
    }

}
