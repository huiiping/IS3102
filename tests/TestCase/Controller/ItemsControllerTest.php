<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ItemsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ItemsController Test Case
 */
class ItemsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.items',
        'app.locations',
        'app.retaileremployees',
        'app.custmembershiptiers',
        'app.custmembershiptiers_retaileremployees',
        'app.customers',
        'app.membershippoints',
        'app.transactions',
        'app.retaileremployees_transactions',
        'app.promotionemails',
        'app.customers_promotionemails',
        'app.customers_retaileremployees',
        'app.employeeroles',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.retaileremployees_suppliermemos',
        'app.transferorders',
        'app.retaileremployees_transferorders',
        'app.sections',
        'app.stocklevels',
        'app.promotions',
        'app.locations_promotions',
        'app.prodtypes',
        'app.prodcats',
        'app.deliveryorderitems',
        'app.transactionitems',
        'app.transferorderitems'
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
