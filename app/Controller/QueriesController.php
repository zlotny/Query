<?php
class QueriesController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Flash', 'Paginator');

	public $paginate = array(
		'limit' => 10,
		'order' => array(
			'Query.created' => 'desc'
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
		$allQuerys = $this->Query->find('all');
		$this->set('allQuerys', $this->Query->find('all'));
		$numAllQuerys = sizeof($allQuerys);

		foreach ($queries as $key => $row) {
			$sql = "Select count(vote) as positiveVote from queries_users where query_id = ".$row["Query"]["id"]." and vote = 1";
			$sql2 = "Select count(vote) as negativeVote from queries_users where query_id = ".$row["Query"]["id"]." and vote = -1";		
			$positive = $this->Query->query($sql)[0][0]["positiveVote"];
			$negative = $this->Query->query($sql2)[0][0]["negativeVote"];
			
			if(($positive+$negative) == 0){
				$percentagePositive=50;
				$percentageNegative=50;
			}
			else{
				$percentagePositive = $positive*(100/($positive + $negative)); 
				$percentageNegative = $negative*(100/($positive + $negative));
				
			}
			$votesQuery[$row["Query"]["id"]] = array(array('positiveVote' => $positive) , 
				array('negativeVote' => $negative ),
				array('percentagePositive' => $percentagePositive),
				array('percentageNegative' => $percentageNegative)
				);

		}
		if(!empty($queries)){
			$this->set("votesQuery", $votesQuery);
		}
		$sql = "SELECT query_id FROM queries_users GROUP BY query_id";
		$votedQueries = $this->Query->query($sql);
		$numVotedQueries = sizeof($votedQueries);
		$this->set('queriesNoVotes', $numAllQuerys-$numVotedQueries);

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
		
		$sql = "SELECT comments.id, sum(comments_users.vote) as votes FROM comments, comments_users WHERE comments.query_id = ".$query[0]["Query"]["id"]."  AND comments.id = comments_users.comment_id GROUP BY comment_id";
		$commentsWithVotes=$this->Query->query($sql);
		$sql = "SELECT id FROM comments WHERE query_id = ".$query[0]["Query"]["id"];
		$allCommentsQuery = $this->Query->query($sql);
		foreach ($allCommentsQuery as $key => $row) {
			$exist=false;
			foreach ($commentsWithVotes as $key => $value) {
				if($row['comments']['id'] == $value['comments']['id']){
					$exist=true;
					break;
				}

			}
			
			if(!$exist){
				
				$count = count($commentsWithVotes);
				$commentsWithVotes[$count]['comments']['id']= $row['comments']['id'];
				$commentsWithVotes[$count][0]['votes']= 0;
			}
			
		}
		$sortedComments = Set::sort($commentsWithVotes, '{n}.0.votes','desc');

		$this->set('sortedComments', $sortedComments);

		/*$commentsWithVotes[3]['comments']['id']=1;
		$commentsWithVotes[3][0]['sum(comments_users.vote)']= 0;
		print_r($commentsWithVotes);die();*/

		
		/*foreach ($query[0]['Comment'] as $key => $value) {
			$sql = "SELECT sum(vote) as votes FROM comments_users where comment_id = ".$value['id'];
			if(empty($this->Query->query($sql)[0][0]['votes']))
				$aOrdenar[$value['id']]= 0;
			else
				$aOrdenar[$value['id']]= $this->Query->query($sql)[0][0]['votes'];
		}
		print_r(Set::sort($aOrdenar, '{n}', 'desc'));*/

		$sql = "SELECT sum(vote) from queries_users where query_id = $id";
		$numVotos = $this->Query->query($sql);


		$this->set('numVotos', $numVotos[0][0]["sum(vote)"]);

	}


	public function search(){
		
		$datos = $this->request->query['searchInput'];	


		$this->Paginator->settings = array(
			'limit' => 10,
			'order' => array(
				'Query.created' => 'desc'),
			'conditions'=>array( 'OR' => array(
				array('Query.content LIKE'=>'%'.$datos.'%'),
				array('Query.title LIKE'=>'%'.$datos.'%'),)
			));
		$data = $this->Paginator->paginate('Query');

		foreach ($data as $key => $row) {
			$sql = "Select count(vote) as positiveVote from queries_users where query_id = ".$row["Query"]["id"]." and vote = 1";
			$sql2 = "Select count(vote) as negativeVote from queries_users where query_id = ".$row["Query"]["id"]." and vote = -1";		
			$positive = $this->Query->query($sql)[0][0]["positiveVote"];
			$negative = $this->Query->query($sql2)[0][0]["negativeVote"];
			
			if(($positive+$negative) == 0){
				$percentagePositive=50;
				$percentageNegative=50;
			}
			else{
				$percentagePositive = $positive*(100/($positive + $negative)); 
				$percentageNegative = $negative*(100/($positive + $negative));
				
			}
			$votesQuery[$row["Query"]["id"]] = array(array('positiveVote' => $positive) , 
				array('negativeVote' => $negative ),
				array('percentagePositive' => $percentagePositive),
				array('percentageNegative' => $percentageNegative)
				);

		}
		$this->set("votesQuery", $votesQuery);

		$this->set('querys', $data);
		$allQuerys = $this->Query->find('all');
		$this->set('allQuerys', $this->Query->find('all'));
		$numAllQuerys = sizeof($allQuerys);
		


		$sql = "SELECT query_id FROM queries_users GROUP BY query_id";
		$votedQueries = $this->Query->query($sql);
		$numVotedQueries = sizeof($votedQueries);
		$this->set('queriesNoVotes', $numAllQuerys-$numVotedQueries);

	}


	public function add()
	{
		if ($this->request->is('post')) {

			if ($this->Query->saveAssociated($this->request->data)) {
				$this->Session->setFlash("Query creada satisfactoriamente.", "alertiflashSuccess");

			} else {
				$this->Session->setFlash("Error al crear query.", "alertiflashError");
			}
			
			$this->redirect(array('controller' => 'queries', 'action' => 'index'));
		}

	}

	public function vote($tipo, $id_query, $userId)
	{
		//GUARDAR RESULTADO DE VOTACION DE UNHA QUERY: $sql = "SELECT sum(vote) from queries_users where query_id = LOQUEZEA ";
		if($tipo!="up" && $tipo !="down"){
			$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		}
		$voto = ($tipo=='up') ? 1 : -1 ;
		//$userId = $this->Session->read('User.id');
		$query = "Insert into queries_users (vote, user_id, query_id) values ($voto, $userId,$id_query)";

		$this->Query->query($query);
		$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		
	}

	public function updateVote($tipo, $id_query, $id_voto, $userId)
	{
		//GUARDAR RESULTADO DE VOTACION DE UNHA QUERY: $sql = "SELECT sum(vote) from queries_users where query_id = LOQUEZEA ";
		if($tipo!="up" && $tipo !="down"){
			$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		}
		$voto = ($tipo=='up') ? 1 : -1 ;
		//$userId = $this->Session->read('User.id');
		$query = "UPDATE queries_users SET vote = $voto WHERE id = $id_voto AND user_id = $userId AND query_id = $id_query";
		echo $query;

		$this->Query->query($query);
		$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		
	}



}
?>