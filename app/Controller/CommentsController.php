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

	public function voteComment($tipo, $id_comment, $userId, $id_query)
	{
		//GUARDAR RESULTADO DE VOTACION DE UNHA QUERY: $sql = "SELECT sum(vote) from queries_users where query_id = LOQUEZEA ";
		if($tipo!="up" && $tipo !="down"){
			$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		}
		$voto = ($tipo=='up') ? 1 : -1 ;
		//$userId = $this->Session->read('User.id');
		$query = "Insert into comments_users (vote, user_id, comment_id) values ($voto, $userId , $id_comment)";


		$this->Comment->query($query);
		$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		
	}

	public function updateVoteComment($tipo, $id_comment, $id_voto, $userId, $id_query)
	{
		//GUARDAR RESULTADO DE VOTACION DE UNHA QUERY: $sql = "SELECT sum(vote) from queries_users where query_id = LOQUEZEA ";
		if($tipo!="up" && $tipo !="down"){
			$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		}
		$voto = ($tipo=='up') ? 1 : -1 ;
		//$userId = $this->Session->read('User.id');
		$query = "UPDATE comments_users SET vote = $voto WHERE id = $id_voto AND user_id = $userId AND comment_id = $id_comment";


		$this->Comment->query($query);
		$this->redirect(array('controller' => 'queries', 'action' => 'view', $id_query));
		
	}

}
?>