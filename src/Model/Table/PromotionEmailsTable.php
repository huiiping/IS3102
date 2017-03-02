<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PromotionEmails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Promotions
 * @property \Cake\ORM\Association\BelongsTo $CustMembershipTiers
 *
 * @method \App\Model\Entity\PromotionEmail get($primaryKey, $options = [])
 * @method \App\Model\Entity\PromotionEmail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PromotionEmail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PromotionEmail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PromotionEmail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PromotionEmail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PromotionEmail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PromotionEmailsTable extends Table
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

        $this->table('promotion_emails');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id'
        ]);
        $this->belongsTo('CustMembershipTiers', [
            'foreignKey' => 'cust_membership_tier_id'
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('body');

        $validator
            ->dateTime('last_sent')
            ->allowEmpty('last_sent');

        $validator
            ->integer('number_of_sends')
            ->allowEmpty('number_of_sends');

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
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'));
        $rules->add($rules->existsIn(['cust_membership_tier_id'], 'CustMembershipTiers'));

        return $rules;
    }
}
