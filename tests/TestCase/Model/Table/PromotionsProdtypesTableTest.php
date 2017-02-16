<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PromotionsProdtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PromotionsProdtypesTable Test Case
 */
class PromotionsProdtypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PromotionsProdtypesTable
     */
    public $PromotionsProdtypes;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PromotionsProdtypes') ? [] : ['className' => 'App\Model\Table\PromotionsProdtypesTable'];
        $this->PromotionsProdtypes = TableRegistry::get('PromotionsProdtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PromotionsProdtypes);

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
