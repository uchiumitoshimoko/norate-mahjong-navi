<?php
App::uses('Earcleaning', 'Model');

/**
 * Earcleaning Test Case
 *
 */
class EarcleaningTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.earcleaning', 'app.customer', 'app.diaphragm', 'app.filaria_year', 'app.filaria', 'app.medical', 'app.medicine', 'app.memopad', 'app.nailclipper', 'app.nomi', 'app.photo', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing', 'app.vaccine', 'app.weight');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Earcleaning = ClassRegistry::init('Earcleaning');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Earcleaning);

		parent::tearDown();
	}

}
