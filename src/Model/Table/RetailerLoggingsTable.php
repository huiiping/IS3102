<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerLoggings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 *
 * @method \App\Model\Entity\RetailerLogging get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerLogging newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerLogging[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerLogging|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerLogging patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerLogging[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerLogging findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RetailerLoggingsTable extends Table
{


    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'action' => array(
            'type' => 'like',
            'field' => 'action'
        ),
        'entity' => array(
            'type' => 'like',
            'field' => 'entity'
        ),
        'entity_id' => array(
            'type' => 'like',
            'field' => 'entity_id'
        ),
        'retailer_employee_id' => array(
            'type' => 'like',
            'field' => 'RetailerEmployees.first_name',
            'method' => 'findByActions'
        ),
        'created' => array(
            'type' => 'like',
            'field' => 'created'
        )
    );
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('retailer_loggings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id',
            'joinType' => 'INNER'
        ]);
        $this->addBehavior('Searchable');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('action');

        $validator
            ->allowEmpty('entity');

        $validator
            ->integer('entityid')
            ->allowEmpty('entityid');

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
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));

        return $rules;
    }
}
