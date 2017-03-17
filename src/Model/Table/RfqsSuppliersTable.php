<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RfqsSuppliers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rfqs
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 *
 * @method \App\Model\Entity\RfqsSupplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\RfqsSupplier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RfqsSupplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RfqsSupplier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RfqsSupplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RfqsSupplier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RfqsSupplier findOrCreate($search, callable $callback = null, $options = [])
 */
class RfqsSuppliersTable extends Table
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

        $this->table('rfqs_suppliers');
        $this->displayField('rfq_id');
        $this->primaryKey(['rfq_id', 'supplier_id']);

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
