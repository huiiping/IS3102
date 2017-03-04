<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplierMemos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 *
 * @method \App\Model\Entity\SupplierMemo get($primaryKey, $options = [])
 * @method \App\Model\Entity\SupplierMemo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SupplierMemo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SupplierMemo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SupplierMemo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SupplierMemo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SupplierMemo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SupplierMemosTable extends Table
{
    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'remarks' => array(
            'type' => 'like',
            'field' => 'remarks'
        ),
        'created' => array(
            'type' => 'like',
            'field' => 'created'
        ),
        'supplier_id' => array(
            'type' => 'like',
            'field' => 'Suppliers.supplier_name',
            'method' => 'findByActions'
        ),
        'retailer_employee_id' => array(
            'type' => 'like',
            'field' => 'RetailerEmployees.first_name',
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

        $this->table('supplier_memos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id'
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
            ->allowEmpty('remarks');

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
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));

        return $rules;
    }
}
