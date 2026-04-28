<?php
/**
 * MedicalExaminationFixture
 *
 */
class MedicalExaminationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'medical_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 't_medicasのID'),
		'status_1' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_2' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:N、2:A'),
		'status_3' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:N、2:A'),
		'status_4' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:N、2:A'),
		'status_5' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '１～５'),
		'status_6' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_7' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_8' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_9' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_10' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_11' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_12' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_13' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_14' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_15' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_16' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_17' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_18' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_19' => array('type' => 'integer', 'null' => true, 'default' => '1', 'comment' => '1:正常、2:異常'),
		'status_1_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_2_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_3_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_4_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_5_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_6_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_7_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_8_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_9_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_10_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_11_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_12_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_13_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_14_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_15_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_16_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_17_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_18_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status_19_memo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'medical_id' => 1,
			'status_1' => 1,
			'status_2' => 1,
			'status_3' => 1,
			'status_4' => 1,
			'status_5' => 1,
			'status_6' => 1,
			'status_7' => 1,
			'status_8' => 1,
			'status_9' => 1,
			'status_10' => 1,
			'status_11' => 1,
			'status_12' => 1,
			'status_13' => 1,
			'status_14' => 1,
			'status_15' => 1,
			'status_16' => 1,
			'status_17' => 1,
			'status_18' => 1,
			'status_19' => 1,
			'status_1_memo' => 'Lorem ipsum dolor sit amet',
			'status_2_memo' => 'Lorem ipsum dolor sit amet',
			'status_3_memo' => 'Lorem ipsum dolor sit amet',
			'status_4_memo' => 'Lorem ipsum dolor sit amet',
			'status_5_memo' => 'Lorem ipsum dolor sit amet',
			'status_6_memo' => 'Lorem ipsum dolor sit amet',
			'status_7_memo' => 'Lorem ipsum dolor sit amet',
			'status_8_memo' => 'Lorem ipsum dolor sit amet',
			'status_9_memo' => 'Lorem ipsum dolor sit amet',
			'status_10_memo' => 'Lorem ipsum dolor sit amet',
			'status_11_memo' => 'Lorem ipsum dolor sit amet',
			'status_12_memo' => 'Lorem ipsum dolor sit amet',
			'status_13_memo' => 'Lorem ipsum dolor sit amet',
			'status_14_memo' => 'Lorem ipsum dolor sit amet',
			'status_15_memo' => 'Lorem ipsum dolor sit amet',
			'status_16_memo' => 'Lorem ipsum dolor sit amet',
			'status_17_memo' => 'Lorem ipsum dolor sit amet',
			'status_18_memo' => 'Lorem ipsum dolor sit amet',
			'status_19_memo' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-05-08 15:22:22',
			'modified' => '2012-05-08 15:22:22',
			'deleted' => 1,
			'deleted_date' => '2012-05-08 15:22:22'
		),
	);
}
