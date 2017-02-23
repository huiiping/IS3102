<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersPromotionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersPromotionsTable Test Case
 */
class CustomersPromotionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersPromotionsTable
     */
    public $CustomersPromotions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers_promotions',
        'app.customers',
        'app.cust_membership_tiers',
        'app.promotions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustomersPromotions') ? [] : ['className' => 'App\Model\Table\CustomersPromotionsTable'];
        $this->CustomersPromotions = TableRegistry::get('CustomersPromotions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersPromotions);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
