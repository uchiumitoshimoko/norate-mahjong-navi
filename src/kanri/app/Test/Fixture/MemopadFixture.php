<?php
/**
 * MemopadFixture
 *
 */
class MemopadFixture extends CakeTestFixture {

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
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'memo_type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 't_bunruisのID'),
		'estim_flg' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => '0:オフ、1:オン'),
		'estim_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'notice_flg' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => '0:オフ、1:オン'),
		'reminder_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'memo' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'title' => 'Lorem ipsum dolor sit amet',
			'memo_type_id' => 1,
			'estim_flg' => 1,
			'estim_date' => '2012-05-08 15:24:33',
			'notice_flg' => 1,
			'reminder_date' => '2012-05-08',
			'memo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'photo' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-05-08 15:24:33',
			'modified' => '2012-05-08 15:24:33',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:24:33'
		),
	);
}
