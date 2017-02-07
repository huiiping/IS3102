<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccounttypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccounttypeTable Test Case
 */
class AccounttypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccounttypeTable
     */
    public $Accounttype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.accounttype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Accounttype') ? [] : ['className' => 'App\Model\Table\AccounttypeTable'];
        $this->Accounttype = TableRegistry::get('Accounttype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Accounttype);

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
