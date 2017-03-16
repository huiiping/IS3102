<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reports
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\HasMany $DeliveryOrderItems
 * @property \Cake\ORM\Association\HasMany $Feedbacks
 * @property \Cake\ORM\Association\HasMany $Reports
 * @property \Cake\ORM\Association\HasMany $TransactionItems
 * @property \Cake\ORM\Association\HasMany $TransferOrderItems
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Reports', [
            'foreignKey' => 'report_id'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('DeliveryOrderItems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Feedbacks', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('TransactionItems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('TransferOrderItems', [
            'foreignKey' => 'item_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('EPC');

        $validator
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['report_id'], 'Reports'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
