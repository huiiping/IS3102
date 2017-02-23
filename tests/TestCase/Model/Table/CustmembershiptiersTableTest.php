<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustMembershipTiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustMembershipTiersTable Test Case
 */
class CustMembershipTiersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustMembershipTiersTable
     */
    public $CustMembershipTiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cust_membership_tiers',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustMembershipTiers') ? [] : ['className' => 'App\Model\Table\CustMembershipTiersTable'];
        $this->CustMembershipTiers = TableRegistry::get('CustMembershipTiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustMembershipTiers);

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
