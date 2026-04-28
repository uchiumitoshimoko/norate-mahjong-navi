<?php
/**
 * CustomerFixture
 *
 */
class CustomerFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'customer';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'comment' => 'eccubeの顧客IDと同じ'),
		'customer_cd' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => '代理店管理システムから発行されたコード'),
		'login_help_flg' => array('type' => 'boolean', 'null' => true, 'default' => '1', 'comment' => '初回ヘルプを表示するかどうか'),
		'email_m' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'reminder_pc' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => '0:送信しない 1:送信する'),
		'reminder_m' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => '0:送信しない 1:送信する'),
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
			'customer_cd' => 1,
			'login_help_flg' => 1,
			'email_m' => 'Lorem ipsum dolor sit amet',
			'reminder_pc' => 1,
			'reminder_m' => 1,
			'created' => '2012-05-08 15:17:54',
			'modified' => '2012-05-08 15:17:54',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:17:54'
		),
	);
}
