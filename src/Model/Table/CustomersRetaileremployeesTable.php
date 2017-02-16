<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomersRetaileremployees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 *
 * @method \App\Model\Entity\CustomersRetaileremployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomersRetaileremployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomersRetaileremployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomersRetaileremployee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomersRetaileremployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomersRetaileremployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomersRetaileremployee findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersRetaileremployeesTable extends Table
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

        $this->table('customers_retaileremployees');
        $this->displayField('customer_id');
        $this->primaryKey(['customer_id', 'employee_id']);

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['employee_id'], 'Retaileremployees'));

        return $rules;
    }
}
