<?php
App::uses('MemoType', 'Model');

/**
 * MemoType Test Case
 *
 */
class MemoTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.memo_type', 'app.memopad');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MemoType = ClassRegistry::init('MemoType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MemoType);

		parent::tearDown();
	}

}
