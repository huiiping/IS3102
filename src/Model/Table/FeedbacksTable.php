<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FeedbacksTable extends Table
{

    public $filterArgs = array(
        'search' => array(
            'type' => 'like',
            'field' => array('customer_first_name','customer_last_name','customer_contact','customer_email','status')
            )
    );
    
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('feedbacks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
            ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
            ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
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
        ->allowEmpty('customer_first_name');

        $validator
        ->allowEmpty('customer_last_name');

        $validator
        ->allowEmpty('customer_contact');

        $validator
        ->allowEmpty('customer_email');

        $validator
        ->allowEmpty('message');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
