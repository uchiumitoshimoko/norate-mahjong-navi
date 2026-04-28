<?php
App::uses('Filaria', 'Model');

/**
 * Filaria Test Case
 *
 */
class FilariaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.filaria', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria_year', 'app.medical', 'app.medicine', 'app.memopad', 'app.nailclipper', 'app.nomi', 'app.photo', 'app.reminder_mail', 'app.shampoo', 'app.toothbrushing', 'app.vaccine', 'app.weight', 'app.exec_year');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Filaria = ClassRegistry::init('Filaria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Filaria);

		parent::tearDown();
	}

}
