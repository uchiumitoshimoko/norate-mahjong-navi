<?php
App::uses('Blood', 'Model');

/**
 * Blood Test Case
 *
 */
class BloodTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.blood', 'app.medical');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Blood = ClassRegistry::init('Blood');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Blood);

		parent::tearDown();
	}

}
