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

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */

class Products extends AppModel {

	public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'price' => array(
            'rule' => array('money', 'left','notBlank'),
            'message' => 'Please supply a valid monetary amount.'
        ),
        'quantity' => array(
            'rule' => array('naturalNumber','notBlank'),
            'message' => 'Please supply a valid quantity number.'
        ),

        // 'image' => array(
        //     'rule' => array(
        //         'extension',
        //         array('gif', 'jpeg', 'png', 'jpg')
        //     ),
        //     'message' => 'Please supply a valid image.'
        // )
        // 'image' => array(
        //     'rule' => array('fileSize', '<=', '5MB'),
        //     'message' => 'Image must be less than 5MB'
        // ),
        // 'image' => array(
        //     'rule' => array('fileSize', '>=', '0MB'),
        //     'on' => 'create',
        //     'message' => 'Please select a image to upload.'
        // ),
        'image' => array(
            'rule' => array('uploadFile'),
            'message' => 'Image upload error.'
        ),

    );


	public function isOwnedBy($post, $user) {
	    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}


    public function isUploadedFile($params) {
        // pr($params); die;
        $val = array_shift($params);

        if ((isset($val['error']) && $val['error'] == 0) ||
            (!empty( $val['tmp_name']) && $val['tmp_name'] != 'none')
        ) {
            return is_uploaded_file($val['tmp_name']);
        }
        return false;
    }


    public function uploadFile( $check ) {

        $uploadData = array_shift($check);

        if ( $uploadData['size'] == 0 || $uploadData['error'] !== 0) {
            return false;
        }

        // $uploadFolder = 'files'. DS .'your_directory';
        $uploadFolder = WWW_ROOT .  'documents' . DS;
        
        $fileName = basename($uploadData['size']['name']);

        $uploadPath =  $uploadFolder . DS . $fileName;

        if( !file_exists($uploadFolder) ){
            mkdir($uploadFolder);
        }

        if (move_uploaded_file($uploadData['tmp_name'], $uploadPath)) {
            $this->set('image', $fileName);
            return true;
        }

        return false;
    }


    public function limitDuplicates($check, $limit) {
        // $check will have value: array('promotion_code' => 'some-value')
        // $limit will have value: 25
        


    }






}
