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

class GeneralController extends AppController {


    public function index() {

        if ($this->request->is('post')) {
            // pr($this->request->data);
            // die();

            $this->General->create();
            // $this->request->data['General']['email'];

            if ($this->General->save($this->request->data)) {

                $Email = new CakeEmail();
                $Email->from(array($this->request->data['General']['email'] => $this->request->data['General']['fullname']))
                    ->to('aadhar.objects@gmail.com')
                    ->subject($this->request->data['General']['email'])
                    ->send($this->request->data['General']['message']);
                $Email->sender('aadhar.objects@gmail.com', $this->request->data['General']['fullname']);

                $this->Flash->success(__('Your email has been sent.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your post.'));

        }

        /*
        Array
        (
            [General] => Array
                (
                    [fullname] => Full Name
                    [email] => email@gmail.com
                    [subject] => Subject
                    [birth_dt] => Array
                        (
                            [month] => 11
                            [day] => 12
                            [year] => 1989
                        )

                    [message] => Message for email.
                )

        )
        */
       
    }


    public function sendmail() {
        

        
    }




}