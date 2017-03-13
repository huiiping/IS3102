<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseOrderItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PurchaseOrders
 *
 * @method \App\Model\Entity\PurchaseOrderItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseOrderItem findOrCreate($search, callable $callback = null, $options = [])
 */
class PurchaseOrderItemsTable extends Table
{


    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),

        'search' => array(
            'type' => 'like',
            'field' => array('id','item_ID','item_name','item_desc','quantity','unit_price','purchase_order_id'),
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

        $this->table('purchase_order_items');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('PurchaseOrders', [
            'foreignKey' => 'purchase_order_id'
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
            ->integer('item_ID')
            ->allowEmpty('item_ID');

        $validator
            ->allowEmpty('item_name');

        $validator
            ->allowEmpty('item_desc');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

        $validator
            ->numeric('unit_price')
            ->allowEmpty('unit_price');

        $validator
            ->numeric('sub_total_price')
            ->allowEmpty('sub_total_price');

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
        $rules->add($rules->existsIn(['purchase_order_id'], 'PurchaseOrders'));

        return $rules;
    }
}
