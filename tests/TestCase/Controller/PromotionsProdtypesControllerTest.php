<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PromotionsProdtypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PromotionsProdtypesController Test Case
 */
class PromotionsProdtypesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.promotions_prodtypes',
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
        'app.prodtypes',
        'app.prodcats'
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
