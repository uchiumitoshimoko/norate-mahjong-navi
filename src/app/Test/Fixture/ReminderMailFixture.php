<?php
/**
 * ReminderMailFixture
 *
 */
class ReminderMailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'reminder_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'table_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'send_estim_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'send_flg' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => '0:未送信、1:送信済'),
		'send_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'deleted' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
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
			'reminder_id' => 1,
			'table_id' => 1,
			'send_estim_date' => '2012-05-08 15:27:56',
			'send_flg' => 1,
			'send_date' => '2012-05-08 15:27:56',
			'created' => '2012-05-08 15:27:56',
			'modified' => '2012-05-08 15:27:56',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:27:56'
		),
	);
}
