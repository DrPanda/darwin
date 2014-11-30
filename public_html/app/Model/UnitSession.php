<?php
App::uses('AppModel', 'Model');
/**
 * Session Model
 *
 * @property Student $Student
 */
class UnitSession extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	public $validate = array(
		'name' => array(
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Duplicate name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'session_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
