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
		if(isset($this->request->query["user_id"])){
			$queries = $this->Paginator->paginate('Query', array('Query.user_id LIKE' => $this->request->query["user_id"]));
		}else{
			$queries = $this->Paginator->paginate('Query');
		}

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

	public function vote($tipo, $id_query)
	{
		//GUARDAR RESULTADO DE VOTACION DE UNHA QUERY: $sql = "SELECT sum(vote) from queries_users where query_id = LOQUEZEA ";
		if($tipo!="up" && $tipo !="down"){
			$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		}
		$voto = ($tipo=='up') ? 1 : -1 ;
		$userId = $this->Session->read('User.id');
		$query = "Insert into queries_users (vote, user_id, query_id) values ($voto, $userId ,$id_query)";


		$this->Query->query($query);
		$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));

		$sql = "SELECT sum(vote) from queries_users where query_id = $id_query";
		$numVotos = $this->Query->query($sql);

		$this->set('numVotos', $numVotos);

		
	}

	public function updateVote($tipo, $id_query, $id_voto)
	{
		//GUARDAR RESULTADO DE VOTACION DE UNHA QUERY: $sql = "SELECT sum(vote) from queries_users where query_id = LOQUEZEA ";
		if($tipo!="up" && $tipo !="down"){
			$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		}
		$voto = ($tipo=='up') ? 1 : -1 ;
		$userId = $this->Session->read('User.id');
		$query = "UPDATE queries_users SET vote = $voto WHERE id = $id_voto AND user_id = $userId AND query_id = $id_query";
		echo $query;

		$this->Query->query($query);
		$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));

		$sql = "SELECT sum(vote) from queries_users where query_id = $id_query";
		$numVotos = $this->Query->query($sql);
		
		$this->set('numVotos', $numVotos);

		
	}


}
?>