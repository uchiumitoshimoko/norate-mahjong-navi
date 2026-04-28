<?php
App::uses('MedicalExamination', 'Model');

/**
 * MedicalExamination Test Case
 *
 */
class MedicalExaminationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medical_examination', 'app.medical');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MedicalExamination = ClassRegistry::init('MedicalExamination');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MedicalExamination);

		parent::tearDown();
	}

}
