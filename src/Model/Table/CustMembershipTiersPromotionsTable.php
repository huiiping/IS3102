<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustMembershipTiersPromotions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CustMembershipTiers
 * @property \Cake\ORM\Association\BelongsTo $Promotions
 *
 * @method \App\Model\Entity\CustMembershipTiersPromotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustMembershipTiersPromotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustMembershipTiersPromotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustMembershipTiersPromotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustMembershipTiersPromotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustMembershipTiersPromotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustMembershipTiersPromotion findOrCreate($search, callable $callback = null, $options = [])
 */
class CustMembershipTiersPromotionsTable extends Table
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

        $this->table('cust_membership_tiers_promotions');
        $this->displayField('cust_membership_tier_id');
        $this->primaryKey(['cust_membership_tier_id', 'promotion_id']);

        $this->belongsTo('CustMembershipTiers', [
            'foreignKey' => 'cust_membership_tier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id',
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
        $rules->add($rules->existsIn(['cust_membership_tier_id'], 'CustMembershipTiers'));
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'));

        return $rules;
    }
}
