<?php
class QueriesController extends AppController {
	public $helpers = array('Html', 'Form');
    public $components = array('Flash');
	

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
	public function add()
	{
		if ($this->request->is('post')) {

			if ($this->Query->saveAssociated($this->request->data)) {
				$this->Flash->success("Query creada satisfactoriamente.");
			} else {
				$this->Flash->error("Error al crear query.");
			}
			
			$this->redirect(array('controller' => 'queries', 'action' => 'index'));
		}
	}
}
?>