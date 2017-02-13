<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employeeroles Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Intrasysemployees
 *
 * @method \App\Model\Entity\Employeerole get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employeerole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employeerole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employeerole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employeerole findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Intrasysemployees', [
            'foreignKey' => 'employeerole_id',
            'targetForeignKey' => 'intrasysemployee_id',
            'joinTable' => 'intrasysemployees_employeeroles'
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
