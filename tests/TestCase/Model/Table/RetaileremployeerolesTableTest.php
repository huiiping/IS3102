<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetaileremployeerolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetaileremployeerolesTable Test Case
 */
class RetaileremployeerolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetaileremployeerolesTable
     */
    public $Retaileremployeeroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retaileremployeeroles',
        'app.retaileremployees',
        'app.locations',
        'app.sections',
        'app.messages',
        'app.retaileremployees_messages',
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
        $config = TableRegistry::exists('Retaileremployeeroles') ? [] : ['className' => 'App\Model\Table\RetaileremployeerolesTable'];
        $this->Retaileremployeeroles = TableRegistry::get('Retaileremployeeroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Retaileremployeeroles);

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
