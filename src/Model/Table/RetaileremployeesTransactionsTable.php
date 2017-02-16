<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetaileremployeesTransactions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\BelongsTo $Transactions
 *
 * @method \App\Model\Entity\RetaileremployeesTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransaction findOrCreate($search, callable $callback = null, $options = [])
 */
class RetaileremployeesTransactionsTable extends Table
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

        $this->table('retaileremployees_transactions');
        $this->displayField('retailerEmployee_id');
        $this->primaryKey(['retailerEmployee_id', 'transaction_id']);

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'retailerEmployee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Transactions', [
            'foreignKey' => 'transaction_id',
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
        $rules->add($rules->existsIn(['retailerEmployee_id'], 'Retaileremployees'));
        $rules->add($rules->existsIn(['transaction_id'], 'Transactions'));

        return $rules;
    }
}
