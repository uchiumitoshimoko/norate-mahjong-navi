<?php
/**
 * VaccineIdFixture
 *
 */
class VaccineIdFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'ptype' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => '1:犬、2:猫'),
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
			'name' => 1,
			'ptype' => 1,
			'created' => '2012-05-08 15:29:26',
			'modified' => '2012-05-08 15:29:26',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:29:26'
		),
	);
}
