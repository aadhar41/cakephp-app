<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */

class ProductsController extends AppController {

    /*
        public function beforeFilter() {
    	    parent::beforeFilter();
    	    // Allow users to register and logout.
    	    $this->Auth->allow('add', 'logout');
    	}

    */


    // For Pagination add these components.
    public $components = array('Paginator');

    public $paginate = array(
        // 'fields' => array('Product.id', 'Product.created', 'Product.name', 'Product.description','Product.price','Product.status'),
        // 'conditions' => array('Product.name LIKE' => '%BonRica%'),
        'limit' => 10,
        'order' => array(
            'Product.id' => 'asc'
        )
    );


    public function index() {
        // echo '<pre>'; print_r($this->request->data['product']); die;
        // echo '<pre>'; print_r($this->request); die;

        // For filter
        if (isset($this->request->data['Filter'])) {
            $this->paginate = array(
                // 'limit' => 5,
                'conditions' => array(
                    'Product.name LIKE' => "%".$this->request->data['Filter']['name']."%",
                    'Product.price LIKE' => "%".$this->request->data['Filter']['price']."%",
                    'Product.status' => $this->request->data['Filter']['status']
                ),
                'order' => array(
                    'Product.id' => 'asc'
                )
            );
        }

        $this->Paginator->settings = $this->paginate;

        // similar to findAll(), but fetches paged results
        $data = $this->Paginator->paginate('Product');
        $this->set('products', $data);

        // $this->set('products', $this->Product->find('all'));

        // $this->User->recursive = 0;
        // $this->set('users', $this->paginate());
    }



    public function view($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('products', $this->Product->findById($id));
    }



    public function add() {

        // pr($this->request->data); die;

        // if ($this->request->data['Product']['image']['error']!=0) {
        //     throw new NotFoundException(__('File upload error.'));
        // }

        if ($this->request->is('post')) {
            $this->Product->create();

            $filename = null;

            // Check if image is selected.
            if (empty($this->request->data['Product']['image']['tmp_name'])) 
            {
                $this->Flash->customError(
                    __('The Product could not be saved. Please, select an image try again.')
                );
                // $this->Flash->error(
                //     __('The Product could not be saved. Please, select an image try again.')
                // );
                return $this->redirect(array('action' => 'add'));
            }

            // If file is selected
            if (!empty($this->request->data['Product']['image']['tmp_name']) && is_uploaded_file($this->request->data['Product']['image']['tmp_name'])) 
            {
                // Strip path information
                $filename = basename($this->request->data['Product']['image']['name']);
                move_uploaded_file(
                    $this->request->data['Product']['image']['tmp_name'],
                    // path -> /var/www/html/cakephp/app/webroot/documents
                    WWW_ROOT .  'documents' . DS . $filename
                );
            }

            // Set the file-name only to save in the database
            $this->request->data['Product']['image'] = $filename;
            // pr($this->request->data); 

            if ($this->Product->save($this->request->data)) {
                $this->Flash->customSuccess(__('The product has been saved'));
                return $this->redirect(array('action' => 'add'));
                // return $this->redirect(array('action' => 'index'));
            }

            $this->Flash->customError(
                __('The Product could not be saved. Please, try again.')
            );
        }

    }




    public function edit($id = null) {
        // pr($this->request); die;
        
        // echo "<pre>"; print_r($this->request->data['Product']['image']); die();
        // echo "<pre>"; print_r($this->request); die();
        // echo "<pre>"; print_r($this->request->data['Product']['image']); print_r($_FILES);  die();
        
        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        // pr($product); die;

        if (!$product) {
            throw new NotFoundException(__('Invalid product'));
        }

        if ($this->request->is(array('product', 'put'))) {

            $this->Product->id = $id;

            $filename = $product['Product']['image'];

            // If file is selected
            if (!empty($this->request->data['Product']['image']['tmp_name']) && is_uploaded_file($this->request->data['Product']['image']['tmp_name'])) 
            {
                

                // Strip path information
                $filename = basename($this->request->data['Product']['image']['name']);
                move_uploaded_file(
                    $this->request->data['Product']['image']['tmp_name'],
                    // path -> /var/www/html/cakephp/app/webroot/documents
                    WWW_ROOT .  'documents' . DS . $filename
                );
            }

            // Set the file-name only to save in the database
            $this->request->data['Product']['image'] = $filename;

            if ($this->Product->save($this->request->data)) {
                $this->Flash->customSuccess(__('Your product has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->customError(__('Unable to update your product.'));
        }

        if (!$this->request->data) {
            $this->request->data = $product;
        }

    }



    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        // $this->request->allowMethod('post');
        $this->request->allowMethod('post','get');

        // echo "<pre>"; print_r($this->Product); die();

        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Product->delete()) {
            $this->Flash->success(__('Product deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Product was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }



    public function previewdetails()
    {
        // print_r($_POST); die;
        $id = $_POST['id'];

        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        // print_r($product); die;

        if (!$product) {
            throw new NotFoundException(__('Invalid product'));
        }

        $this->set('previewdetails', $this->Product->findById($id));
        $this->render('previewdetails');

        exit();
    }



    public function deleteall()
    {
        // echo '<pre>'; print_r($this->request->data['product']); die(' deleteall ');

        if ($this->request->data['product']==NULL) {
            // throw new NotFoundException(__('Please select a product to delete.'));
            $this->Flash->customError(__('Please select a product to delete.'));
            return $this->redirect(array('action' => 'index'));
        }


        $this->request->allowMethod('post','get');
        
        $data = $this->Product->find('all', array(
            'conditions' => array('Product.id' => $this->request->data['product'],'status'=>0)
        ));

        // echo count($data); die;

        if (count($data)<=1) {
            $this->Flash->customError(__('Please select 2 or more De-active products for bulk delete.'));
            return $this->redirect(array('action' => 'index'));
        }


        $condition = array('Product.id in' => $this->request->data['product'],'status'=>0);
        $dall=$this->Product->deleteAll($condition,false);  

        if ($dall) 
        {
            $this->Flash->customSuccess(__('Products deleted'));
            return $this->redirect(array('action' => 'index'));
        }

        $this->Flash->customError(__('Products were not deleted'));
        return $this->redirect(array('action' => 'index'));

    }



}