<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suppliers Model
 *
 * @property \Cake\ORM\Association\HasMany $PurchaseOrders
 * @property \Cake\ORM\Association\HasMany $SupplierMemos
 *
 * @method \App\Model\Entity\Supplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supplier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Supplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SuppliersTable extends Table
{
    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'username' => array(
            'type' => 'like',
            'field' => 'username'
        ),
        'address' => array(
            'type' => 'like',
            'field' => 'address'
        ),
        'contact' => array(
            'type' => 'like',
            'field' => 'contact'
        ),
        'email' => array(
            'type' => 'like',
            'field' => 'email'
        ),
        'country' => array(
            'type' => 'like',
            'field' => 'country'
        ),
        'account_status' => array(
            'type' => 'like',
            'field' => 'account_status'
        ),
        'supplier_name' => array(
            'type' => 'like',
            'field' => 'supplier_name'
        ),

        'search' => array(
            'type' => 'like',
            'field' => array('supplier_name','id','username','address','email', 'country','supplier_name')
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

        $this->table('suppliers');
        $this->displayField('supplier_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PurchaseOrders', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->hasMany('SupplierMemos', [
            'foreignKey' => 'supplier_id'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->allowEmpty('supplier_name');

        $validator
            ->allowEmpty('country');

        $validator
            ->allowEmpty('activation_status');

        $validator
            ->allowEmpty('activation_token');

        $validator
            ->allowEmpty('recovery_status');

        $validator
            ->allowEmpty('recovery_token');

        $validator
            ->allowEmpty('bank_acc');
        // check whether password and confirm_password are matched
        $validator 
            ->add(
                'confirm_password',
                'custom',
                [
                    'rule' => function ($value, $context) {
                            if (isset($context['data']['password']) && $value == $context['data']['password']) {
                                return true;
                            }
                            return false;
                        },
                    'message' => 'Password and confirm password does not matched.'
                ]
            );
            
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
