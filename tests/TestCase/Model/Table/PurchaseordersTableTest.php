<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseordersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseordersTable Test Case
 */
class PurchaseordersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseordersTable
     */
    public $Purchaseorders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Purchaseorders') ? [] : ['className' => 'App\Model\Table\PurchaseordersTable'];
        $this->Purchaseorders = TableRegistry::get('Purchaseorders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Purchaseorders);

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
