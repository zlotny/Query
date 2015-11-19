<?php

class User extends AppModel{
	public $hasMany = 'Query';
	public $hasMany = 'Comment';
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
}

?>