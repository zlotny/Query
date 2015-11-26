<?php
class QueriesController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Flash', 'Paginator');

	public $paginate = array(
		'limit' => 10,
		'order' => array(
			'Queries.created' => 'desc'
			)
		);
	

	public function index() {
		$this->Paginator->settings = $this->paginate;
		$queries = $this->Paginator->paginate('Query');
		$this->set('querys', $queries);
		$this->set('allQuerys', $this->Query->find('all'));
	}

	public function view($id = null) {
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


	public function search(){
		
		$datos = $this->request->query['searchInput'];	


        $this->Paginator->settings = array(
        	'limit' => 10,
        	'order' => array(
            	'Queries.created' => 'desc'),
        	'conditions'=>array( 'OR' => array(
            	array('Query.content LIKE'=>'%'.$datos.'%'),
            	array('Query.title LIKE'=>'%'.$datos.'%'),)
        	));
		$data = $this->Paginator->paginate('Query');

    	$this->set('querys', $data);
    	$this->set('allQuerys', $this->Query->find('all'));
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