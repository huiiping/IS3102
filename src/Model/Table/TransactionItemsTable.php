<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransactionItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Transactions
 * @property \Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\TransactionItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\TransactionItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TransactionItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransactionItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransactionItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TransactionItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransactionItem findOrCreate($search, callable $callback = null, $options = [])
 */
class TransactionItemsTable extends Table
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

        $this->setTable('transaction_items');
        $this->setDisplayField('transaction_id');
        $this->setPrimaryKey(['transaction_id', 'item_id']);

        $this->belongsTo('Transactions', [
            'foreignKey' => 'transaction_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
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
        $rules->add($rules->existsIn(['transaction_id'], 'Transactions'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
