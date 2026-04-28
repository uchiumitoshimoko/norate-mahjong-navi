<?php
App::uses('Memopad', 'Model');

/**
 * Memopad Test Case
 *
 */
class MemopadTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.memopad', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria_year', 'app.filaria', 'app.exec_year', 'app.medical', 'app.memopads', 'app.blood', 'app.image', 'app.medical_examination', 'app.medicine', 'app.nailclipper', 'app.nomi', 'app.photo', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing', 'app.vaccine', 'app.weight', 'app.memo_type');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Memopad = ClassRegistry::init('Memopad');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Memopad);

		parent::tearDown();
	}

}
