<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Retaileremployees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsToMany $Custmembershiptiers
 * @property \Cake\ORM\Association\BelongsToMany $Customers
 * @property \Cake\ORM\Association\BelongsToMany $Employeeroles
 * @property \Cake\ORM\Association\BelongsToMany $Suppliermemos
 * @property \Cake\ORM\Association\BelongsToMany $Transactions
 * @property \Cake\ORM\Association\BelongsToMany $Transferorders
 *
 * @method \App\Model\Entity\Retaileremployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Retaileremployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Retaileremployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Retaileremployee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Retaileremployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Retaileremployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Retaileremployee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RetaileremployeesTable extends Table
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

        $this->table('retaileremployees');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsToMany('Custmembershiptiers', [
            'foreignKey' => 'retaileremployee_id',
            'targetForeignKey' => 'custmembershiptier_id',
            'joinTable' => 'custmembershiptiers_retaileremployees'
        ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'retaileremployee_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'customers_retaileremployees'
        ]);
        $this->belongsToMany('Employeeroles', [
            'foreignKey' => 'retaileremployee_id',
            'targetForeignKey' => 'employeerole_id',
            'joinTable' => 'retaileremployees_employeeroles'
        ]);
        $this->belongsToMany('Suppliermemos', [
            'foreignKey' => 'retaileremployee_id',
            'targetForeignKey' => 'suppliermemo_id',
            'joinTable' => 'retaileremployees_suppliermemos'
        ]);
        $this->belongsToMany('Transactions', [
            'foreignKey' => 'retaileremployee_id',
            'targetForeignKey' => 'transaction_id',
            'joinTable' => 'retaileremployees_transactions'
        ]);
        $this->belongsToMany('Transferorders', [
            'foreignKey' => 'retaileremployee_id',
            'targetForeignKey' => 'transferorder_id',
            'joinTable' => 'retaileremployees_transferorders'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->integer('contact')
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->requirePresence('firstName', 'create')
            ->notEmpty('firstName');

        $validator
            ->requirePresence('lastName', 'create')
            ->notEmpty('lastName');

        $validator
            ->boolean('activationStatus')
            ->allowEmpty('activationStatus');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
