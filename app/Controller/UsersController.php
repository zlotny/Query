<?php

class UsersController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash', 'Session');

    public function index()
    {

    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('targetUser', $user);
    }

    public function login(){
        if ($this->request->is('post')) {
            $toLogin = $this->User->findByEmail($this->request->data['User']['useremail']);
            if($toLogin && $toLogin["User"]["pass"] == $this->request->data['User']['userpass']) {
              $this->Session->write('User.email', $this->request->data['User']['useremail']);
              $this->Session->write('User.id', $toLogin['User']['id']);
              $this->Session->write('User.username', $toLogin['User']['username']);
          } else {
            $this->Flash->error("El usuario no existe");
        }
        $this->redirect(array('controller' => 'queries', 'action' => 'index'));
    }
}

public function logout(){
    $this->Session->destroy();
    $this->redirect(array('controller' => 'queries', 'action' => 'index'));

}

public function add()
{
    if ($this->request->is('post')) {
        if ($this->request->data['User']['pass'] == $this->request->data['User']['pass2']) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success("Usuario creado satisfactoriamente.");
            } else {
                $this->Flash->error("Error al registrar usuario.");
            }
        } else {
            $this->Flash->error("Las contraseñas son distintas.");
        }
        $this->redirect(array('controller' => 'queries', 'action' => 'index'));
    }
}

public function lang($lang){
    $this->Cookie->write('lang', $lang);
    $this->redirect(array('controller' => 'queries', 'action' => 'index'));

}



public function voted($id_user, $id_query){
    $query = "SELECT id, vote FROM queries_users WHERE user_id='".$id_user."' AND query_id = '$id_query';"; 

    $result = $this->User->query($query);

    return $result;

}

public function votedComment($id_user, $id_comment){
    $query = "SELECT id, vote FROM comments_users WHERE user_id='$id_user' AND comment_id = '$id_comment';"; 

    $result = $this->User->query($query);

    return $result;

}



}


?>