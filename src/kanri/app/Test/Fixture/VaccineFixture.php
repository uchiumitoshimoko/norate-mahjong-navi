<?php
/**
 * VaccineFixture
 *
 */
class VaccineFixture extends CakeTestFixture {

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
		'next_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'vaccine_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'lot_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'ｈospital' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'doctor' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'notice_flg' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => '0:オフ、1:オン'),
		'reminder_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'vaccine_type' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'comment' => '1:単独ワクチン、2:混合ワクチン'),
		'vaccine_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 't_vaccine_idsのid'),
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
			'exec_date' => '2012-05-08',
			'next_date' => '2012-05-08',
			'vaccine_name' => 'Lorem ipsum dolor sit amet',
			'lot_no' => 'Lorem ipsum dolor sit amet',
			'ｈospital' => 'Lorem ipsum dolor sit amet',
			'doctor' => 'Lorem ipsum dolor sit amet',
			'notice_flg' => 1,
			'reminder_date' => '2012-05-08',
			'vaccine_type' => 1,
			'vaccine_id' => 1,
			'memopad_id' => 1,
			'photo' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-05-08 15:29:51',
			'modified' => '2012-05-08 15:29:51',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:29:51'
		),
	);
}
