<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntrasysemployeerolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntrasysemployeerolesTable Test Case
 */
class IntrasysemployeerolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IntrasysemployeerolesTable
     */
    public $Intrasysemployeeroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.intrasysemployeeroles',
        'app.intrasysemployees',
        'app.intrasysemployees_intrasysemployeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Intrasysemployeeroles') ? [] : ['className' => 'App\Model\Table\IntrasysemployeerolesTable'];
        $this->Intrasysemployeeroles = TableRegistry::get('Intrasysemployeeroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Intrasysemployeeroles);

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
