<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Custmembershiptiers Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Retaileremployees
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

        $this->belongsToMany('Retaileremployees', [
            'foreignKey' => 'custmembershiptier_id',
            'targetForeignKey' => 'retaileremployee_id',
            'joinTable' => 'custmembershiptiers_retaileremployees'
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
            ->requirePresence('teirName', 'create')
            ->notEmpty('teirName');

        $validator
            ->integer('validityPeriod')
            ->requirePresence('validityPeriod', 'create')
            ->notEmpty('validityPeriod');

        $validator
            ->numeric('minSpending')
            ->allowEmpty('minSpending');

        $validator
            ->numeric('membershipFee')
            ->allowEmpty('membershipFee');

        $validator
            ->numeric('membershipPts')
            ->allowEmpty('membershipPts');

        $validator
            ->integer('redemptionPts')
            ->allowEmpty('redemptionPts');

        $validator
            ->numeric('discountRate')
            ->allowEmpty('discountRate');

        $validator
            ->numeric('birthdayRate')
            ->allowEmpty('birthdayRate');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
