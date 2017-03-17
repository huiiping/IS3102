<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfqSuppliers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rfqs
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 *
 * @method \App\Model\Entity\RfqSupplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfqSupplier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RfqSupplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfqSupplier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqSupplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfqSupplier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfqSupplier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RfqSuppliersTable extends Table
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

        $this->setTable('rfq_suppliers');
        $this->setDisplayField('rfq_id');
        $this->setPrimaryKey(['rfq_id', 'supplier_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Rfqs', [
            'foreignKey' => 'rfq_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('remarks');

        $validator
            ->allowEmpty('fileName');

        $validator
            ->allowEmpty('fileDir');

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
        $rules->add($rules->existsIn(['rfq_id'], 'Rfqs'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));

        return $rules;
    }
}
