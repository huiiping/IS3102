<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Retailer Model
 *
 * @method \App\Model\Entity\Retailer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Retailer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Retailer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Retailer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Retailer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Retailer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Retailer findOrCreate($search, callable $callback = null, $options = [])
 */
class RetailerTable extends Table
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

        $this->table('retailer');
        $this->displayField('retailerId');
        $this->primaryKey('retailerId');
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
            ->integer('retailerId')
            ->allowEmpty('retailerId', 'create');

        $validator
            ->requirePresence('retailerName', 'create')
            ->notEmpty('retailerName');

        $validator
            ->requirePresence('country', 'create')
            ->notEmpty('country');

        $validator
            ->boolean('activationStatus')
            ->requirePresence('activationStatus', 'create')
            ->notEmpty('activationStatus');

        $validator
            ->requirePresence('accountType', 'create')
            ->notEmpty('accountType');

        $validator
            ->requirePresence('paymentType', 'create')
            ->notEmpty('paymentType');

        $validator
            ->integer('loyaltyPoints')
            ->requirePresence('loyaltyPoints', 'create')
            ->notEmpty('loyaltyPoints');

        $validator
            ->dateTime('contractStartDate')
            ->requirePresence('contractStartDate', 'create')
            ->notEmpty('contractStartDate');

        $validator
            ->dateTime('contractEndDate')
            ->requirePresence('contractEndDate', 'create')
            ->notEmpty('contractEndDate');

        return $validator;
    }
}
