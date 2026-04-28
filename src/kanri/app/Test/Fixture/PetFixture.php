<?php
/**
 * PetFixture
 *
 */
class PetFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'comment' => 'eccubeの顧客IDと同じ'),
		'customer_cd' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => '代理店管理システムから発行されたコード'),
		'pcd' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'カルテ管理のペットコードと同じ'),
		'mix_left' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'mix_right' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'birthday_estim' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'kazoku_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'kijureki' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'pet_photo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'pcd' => 1,
			'mix_left' => 'Lorem ipsum dolor sit amet',
			'mix_right' => 'Lorem ipsum dolor sit amet',
			'birthday_estim' => '2012-05-08',
			'kazoku_date' => '2012-05-08',
			'kijureki' => 'Lorem ipsum dolor sit amet',
			'pet_photo' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-05-08 15:25:32',
			'modified' => '2012-05-08 15:25:32',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:25:32'
		),
	);
}
