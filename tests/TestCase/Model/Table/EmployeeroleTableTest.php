<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeroleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeroleTable Test Case
 */
class EmployeeroleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeroleTable
     */
    public $Employeerole;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employeerole'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Employeerole') ? [] : ['className' => 'App\Model\Table\EmployeeroleTable'];
        $this->Employeerole = TableRegistry::get('Employeerole', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Employeerole);

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
}
