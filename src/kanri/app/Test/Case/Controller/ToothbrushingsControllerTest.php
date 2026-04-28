<?php
App::uses('ToothbrushingsController', 'Controller');

/**
 * TestToothbrushingsController *
 */
class TestToothbrushingsController extends ToothbrushingsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * ToothbrushingsController Test Case
 *
 */
class ToothbrushingsControllerTestCase extends CakeTestCase {
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
		$this->Toothbrushings = new TestToothbrushingsController();
		$this->Toothbrushings->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Toothbrushings);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}
/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}
/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}
/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}
}
