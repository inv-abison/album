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
class IndexController extends AppController {

    function initialize() {
        parent::initialize();
        $this->EventImages = TableRegistry::get('EventImages');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $fs = new FileSystem();
        $allImages = $fs->getMediaImages();
        $this->set(compact('allImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Event Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $eventImage = $this->EventImages->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('eventImage', $eventImage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $eventImage = $this->EventImages->newEntity();
        if ($this->request->is('post')) {
            $eventImage = $this->EventImages->patchEntity($eventImage, $this->request->getData());
            if ($this->EventImages->save($eventImage)) {
                $this->Flash->success(__('The event image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event image could not be saved. Please, try again.'));
        }
        $categories = $this->EventImages->Categories->find('list', ['limit' => 200]);
        $this->set(compact('eventImage', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Event Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $eventImage = $this->EventImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventImage = $this->EventImages->patchEntity($eventImage, $this->request->getData());
            if ($this->EventImages->save($eventImage)) {
                $this->Flash->success(__('The event image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event image could not be saved. Please, try again.'));
        }
        $categories = $this->EventImages->Categories->find('list', ['limit' => 200]);
        $this->set(compact('eventImage', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Event Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $eventImage = $this->EventImages->get($id);
        if ($this->EventImages->delete($eventImage)) {
            $this->Flash->success(__('The event image has been deleted.'));
        } else {
            $this->Flash->error(__('The event image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
