<?php

class SeaShell extends AppShell {
    // public $tasks = array('Sound'); // found in Console/Command/Task/SoundTask.php
    

    public function main() {
    	$Sound = $this->Tasks->load('Sound');
        $Sound->execute();

        echo "\n";
        
        // would appear at all levels.
		$this->out('Quiet message', 1, Shell::QUIET);

		// would not appear when quiet output is toggled
		$this->out('normal message', 1, Shell::NORMAL);
		$this->out('loud message', 1, Shell::VERBOSE);

		// would only appear when verbose output is enabled.
		$this->out('extra message', 1, Shell::VERBOSE);
        
        echo "\n";

        $this->stdout->styles('flashy', array('text' => 'magenta', 'blink' => true));

        $this->out('<flashy>Whoooa Something </flashy> went wrong');


        ###### table helper ######
		$data = array(
		    array('Name', 'Age', 'Place'),
		    array('Peter', '19', 'New York City'),
		    array('Ricky Ponting', '40', 'Sydney'),
		);
		
		$this->helper('table')->output($data);


		###### Progress Helper - 1 ###### 
		// $this->helper('progress')->output(array(
		//     'total' => 10,
		//     'width' => 20,
		//     'callback' => function ($progress) {
		//         $progress->increment(2);
		//     }
		// ));


		###### Progress Helper - 2 ###### 
		$progress = $this->helper('Progress');
		$progress->init(array(
		    'total' => 10,
		    'width' => 30,
		));

		$progress->increment(2);
		$progress->draw();


		die;

        // Takes user input
        $selection = $this->in('Red or Green?', array('R', 'G'), 'R');
        echo "\n";
        echo $selection;

        echo "\n";
        $this->out(
		    '<warning>This will remove data from the filesystems.</warning>'
		);

        echo "\n";

        $this->overwrite('overwrite message ');

    }
}