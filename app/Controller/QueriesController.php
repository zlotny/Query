<?php
class QueriesController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set("querys", $this->Query->find("all"));
	}

	public function view($id = null) {
		if (!$id) {
            throw new NotFoundException(__('Invalid query'));
        }

        $query = $this->Query->findById($id);
        if (!$query) {
            throw new NotFoundException(__('Invalid query'));
        }
        $this->set('targetQuery', $query);
	}
}
?>