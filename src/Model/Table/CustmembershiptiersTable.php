<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Custmembershiptiers Model
 *
 * @method \App\Model\Entity\Custmembershiptier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Custmembershiptier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Custmembershiptier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Custmembershiptier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Custmembershiptier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Custmembershiptier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Custmembershiptier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustmembershiptiersTable extends Table
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

        $this->table('custmembershiptiers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('tierName', 'create')
            ->notEmpty('tierName');

        $validator
            ->integer('validityPeriod')
            ->requirePresence('validityPeriod', 'create')
            ->notEmpty('validityPeriod');

        $validator
            ->allowEmpty('minSpending');

        $validator
            ->allowEmpty('membershipFee');

        $validator
            ->integer('membershipPts')
            ->allowEmpty('membershipPts');

        $validator
            ->integer('redemptionPts')
            ->allowEmpty('redemptionPts');

        $validator
            ->allowEmpty('discountRate');

        $validator
            ->allowEmpty('birthdayRate');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
