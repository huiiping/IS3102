<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseorderitemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseorderitemsTable Test Case
 */
class PurchaseorderitemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseorderitemsTable
     */
    public $Purchaseorderitems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.purchaseorderitems',
        'app.purchaseorders',
        'app.suppliers',
        'app.suppliermemos',
        'app.retaileremployees',
        'app.locations',
        'app.sections',
        'app.messages',
        'app.references',
        'app.retaileremployees_messages',
        'app.retaileremployeeroles',
        'app.retaileremployees_retaileremployeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Purchaseorderitems') ? [] : ['className' => 'App\Model\Table\PurchaseorderitemsTable'];
        $this->Purchaseorderitems = TableRegistry::get('Purchaseorderitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Purchaseorderitems);

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
