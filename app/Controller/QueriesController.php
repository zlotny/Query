<?php
class QueriesController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set("querys", $this->Query->find("all"));
	}

	public function view($id = null) {
		$this->layout = 'view';
		if (!$id) {
			throw new NotFoundException(__('Invalid query'));
		}
		$query = $this->Query->find('all', array('conditions'=>array('id'=>$id), 'recursive'=>2));
		$userQuery = $this->Query->query("Select * from users where id = '".$query[0]["Query"]["user_id"]."'");

		if (!$query) {
			throw new NotFoundException(__('Invalid query'));
		}
		$this->set('targetQuery', $query[0]);
		$this->set('author', $userQuery[0]["users"]);
	}
}
?>