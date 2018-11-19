<?php

class CarrierController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');


    var $uses=array('Carrier');
    public function index(){
        //  $this->set('posts', $this->carrier->find('all'));
        if($this->request->is('post')){
            Configure::read();
            pr($this->data); 
            $this->Carrier->create();
            $filename = null;

            if (!empty($this->request->data['Carrier']['Resume']['tmp_name']) && is_uploaded_file($this->request->data['Carrier']['Resume']['tmp_name'])) 
            {
                // Strip path information
                $filename = basename($this->request->data['Carrier']['Resume']['name']); 
                move_uploaded_file(
                    $this->data['Carrier']['Resume']['tmp_name'],
                    WWW_ROOT . DS . 'documents' . DS . $filename
                );
            }

            // Set the file-name only to save in the database
            $this->data['Carrier']['Resume'] = $filename;
            pr($this->data); 
            if ($this->Carrier->save($this->request->data)) {
                $this->Session->setFlash(__('Your Details has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to add your Details'));
            }
            
        }
    }

}