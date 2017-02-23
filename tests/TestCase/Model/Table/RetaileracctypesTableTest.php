<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetailerAccTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetailerAccTypesTable Test Case
 */
class RetailerAccTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetailerAccTypesTable
     */
    public $RetailerAccTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retailer_acc_types',
        'app.retailers',
        'app.retailer_loyalty_points'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RetailerAccTypes') ? [] : ['className' => 'App\Model\Table\RetailerAccTypesTable'];
        $this->RetailerAccTypes = TableRegistry::get('RetailerAccTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetailerAccTypes);

        parent::tearDown();
    }

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
