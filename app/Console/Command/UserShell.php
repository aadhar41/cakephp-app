<?php

	/**
	 *	custom shell 
	 *	Author : Aadhar gaur
	 *	Last Update : 13-Nov-2018
	 * 	Reference : book.cakephp.org/2.0/en/console-and-shells.html#adding-cake-to-your-path
	 * 
	 */
	class UserShell extends AppShell {

		// Using a model in command
	    public $uses = array('User');

	    /**
	     *  App : app
		 *	Path: /var/www/html/cakephp/app/
	     *
	     *  command :
	     * 		Console/cake user show aadhar
	     * 		
	     * [The above shell, will fetch a user by username and display the information stored in the database.]
	     * @return [array] [Return an array of containing all the User information in the users table.]
	     *
	     */
	    public function show() {

	        $user = $this->User->findByUsername($this->args[0]);
	        $this->out(print_r($user, true));
	    }


		public $tasks = array('Template');



	}


?>