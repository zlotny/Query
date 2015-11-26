<?php
class CommentsController extends AppController {
	public $components = array('Flash');

	public function index() {

	}

	public function add()
	{
		if ($this->request->is('post')) {

			if ($this->Comment->saveAssociated($this->request->data)) {
				$this->Flash->success("comentario creado satisfactoriamente.");
			} else {
				$this->Flash->error("Error al crear comentario.");
			}
			
			$this->redirect(array('controller' => 'queries', 'action' => 'view', $this->request->data['Comment']['query_id']));
		}

	}
}
?>