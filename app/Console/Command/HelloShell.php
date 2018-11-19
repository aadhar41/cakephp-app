<?php

	/**
	 *	Reference :
	 *		book.cakephp.org/2.0/en/console-and-shells.html#adding-cake-to-your-path
	 * 
	 * 	Command :
	 * 		Console/cake hello
	 * 		Console/cake hello hey_there Aadhar
	 *
	 *  Structure :
	 *  	Console/cake shell_name function name arguments
	 * 		
	 *	custom shell 
	 *	Author : Aadhar gaur
	 *	Last Update : 13-Nov-2018
	 * 	Reference : book.cakephp.org/2.0/en/console-and-shells.html#adding-cake-to-your-path
	 * 
	 */
	class HelloShell extends AppShell {

		/**
		 * [main  the main() method in shells is a special method called whenever there are no other commands or arguments given to a shell.]
		 * @return [type] [description]
		 */
	    public function main() {
	        $this->out('Hello world.');
	    }


	    public function hey_there() {
	        $this->out('Hey there ' . $this->args[0]);
	    }




	}


?>