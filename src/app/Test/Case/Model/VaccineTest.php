<?php
App::uses('Vaccine', 'Model');

/**
 * Vaccine Test Case
 *
 */
class VaccineTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.vaccine', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria_year', 'app.filaria', 'app.exec_year', 'app.memopad', 'app.memo_type', 'app.medicine', 'app.nomi', 'app.weight', 'app.medical', 'app.memopads', 'app.blood', 'app.image', 'app.medical_examination', 'app.nailclipper', 'app.photo', 'app.reminder_mail', 'app.reminder', 'app.table', 'app.shampoo', 'app.toothbrushing');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vaccine = ClassRegistry::init('Vaccine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vaccine);

		parent::tearDown();
	}

}
