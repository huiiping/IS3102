<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntrasysemployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntrasysemployeesTable Test Case
 */
class IntrasysemployeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IntrasysemployeesTable
     */
    public $Intrasysemployees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.intrasysemployees',
        'app.announcements',
        'app.intrasysemployees_announcements',
        'app.employeeroles',
        'app.intrasysemployees_employeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Intrasysemployees') ? [] : ['className' => 'App\Model\Table\IntrasysemployeesTable'];
        $this->Intrasysemployees = TableRegistry::get('Intrasysemployees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Intrasysemployees);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
