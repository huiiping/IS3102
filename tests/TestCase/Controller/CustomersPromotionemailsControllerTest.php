<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CustomersPromotionemailsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CustomersPromotionemailsController Test Case
 */
class CustomersPromotionemailsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers_promotionemails',
        'app.customers',
        'app.custmembershiptiers',
        'app.retaileremployees',
        'app.locations',
        'app.items',
        'app.prodtypes',
        'app.prodcats',
        'app.sections',
        'app.deliveryorderitems',
        'app.transactionitems',
        'app.transferorderitems',
        'app.stocklevels',
        'app.transactions',
        'app.retaileremployees_transactions',
        'app.promotions',
        'app.locations_promotions',
        'app.custmembershiptiers_retaileremployees',
        'app.customers_retaileremployees',
        'app.employeeroles',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.retaileremployees_suppliermemos',
        'app.transferorders',
        'app.retaileremployees_transferorders',
        'app.membershippoints',
        'app.promotionemails'
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
