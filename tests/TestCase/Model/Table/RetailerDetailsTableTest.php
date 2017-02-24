<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetailerDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetailerDetailsTable Test Case
 */
class RetailerDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetailerDetailsTable
     */
    public $RetailerDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retailer_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RetailerDetails') ? [] : ['className' => 'App\Model\Table\RetailerDetailsTable'];
        $this->RetailerDetails = TableRegistry::get('RetailerDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetailerDetails);

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
