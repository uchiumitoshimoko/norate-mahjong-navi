<?php
App::uses('VaccineId', 'Model');

/**
 * VaccineId Test Case
 *
 */
class VaccineIdTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.vaccine_id');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VaccineId = ClassRegistry::init('VaccineId');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VaccineId);

		parent::tearDown();
	}

}
