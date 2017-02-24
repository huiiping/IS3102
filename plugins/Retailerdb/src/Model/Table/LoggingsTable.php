<?php
namespace Retailerdb\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loggings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 *
 * @method \Retailerdb\Model\Entity\Logging get($primaryKey, $options = [])
 * @method \Retailerdb\Model\Entity\Logging newEntity($data = null, array $options = [])
 * @method \Retailerdb\Model\Entity\Logging[] newEntities(array $data, array $options = [])
 * @method \Retailerdb\Model\Entity\Logging|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Retailerdb\Model\Entity\Logging patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Retailerdb\Model\Entity\Logging[] patchEntities($entities, array $data, array $options = [])
 * @method \Retailerdb\Model\Entity\Logging findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LoggingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('loggings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id',
            'joinType' => 'INNER',
            'className' => 'Retailerdb.RetailerEmployees'
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
