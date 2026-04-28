<?php
App::uses('Medical', 'Model');

/**
 * Medical Test Case
 *
 */
class MedicalTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medical', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria_year', 'app.filaria', 'app.exec_year', 'app.memopad', 'app.medicine', 'app.nailclipper', 'app.nomi', 'app.photo', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing', 'app.vaccine', 'app.weight', 'app.memopads', 'app.blood', 'app.image', 'app.medical_examination');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medical = ClassRegistry::init('Medical');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medical);

		parent::tearDown();
	}

}
