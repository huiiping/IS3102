<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerEmployees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\HasMany $Promotions
 * @property \Cake\ORM\Association\HasMany $PurchaseOrders
 * @property \Cake\ORM\Association\HasMany $SupplierMemos
 * @property \Cake\ORM\Association\BelongsToMany $Messages
 * @property \Cake\ORM\Association\BelongsToMany $RetailerEmployeeRoles
 *
 * @method \App\Model\Entity\RetailerEmployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerEmployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerEmployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerEmployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RetailerEmployeesTable extends Table
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
        'email' => array(
            'type' => 'like',
            'field' => 'email'
        ),
        'address' => array(
            'type' => 'like',
            'field' => 'address'
        ),
        'created' => array(
            'type' => 'like',
            'field' => 'created'
        ),
        'modified' => array(
            'type' => 'like',
            'field' => 'modified'
        ),
        'first_name' => array(
            'type' => 'like',
            'field' => 'first_name'
        ),
        'last_name' => array(
            'type' => 'like',
            'field' => 'last_name'
        ),
        'account_status' => array(
            'type' => 'like',
            'field' => 'account_status'
        ),
        'location' => array(
            'type' => 'like',
            'field' => 'location_id'
        ),
        'search' => array(
            'type' => 'like',
            'field' => array('id','username','email','address','first_name','last_name','account_status','location_id')
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

        $this->table('retailer_employees');
        $this->displayField('last_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Promotions', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->hasMany('PurchaseOrders', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->hasMany('SupplierMemos', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->hasMany('RetailerLoggings', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->belongsToMany('Messages', [
            'foreignKey' => 'retailer_employee_id',
            'targetForeignKey' => 'message_id',
            'joinTable' => 'retailer_employees_messages'
        ]);
        $this->belongsToMany('RetailerEmployeeRoles', [
            'foreignKey' => 'retailer_employee_id',
            'targetForeignKey' => 'retailer_employee_role_id',
            'joinTable' => 'retailer_employees_retailer_employee_roles'
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->allowEmpty('activation_status');

        $validator
            ->allowEmpty('activation_token');

        $validator
            ->allowEmpty('recovery_status');

        $validator
            ->allowEmpty('recovery_token');
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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
