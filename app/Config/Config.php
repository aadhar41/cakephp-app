<?php

/**
 *	Here we can define all are static variables and arrays and they are available throughout are project.
 *
 *  This code should be included at the top of your controller.
 *  Configure::load('Config', 'default');
 *
 * 	To access or use these variable -> Configure::read('App.SiteSendMailEmail');
 * 
 */

$config['App.SiteSendMailEmail'] = 'qwerty@gmail.com';
$config['App.Status.active'] = 1;

$config['App.Company.name']='Pizza, Inc.';
$config['App.Company.slogan']='Pizza for your body and soul';

$config['App.PostTypes']=array('Milestone'=>1,'HOTW'=>2,'HOTW_nominee'=>3,'Writter'=>4,'Blog'=>5,'Social'=>6);