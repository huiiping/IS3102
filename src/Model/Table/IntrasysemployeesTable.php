<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * IntrasysEmployees Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $IntrasysEmployeeRoles
 *
 * @method \App\Model\Entity\IntrasysEmployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\IntrasysEmployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IntrasysEmployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IntrasysEmployeesTable extends Table
{
    public static function defaultConnectionName() {
        return 'intrasysdb';
    }
    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'first_name' => array(
            'type' => 'like',
            'field' => 'first_name'
        ),
        'last_name' => array(
            'type' => 'like',
            'field' => 'last_name'
        ),
            'search' => array(
            'type' => 'like',
            'field' => array('last_name','first_name')
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

        $this->table('intrasys_employees');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('IntrasysEmployeeRoles', [
            'foreignKey' => 'intrasys_employee_id',
            'targetForeignKey' => 'intrasys_employee_role_id',
            'joinTable' => 'intrasys_employees_intrasys_employee_roles'
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

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');
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
