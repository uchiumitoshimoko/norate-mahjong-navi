<?php
App::uses('Nomi', 'Model');

/**
 * Nomi Test Case
 *
 */
class NomiTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.nomi', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria_year', 'app.filaria', 'app.exec_year', 'app.memopad', 'app.memo_type', 'app.medicine', 'app.vaccine', 'app.weight', 'app.medical', 'app.memopads', 'app.blood', 'app.image', 'app.medical_examination', 'app.nailclipper', 'app.photo', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nomi = ClassRegistry::init('Nomi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nomi);

		parent::tearDown();
	}

}
