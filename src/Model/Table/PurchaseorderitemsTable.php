<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Purchaseorderitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Purchaseorders
 *
 * @method \App\Model\Entity\Purchaseorderitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Purchaseorderitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Purchaseorderitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Purchaseorderitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Purchaseorderitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Purchaseorderitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Purchaseorderitem findOrCreate($search, callable $callback = null, $options = [])
 */
class PurchaseorderitemsTable extends Table
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

        $this->table('purchaseorderitems');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Purchaseorders', [
            'foreignKey' => 'purchaseOrder_id'
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
            ->integer('itemID')
            ->allowEmpty('itemID');

        $validator
            ->allowEmpty('itemName');

        $validator
            ->allowEmpty('itemDesc');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

        $validator
            ->numeric('unitPrice')
            ->allowEmpty('unitPrice');

        $validator
            ->numeric('subTotalPrice')
            ->allowEmpty('subTotalPrice');

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
        $rules->add($rules->existsIn(['purchaseOrder_id'], 'Purchaseorders'));

        return $rules;
    }
}
