<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MembershipPoints Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 *
 * @method \App\Model\Entity\MembershipPoint get($primaryKey, $options = [])
 * @method \App\Model\Entity\MembershipPoint newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MembershipPoint[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MembershipPoint|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MembershipPoint patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MembershipPoint[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MembershipPoint findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MembershipPointsTable extends Table
{
    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'pts' => array(
            'type' => 'like',
            'field' => 'pts'
        ),
        'type' => array(
            'type' => 'like',
            'field' => 'type'
        ),
        'remarks' => array(
            'type' => 'like',
            'field' => 'remarks'
        ),
        'created' => array(
            'type' => 'like',
            'field' => 'created'
        ),
        'first_name' => array(
            'type' => 'like',
            'field' => 'Customers.first_name',
            'method' => 'findByActions'
        ),
        'last_name' => array(
            'type' => 'like',
            'field' => 'Customers.last_name',
            'method' => 'findByActions'
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

        $this->setTable('membership_points');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id'
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
            ->integer('pts')
            ->allowEmpty('pts');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('remarks');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));

        return $rules;
    }
}
