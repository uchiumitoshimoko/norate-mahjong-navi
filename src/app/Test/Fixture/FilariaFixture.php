<?php
/**
 * FilariaFixture
 *
 */
class FilariaFixture extends CakeTestFixture {

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
		'exec_year_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => 't_ｆilaria_yearsのid'),
		'next_alert_period' => array('type' => 'integer', 'null' => true, 'default' => '0', 'comment' => '0:しない、1:1か月後、2:１年後'),
		'next_alert_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'exec_date2' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'next_alert_period2' => array('type' => 'integer', 'null' => true, 'default' => '0'),
		'next_alert_date2' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'weight' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '6,2'),
		'hospital' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'medicine' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'medicine_type' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => '1:内服タイプ、2:外用タイプ、3:注射'),
		'jou_count' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'memopad_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'comment' => 't_memopadsのID'),
		'photo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'exec_year_id' => 1,
			'next_alert_period' => 1,
			'next_alert_date' => '2012-05-08',
			'exec_date2' => '2012-05-08',
			'next_alert_period2' => 1,
			'next_alert_date2' => '2012-05-08',
			'weight' => 1,
			'hospital' => 'Lorem ipsum dolor sit amet',
			'medicine' => 'Lorem ipsum dolor sit amet',
			'medicine_type' => 1,
			'jou_count' => 'Lorem ipsum dolor sit amet',
			'memopad_id' => 1,
			'photo' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-05-08 15:20:03',
			'modified' => '2012-05-08 15:20:03',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:20:03'
		),
	);
}
