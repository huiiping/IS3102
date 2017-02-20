<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IntrasysEmployeeRoles Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $IntrasysEmployees
 *
 * @method \App\Model\Entity\IntrasysEmployeeRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\IntrasysEmployeeRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployeeRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployeeRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IntrasysEmployeeRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployeeRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployeeRole findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IntrasysEmployeeRolesTable extends Table
{

    public static function defaultConnectionName() {
        return 'intrasysdb';
    }


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('intrasys_employee_roles');
        $this->displayField('role_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('IntrasysEmployees', [
            'foreignKey' => 'intrasys_employee_role_id',
            'targetForeignKey' => 'intrasys_employee_id',
            'joinTable' => 'intrasys_employees_intrasys_employee_roles'
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
            ->allowEmpty('role_name')
            ->add('role_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('role_desc');

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
        $rules->add($rules->isUnique(['role_name']));

        return $rules;
    }
}
