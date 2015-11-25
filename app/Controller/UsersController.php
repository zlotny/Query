<?php

class UsersController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index()
    {

    }

    public function view($id)
    {
        $this->layout = 'view';
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('targetUser', $user);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            if ($this->request->data['User']['pass'] == $this->request->data['User']['pass2']) {
                if ($this->User->save($this->request->data)) {
                    $this->Flash->success("Usuario creado satisfactoriamente.");
                } else {
                    $this->Flash->success("Error al registrar usuario.");
                }
            } else {
                $this->Flash->error("Las contraseñas son distintas.");
            }
            $this->redirect(array('controller' => 'pages', 'action' => 'display'));
        }
    }
}

?>