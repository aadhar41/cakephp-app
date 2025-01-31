<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


class General extends AppModel {

    public $validate = array(
        'fullname' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A Fullname is required'
            )
        ), 
        'subject' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A Subject is required'
            )
        ),
        'message' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A Message is required'
            )
        ),
        'email' => 'email',
        'birth_dt' => array(
            'rule' => 'date',
            'message' => 'Enter a valid date',
            'allowEmpty' => true
        ),
    );


    // ...

    /* 
   public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
    */

    // ...


}