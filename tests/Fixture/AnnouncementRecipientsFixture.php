<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AnnouncementRecipientsFixture
 *
 */
class AnnouncementRecipientsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'announcement_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'intrasys_employee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'is_read' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'intrasys_employee_id' => ['type' => 'index', 'columns' => ['intrasys_employee_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['announcement_id', 'intrasys_employee_id'], 'length' => []],
            'announcement_recipients_ibfk_1' => ['type' => 'foreign', 'columns' => ['announcement_id'], 'references' => ['announcements', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'announcement_recipients_ibfk_2' => ['type' => 'foreign', 'columns' => ['intrasys_employee_id'], 'references' => ['intrasys_employees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'announcement_id' => 1,
            'intrasys_employee_id' => 1,
            'is_read' => 1
        ],
    ];
}
