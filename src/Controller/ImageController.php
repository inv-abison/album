<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Lib\FileSystem;

/**
 * EventImages Controller
 *
 * @property \App\Model\Table\EventImagesTable $EventImages
 *
 * @method \App\Model\Entity\EventImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImageController extends AppController {

    function initialize() {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function rotate() {
        $this->layout = false;
        $this->render(false);
        $data=$this->request->data;
        if(!empty($data["action"]) && !empty($data["ipath"])){
        if($data["action"]=="rl"){
            $fs = new FileSystem();
            $fs->rotateImage($data["ipath"], -90);
            
        }elseif($data["action"]=="rr"){
            $fs = new FileSystem();
            $fs->rotateImage($data["ipath"], 90);
        }
        }
        
        
    }
}
