<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rfqs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 * @property \Cake\ORM\Association\BelongsToMany $Suppliers
 *
 * @method \App\Model\Entity\Rfq get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rfq newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rfq[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rfq|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rfq patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rfq[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rfq findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RfqsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */

    public $filterArgs = array(
        'search' => array(
            'type' => 'like',
            'field' => array('title','retailer_employee_id')
            )
    );

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('rfqs');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->belongsToMany('Suppliers', [
            'foreignKey' => 'rfq_id',
            'targetForeignKey' => 'supplier_id',
            'joinTable' => 'rfqs_suppliers'
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('message');

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
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));

        return $rules;
    }
}
