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

class UsersController extends AppController {


    public function beforeFilter() {
	    parent::beforeFilter();
	    // Allow users to register and logout.
	    $this->Auth->allow('add', 'logout');
	}


    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }



    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }



    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->customSuccess(__('The user has been saved'));
                return $this->redirect(array('action' => 'add'));
                // return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->customError(
                __('The user could not be saved. Please, try again.')
            );
        }
    }



    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->customSuccess(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->customError(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }



    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->customSuccess(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->customError(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }




	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
                return $this->redirect(array('controller' => 'posts','action' => 'index'));
	            // return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this->Flash->customError(__('Invalid username or password, try again'));
	    }
	}



	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}




}