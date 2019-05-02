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
                if (!file_exists($savePath)) {
                    $fileNum++;
                    $image = new \Imagick(realpath($imagePath));
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
        $image = new \Imagick(realpath($imagePath));
        $image->rotateImage(new \ImagickPixel('none'), $angle);
        $image->writeImage($imagePath);
        $image->clear();
        $image->destroy();
        $thumb = new \Imagick(realpath($thumbPath));
        $thumb->rotateImage(new \ImagickPixel('none'), $angle);
        $thumb->writeImage($thumbPath);
        $thumb->clear();
        $thumb->destroy();
        echo $imagePath . "<br/>";
        echo $thumbPath . "<br/>";
    }

}
