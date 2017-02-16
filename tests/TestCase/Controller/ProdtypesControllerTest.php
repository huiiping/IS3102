<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProdtypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ProdtypesController Test Case
 */
class ProdtypesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prodtypes',
        'app.prodcats',
        'app.promotions',
        'app.retaileremployees',
        'app.locations',
        'app.sections',
        'app.messages',
        'app.references',
        'app.retaileremployees_messages',
        'app.retaileremployeeroles',
        'app.retaileremployees_retaileremployeeroles',
        'app.customers',
        'app.custmembershiptiers',
        'app.customers_promotions',
        'app.promotions_prodtypes'
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
