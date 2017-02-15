<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employeeroles Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Retaileremployees
 *
 * @method \App\Model\Entity\Employeerole get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employeerole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employeerole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employeerole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeerolesTable extends Table
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

        $this->table('employeeroles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Retaileremployees', [
            'foreignKey' => 'employeerole_id',
            'targetForeignKey' => 'retaileremployee_id',
            'joinTable' => 'retaileremployees_employeeroles'
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
            ->requirePresence('roleName', 'create')
            ->notEmpty('roleName');

        $validator
            ->allowEmpty('roleDesc');

        return $validator;
    }
}
