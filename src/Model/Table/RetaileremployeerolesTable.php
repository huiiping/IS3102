<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerEmployeeRoles Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $RetailerEmployees
 *
 * @method \App\Model\Entity\RetailerEmployeeRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerEmployeeRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeeRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeeRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerEmployeeRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeeRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeeRole findOrCreate($search, callable $callback = null, $options = [])
 */
class RetailerEmployeeRolesTable extends Table
{
    public $filterArgs = array(

        'search' => array(
            'type' => 'like',
            'field' => array('id','role_name','role_desc')
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

        $this->table('retailer_employee_roles');
        $this->displayField('role_name');
        $this->primaryKey('id');

        $this->belongsToMany('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_role_id',
            'targetForeignKey' => 'retailer_employee_id',
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
            ->requirePresence('role_name', 'create')
            ->notEmpty('role_name');

        $validator
            ->allowEmpty('role_desc');

        return $validator;
    }
}
