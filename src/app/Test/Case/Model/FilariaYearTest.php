<?php
App::uses('FilariaYear', 'Model');

/**
 * FilariaYear Test Case
 *
 */
class FilariaYearTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.filaria_year', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria', 'app.medical', 'app.medicine', 'app.memopad', 'app.nailclipper', 'app.nomi', 'app.photo', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing', 'app.vaccine', 'app.weight');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FilariaYear = ClassRegistry::init('FilariaYear');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FilariaYear);

		parent::tearDown();
	}

}
