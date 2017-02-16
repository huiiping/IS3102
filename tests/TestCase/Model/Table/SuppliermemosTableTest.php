<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuppliermemosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuppliermemosTable Test Case
 */
class SuppliermemosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SuppliermemosTable
     */
    public $Suppliermemos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.suppliermemos',
        'app.suppliers',
        'app.purchaseorders',
        'app.retaileremployees',
        'app.locations',
        'app.sections',
        'app.messages',
        'app.retaileremployees_messages',
        'app.retaileremployeeroles',
        'app.retaileremployees_retaileremployeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Suppliermemos') ? [] : ['className' => 'App\Model\Table\SuppliermemosTable'];
        $this->Suppliermemos = TableRegistry::get('Suppliermemos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Suppliermemos);

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
