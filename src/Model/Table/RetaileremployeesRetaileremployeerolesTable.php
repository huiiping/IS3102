<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerEmployeesRetailerEmployeeRoles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployeeRoles
 *
 * @method \App\Model\Entity\RetailerEmployeesRetailerEmployeeRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerEmployeesRetailerEmployeeRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeesRetailerEmployeeRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeesRetailerEmployeeRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerEmployeesRetailerEmployeeRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeesRetailerEmployeeRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeesRetailerEmployeeRole findOrCreate($search, callable $callback = null, $options = [])
 */
class RetailerEmployeesRetailerEmployeeRolesTable extends Table
{
    public static function defaultConnectionName()
    {
        return 'retailerdb';
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

        $this->table('retailer_employees_retailer_employee_roles');
        $this->displayField('retailer_employee_id');
        $this->primaryKey(['retailer_employee_id', 'retailer_employee_role_id']);

        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RetailerEmployeeRoles', [
            'foreignKey' => 'retailer_employee_role_id',
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
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));
        $rules->add($rules->existsIn(['retailer_employee_role_id'], 'RetailerEmployeeRoles'));

        return $rules;
    }
}
