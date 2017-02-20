<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PromotionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PromotionsTable Test Case
 */
class PromotionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PromotionsTable
     */
    public $Promotions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.promotions',
        'app.retailer_employees',
        'app.customers',
        'app.cust_membership_tiers',
        'app.customers_promotions',
        'app.prod_types',
        'app.prod_cats',
        'app.promotions_prod_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Promotions') ? [] : ['className' => 'App\Model\Table\PromotionsTable'];
        $this->Promotions = TableRegistry::get('Promotions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Promotions);

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
