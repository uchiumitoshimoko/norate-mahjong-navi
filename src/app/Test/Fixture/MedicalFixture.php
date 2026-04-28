<?php
/**
 * MedicalFixture
 *
 */
class MedicalFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 't_customerの顧客ID'),
		'customer_cd' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => '代理店管理システムから発行されたコード'),
		'pcd' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'カルテ管理のペットコードと同じ'),
		'exec_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'next_exec_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'notice_period' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 1, 'comment' => '1:１か月、2:１週間、3:１日'),
		'reminder_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'hospital' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'doctor' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'memopads_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => 't_memopadsのID'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'deleted' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'deleted_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'customer_id' => 1,
			'customer_cd' => 1,
			'pcd' => 1,
			'exec_date' => '2012-05-08',
			'next_exec_date' => '2012-05-08',
			'notice_period' => 1,
			'reminder_date' => '2012-05-08',
			'hospital' => 'Lorem ipsum dolor sit amet',
			'doctor' => 'Lorem ipsum dolor sit amet',
			'memopads_id' => 1,
			'created' => '2012-05-08 15:23:03',
			'modified' => '2012-05-08 15:23:03',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:23:03'
		),
	);
}
