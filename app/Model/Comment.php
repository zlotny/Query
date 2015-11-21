<?php

class Comment extends AppModel{
	public $belongsTo = array('Query', 'User');
	
}

?>