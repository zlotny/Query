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
            $this->request->data['User']['userpass'] = md5($this->request->data['User']['userpass']);

            if($toLogin && $toLogin["User"]["pass"] == $this->request->data['User']['userpass']) {
                $this->Session->write('User.email', $this->request->data['User']['useremail']);
                $this->Session->write('User.id', $toLogin['User']['id']);
                $this->Session->write('User.username', $toLogin['User']['username']);
                $this->Session->write('User.profile_pic_route', $toLogin['User']['profile_pic_route']);
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
                //Encrypt password
                $this->request->data['User']['pass'] = md5($this->request->data['User']['pass']);
                /* Prepare image to be uploaded */
            //Check if image has been uploaded
                if (!empty($this->request->data['User']['file']['name'])) {
                    $file = $this->request->data['User']['file'];

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'gif','png');

                    if (in_array(strtolower($ext), $arr_ext)) {
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/user-icons/' . $file['name']);
                //prepare the filename for database entry
                        $this->request->data['User']['profile_pic_route'] = $file['name'];
                    }
                }            


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

    public function edit($id = null){
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }
        $user = $this->User->findById($id);

        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        /* Prepare image to be uploaded */
        //Check if image has been uploaded
        if (!empty($this->request->data['User']['file']['name'])) {
            $file = $this->request->data['User']['file'];

            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $arr_ext = array('jpg', 'jpeg', 'gif','png');

            if (in_array(strtolower($ext), $arr_ext)) {
                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/user-icons/' . $file['name']);
                //prepare the filename for database entry
                $this->request->data['User']['profile_pic_route'] = $file['name'];
            }
        }            

        $this->User->id = $id;
        if($this->request->data['User']['pass'] != ""){
            $this->request->data['User']['pass'] = md5($this->request->data['User']['pass']);
        } else {
            $this->request->data['User']['pass'] = $user["User"]["pass"];
        }

        if ($this->User->save($this->request->data)) {
            $this->Flash->success("Usuario actualizado satisfactoriamente.");
        } else {
            $this->Flash->error("Error al actualizar usuario.");
        }


        $this->redirect(array('controller' => 'users', 'action' => 'view', $id));
    }

    public function lang($lang){
        $this->Cookie->write('lang', $lang);
        $this->redirect($this->referer());
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