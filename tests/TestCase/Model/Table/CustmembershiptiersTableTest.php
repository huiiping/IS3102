<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustmembershiptiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustmembershiptiersTable Test Case
 */
class CustmembershiptiersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustmembershiptiersTable
     */
    public $Custmembershiptiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.custmembershiptiers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Custmembershiptiers') ? [] : ['className' => 'App\Model\Table\CustmembershiptiersTable'];
        $this->Custmembershiptiers = TableRegistry::get('Custmembershiptiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Custmembershiptiers);

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
