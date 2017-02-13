<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Intrasysemployees Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Announcements
 * @property \Cake\ORM\Association\BelongsToMany $Employeeroles
 *
 * @method \App\Model\Entity\Intrasysemployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Intrasysemployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Intrasysemployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Intrasysemployee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Intrasysemployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Intrasysemployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Intrasysemployee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IntrasysemployeesTable extends Table
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

        $this->table('intrasysemployees');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Announcements', [
            'foreignKey' => 'intrasysemployee_id',
            'targetForeignKey' => 'announcement_id',
            'joinTable' => 'intrasysemployees_announcements'
        ]);
        $this->belongsToMany('Employeeroles', [
            'foreignKey' => 'intrasysemployee_id',
            'targetForeignKey' => 'employeerole_id',
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->boolean('activation_status')
            ->allowEmpty('activation_status');

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
            ->integer('contact')
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

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
