<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnnouncementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnnouncementsTable Test Case
 */
class AnnouncementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnnouncementsTable
     */
    public $Announcements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.announcements',
        'app.intrasysemployees',
        'app.intrasysemployees_announcements',
        'app.employeeroles',
        'app.retaileremployees',
        'app.locations',
        'app.items',
        'app.prodtypes',
        'app.prodcats',
        'app.sections',
        'app.deliveryorderitems',
        'app.transactionitems',
        'app.transferorderitems',
        'app.stocklevels',
        'app.transactions',
        'app.promotions',
        'app.locations_promotions',
        'app.custmembershiptiers',
        'app.custmembershiptiers_retaileremployees',
        'app.customers',
        'app.membershippoints',
        'app.promotionemails',
        'app.customers_promotionemails',
        'app.customers_retaileremployees',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.retaileremployees_suppliermemos',
        'app.retaileremployees_transactions',
        'app.transferorders',
        'app.retaileremployees_transferorders',
        'app.intrasysemployees_employeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Announcements') ? [] : ['className' => 'App\Model\Table\AnnouncementsTable'];
        $this->Announcements = TableRegistry::get('Announcements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Announcements);

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
