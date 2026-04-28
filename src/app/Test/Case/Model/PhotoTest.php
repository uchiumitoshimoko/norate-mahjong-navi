<?php
App::uses('Photo', 'Model');

/**
 * Photo Test Case
 *
 */
class PhotoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.photo', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria_year', 'app.filaria', 'app.exec_year', 'app.memopad', 'app.memo_type', 'app.medicine', 'app.nomi', 'app.vaccine', 'app.weight', 'app.medical', 'app.memopads', 'app.blood', 'app.image', 'app.medical_examination', 'app.nailclipper', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Photo = ClassRegistry::init('Photo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Photo);

		parent::tearDown();
	}

}
