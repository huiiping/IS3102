<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetailerInfoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetailerInfoTable Test Case
 */
class RetailerInfoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetailerInfoTable
     */
    public $RetailerInfo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retailer_info',
        'app.retailers',
        'app.retailer_acc_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RetailerInfo') ? [] : ['className' => 'App\Model\Table\RetailerInfoTable'];
        $this->RetailerInfo = TableRegistry::get('RetailerInfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetailerInfo);

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
