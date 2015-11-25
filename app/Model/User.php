<?php

class User extends AppModel
{
    public $name = 'User';
    public $hasMany = array('Comment', 'Query');

    public $hasAndBelongsToMany = array(
        'VotesQuery' =>
            array(
                'className' => 'Query',
                'joinTable' => 'queries_users',
                'foreignKey' => 'user_id',
                'associationForeignKey' => 'query_id',
                'unique' => true
            ),
        'VotesComment' =>
            array(
                'className' => 'Comment',
                'joinTable' => 'comments_users',
                'foreignKey' => 'user_id',
                'associationForeignKey' => 'comment_id',
                'unique' => true
            ),
    );

    public $validate = array(
        'username' => array(
            'between' => array(
                'rule' => array('between', 5, 50),
                'on' => 'create',
                'message' => 'El nombre de usuario debe estar entre 5 y 50 caracteres.',
            ),
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'on' => 'create',
                'message' => 'El nombre de usuario debe contener solamente caracteres alfanuméricos.'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'on' => 'create',
                'message' => 'El nombre de usuario ya existe, elija otro.'
            )
        ),
        'email' => array(
            'rule' => 'notBlank',
            'rule' => array('email', true),
            'required' => true,
            'message' => 'Inserte un email valido.'
        ),
        'pass' => array(
            'minLength' => array(
                'rule' => array('minLength', 6),
                'message' => 'La longitud de la contraseña debe ser mayor que 6.'
            ),
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'La contraseña no puede estar vacía.'
            )
        ),
        'pass2' => array(
            'minLength' => array(
                'rule' => array('minLength', 6),
                'message' => 'La longitud de la contraseña debe ser mayor que 6.'
            ),
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'La contraseña no puede estar vacía.'
            )
        )
    );


}

?>