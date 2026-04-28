<?php
App::uses('Nailclipper', 'Model');

/**
 * Nailclipper Test Case
 *
 */
class NailclipperTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.nailclipper', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria_year', 'app.filaria', 'app.exec_year', 'app.memopad', 'app.memo_type', 'app.medicine', 'app.nomi', 'app.vaccine', 'app.weight', 'app.medical', 'app.memopads', 'app.blood', 'app.image', 'app.medical_examination', 'app.photo', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nailclipper = ClassRegistry::init('Nailclipper');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nailclipper);

		parent::tearDown();
	}

}
