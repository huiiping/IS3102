<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employeerole Model
 *
 * @method \App\Model\Entity\Employeerole get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employeerole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employeerole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employeerole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeeroleTable extends Table
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

        $this->table('employeerole');
        $this->displayField('employeeRoleId');
        $this->primaryKey('employeeRoleId');
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
            ->integer('employeeRoleId')
            ->allowEmpty('employeeRoleId', 'create');

        $validator
            ->allowEmpty('roleName');

        $validator
            ->allowEmpty('roleDesc');

        return $validator;
    }
}
