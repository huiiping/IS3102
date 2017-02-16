<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Intrasysemployeeroles Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Intrasysemployees
 *
 * @method \App\Model\Entity\Intrasysemployeerole get($primaryKey, $options = [])
 * @method \App\Model\Entity\Intrasysemployeerole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Intrasysemployeerole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Intrasysemployeerole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Intrasysemployeerole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Intrasysemployeerole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Intrasysemployeerole findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IntrasysemployeerolesTable extends Table
{
    public static function defaultConnectionName()
    {
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

        $this->table('intrasysemployeeroles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Intrasysemployees', [
            'foreignKey' => 'intrasysemployeerole_id',
            'targetForeignKey' => 'intrasysemployee_id',
            'joinTable' => 'intrasysemployees_intrasysemployeeroles'
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
            ->allowEmpty('roleName')
            ->add('roleName', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('roleDesc');

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
        $rules->add($rules->isUnique(['roleName']));

        return $rules;
    }
}
