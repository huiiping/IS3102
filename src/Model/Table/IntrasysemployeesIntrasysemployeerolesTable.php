<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IntrasysEmployeesIntrasysEmployeeRoles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $IntrasysEmployees
 * @property \Cake\ORM\Association\BelongsTo $IntrasysEmployeeRoles
 *
 * @method \App\Model\Entity\IntrasysEmployeesIntrasysEmployeeRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\IntrasysEmployeesIntrasysEmployeeRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployeesIntrasysEmployeeRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployeesIntrasysEmployeeRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IntrasysEmployeesIntrasysEmployeeRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployeesIntrasysEmployeeRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysEmployeesIntrasysEmployeeRole findOrCreate($search, callable $callback = null, $options = [])
 */
class IntrasysEmployeesIntrasysEmployeeRolesTable extends Table
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

        $this->table('intrasys_employees_intrasys_employee_roles');
        $this->displayField('intrasys_employee_id');
        $this->primaryKey(['intrasys_employee_id', 'intrasys_employee_role_id']);

        $this->belongsTo('IntrasysEmployees', [
            'foreignKey' => 'intrasys_employee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('IntrasysEmployeeRoles', [
            'foreignKey' => 'intrasys_employee_role_id',
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
        $rules->add($rules->existsIn(['intrasys_employee_id'], 'IntrasysEmployees'));
        $rules->add($rules->existsIn(['intrasys_employee_role_id'], 'IntrasysEmployeeRoles'));

        return $rules;
    }
}
