<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StockLevels Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 *
 * @method \App\Model\Entity\StockLevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\StockLevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StockLevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StockLevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StockLevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StockLevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StockLevel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StockLevelsTable extends Table
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

        $this->setTable('stock_levels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id'
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
            ->integer('threshold')
            ->allowEmpty('threshold');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));

        return $rules;
    }
}
