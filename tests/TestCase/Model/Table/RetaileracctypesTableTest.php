<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetaileracctypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetaileracctypesTable Test Case
 */
class RetaileracctypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetaileracctypesTable
     */
    public $Retaileracctypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retaileracctypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Retaileracctypes') ? [] : ['className' => 'App\Model\Table\RetaileracctypesTable'];
        $this->Retaileracctypes = TableRegistry::get('Retaileracctypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Retaileracctypes);

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
}
