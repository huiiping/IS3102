<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetaileremployeesEmployeeroles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\BelongsTo $Employeeroles
 *
 * @method \App\Model\Entity\RetaileremployeesEmployeerole get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetaileremployeesEmployeerole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesEmployeerole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesEmployeerole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetaileremployeesEmployeerole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesEmployeerole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesEmployeerole findOrCreate($search, callable $callback = null, $options = [])
 */
class RetaileremployeesEmployeerolesTable extends Table
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

        $this->table('retaileremployees_employeeroles');
        $this->displayField('retailerEmployee_id');
        $this->primaryKey(['retailerEmployee_id', 'employeeRole_id']);

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'retailerEmployee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Employeeroles', [
            'foreignKey' => 'employeeRole_id',
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
        $rules->add($rules->existsIn(['retailerEmployee_id'], 'Retaileremployees'));
        $rules->add($rules->existsIn(['employeeRole_id'], 'Employeeroles'));

        return $rules;
    }
}
