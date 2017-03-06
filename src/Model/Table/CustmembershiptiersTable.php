<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustMembershipTiers Model
 *
 * @property \Cake\ORM\Association\HasMany $Customers
 *
 * @method \App\Model\Entity\CustMembershipTier get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustMembershipTier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustMembershipTier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustMembershipTier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustMembershipTier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustMembershipTier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustMembershipTier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustMembershipTiersTable extends Table
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

        $this->table('cust_membership_tiers');
        $this->displayField('tier_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Customers', [
            'foreignKey' => 'cust_membership_tier_id'
        ]);

        $this->belongsToMany('Promotions', [
            'foreignKey' => 'cust_membership_tier_id',
            'targetForeignKey' => 'promotion_id',
            'joinTable' => 'cust_membership_tiers_promotions'
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
            ->requirePresence('tier_name', 'create')
            ->notEmpty('tier_name');

        $validator
            ->integer('validity_period')
            ->requirePresence('validity_period', 'create')
            ->notEmpty('validity_period');

        $validator
            ->allowEmpty('min_spending');

        $validator
            ->allowEmpty('membership_fee');

        $validator
            ->integer('membership_pts')
            ->allowEmpty('membership_pts');

        $validator
            ->integer('redemption_pts')
            ->allowEmpty('redemption_pts');

        $validator
            ->allowEmpty('discount_rate');

        $validator
            ->allowEmpty('birthday_rate');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
