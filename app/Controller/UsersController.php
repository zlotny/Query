<?php

class UsersController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index()
    {

    }

    public function add()
    {
        if ($this->request->is('post')) {
            if($this->User->save($this->request->data)){    //Guarda datos de form y actualiza bbdd
                $this->Flash->success("Your post has been saved.");
            }
            $this->redirect(array('controller' => 'pages', 'action' => 'display'));

        }
    }
}

?>