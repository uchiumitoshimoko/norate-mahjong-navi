<?php
App::uses('Diaphragm', 'Model');

/**
 * Diaphragm Test Case
 *
 */
class DiaphragmTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.diaphragm', 'app.customer', 'app.earcleaning', 'app.filaria_year', 'app.filaria', 'app.medical', 'app.medicine', 'app.memopad', 'app.nailclipper', 'app.nomi', 'app.photo', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing', 'app.vaccine', 'app.weight');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Diaphragm = ClassRegistry::init('Diaphragm');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Diaphragm);

		parent::tearDown();
	}

}
