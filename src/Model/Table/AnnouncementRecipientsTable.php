<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AnnouncementRecipients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Announcements
 * @property \Cake\ORM\Association\BelongsTo $IntrasysEmployees
 *
 * @method \App\Model\Entity\AnnouncementRecipient get($primaryKey, $options = [])
 * @method \App\Model\Entity\AnnouncementRecipient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AnnouncementRecipient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AnnouncementRecipient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnnouncementRecipient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AnnouncementRecipient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AnnouncementRecipient findOrCreate($search, callable $callback = null, $options = [])
 */
class AnnouncementRecipientsTable extends Table
{
    public static function defaultConnectionName() {
        return 'intrasysdb';
    }
    
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('announcement_recipients');
        $this->setDisplayField('announcement_id');
        $this->setPrimaryKey(['announcement_id', 'intrasys_employee_id']);

        $this->belongsTo('Announcements', [
            'foreignKey' => 'announcement_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('IntrasysEmployees', [
            'foreignKey' => 'intrasys_employee_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->boolean('is_read')
            ->allowEmpty('is_read');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['announcement_id'], 'Announcements'));
        $rules->add($rules->existsIn(['intrasys_employee_id'], 'IntrasysEmployees'));

        return $rules;
    }
}
