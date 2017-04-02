<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeliveryOrdersItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DeliveryOrders
 * @property \Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\DeliveryOrdersItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeliveryOrdersItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeliveryOrdersItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryOrdersItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeliveryOrdersItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryOrdersItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeliveryOrdersItem findOrCreate($search, callable $callback = null, $options = [])
 */
class DeliveryOrdersItemsTable extends Table
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

        $this->setTable('delivery_orders_items');
        $this->setDisplayField('delivery_order_id');
        $this->setPrimaryKey(['delivery_order_id', 'item_id']);

        $this->belongsTo('DeliveryOrders', [
            'foreignKey' => 'delivery_order_id',
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
        $rules->add($rules->existsIn(['delivery_order_id'], 'DeliveryOrders'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
