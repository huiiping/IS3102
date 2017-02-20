<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PromotionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PromotionsController Test Case
 */
class PromotionsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
