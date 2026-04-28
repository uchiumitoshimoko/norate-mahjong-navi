<?php
App::uses('AppModel', 'Model');
/**
 * Loginuser Model
 */
class Loginuser extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'm_login_users';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	/*
		'customer_cd' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	*/
/*
		'deleted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
        var $hasMany = array(
                'LoginuserAuth' => array(
			'className'=>'LoginUserAuthorities',
                        'foreignKey'=>'user_id',
                    //    'conditions' => array('LoginuserAuth.user_id = Loginuser.id'),
                ),
        );

 /*
	public $hasMany = array(
		'Diaphragm' => array(
			'className' => 'Diaphragm',
			'foreignKey' => 'customer_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
*/
	function index(){
		$result = $this->find('all',$hasMany);
	}
}
