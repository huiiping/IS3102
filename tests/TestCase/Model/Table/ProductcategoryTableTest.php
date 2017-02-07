<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductcategoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductcategoryTable Test Case
 */
class ProductcategoryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductcategoryTable
     */
    public $Productcategory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.productcategory'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Productcategory') ? [] : ['className' => 'App\Model\Table\ProductcategoryTable'];
        $this->Productcategory = TableRegistry::get('Productcategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Productcategory);

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
