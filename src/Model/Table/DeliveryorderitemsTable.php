<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deliveryorderitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\BelongsTo $Deliveryorders
 *
 * @method \App\Model\Entity\Deliveryorderitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Deliveryorderitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Deliveryorderitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deliveryorderitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deliveryorderitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Deliveryorderitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deliveryorderitem findOrCreate($search, callable $callback = null, $options = [])
 */
class DeliveryorderitemsTable extends Table
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

        $this->table('deliveryorderitems');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
        ]);
        $this->belongsTo('Deliveryorders', [
            'foreignKey' => 'deliveryOrder_id'
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
            ->allowEmpty('ECP');

        $validator
            ->allowEmpty('barcode');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['deliveryOrder_id'], 'Deliveryorders'));

        return $rules;
    }
}
