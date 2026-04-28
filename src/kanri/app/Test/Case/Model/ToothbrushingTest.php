<?php
App::uses('Toothbrushing', 'Model');

/**
 * Toothbrushing Test Case
 *
 */
class ToothbrushingTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.toothbrushing', 'app.customer', 'app.diaphragm', 'app.earcleaning', 'app.filaria_year', 'app.filaria', 'app.exec_year', 'app.memopad', 'app.memo_type', 'app.medicine', 'app.nomi', 'app.vaccine', 'app.weight', 'app.medical', 'app.memopads', 'app.blood', 'app.image', 'app.medical_examination', 'app.nailclipper', 'app.photo', 'app.reminder_mail', 'app.reminder', 'app.table', 'app.shampoo');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Toothbrushing = ClassRegistry::init('Toothbrushing');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Toothbrushing);

		parent::tearDown();
	}

}
