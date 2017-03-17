<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promotions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 * @property \Cake\ORM\Association\BelongsToMany $Customers
 * @property \Cake\ORM\Association\BelongsToMany $ProdTypes
 *
 * @method \App\Model\Entity\Promotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Promotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion findOrCreate($search, callable $callback = null, $options = [])
 */
class PromotionsTable extends Table
{
    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'start_date' => array(
            'type' => 'like',
            'field' => 'start_date'
        ),
        'end_date' => array(
            'type' => 'like',
            'field' => 'end_date'
        ),
        'promo_desc' => array(
            'type' => 'like',
            'field' => 'promo_desc'
        ),
        'first_voucher_num' => array(
            'type' => 'like',
            'field' => 'first_voucher_num'
        ),
        'last_voucher_num' => array(
            'type' => 'like',
            'field' => 'last_voucher_num'
        ),
        'discount_rate' => array(
            'type' => 'like',
            'field' => 'discount_rate'
        ),
        'credit_card_type' => array(
            'type' => 'like',
            'field' => 'credit_card_type'
        ),
        'cust_membership_tier_id' => array(
            'type' => 'like',
            'field' => 'custMembershipTiers.id',
            'method' => 'findByActions'
        ),
        'retailer_employee_id' => array(
            'type' => 'like',
            'field' => 'RetailerEmployees.first_name',
            'method' => 'findByActions'
        ),
        'search' => array(
            'type' => 'like',
            'field' => array('id','promo_desc','first_voucher_num','last_voucher_num', 'credit_card_type','discount_rate','RetailerEmployees.first_name'),
            'method' => 'findByActions'
        )

    );
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('promotions');
        $this->displayField('promo_desc');
        $this->primaryKey('id');

        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->belongsToMany('CustMembershipTiers', [
            'foreignKey' => 'promotion_id',
            'targetForeignKey' => 'cust_membership_tier_id',
            'joinTable' => 'cust_membership_tiers_promotions'
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'promotion_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'promotions_products'
        ]);
        $this->addBehavior('Searchable');
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
            ->dateTime('start_date')
            ->allowEmpty('start_date');

        $validator
            ->dateTime('end_date')
            ->allowEmpty('end_date');

        $validator
            ->allowEmpty('promo_name')
            ->notEmpty('promo_name')
            ->add('promo_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('promo_desc');

        $validator
            ->allowEmpty('first_voucher_num');

        $validator
            ->allowEmpty('last_voucher_num');

        $validator
            ->numeric('discount_rate')
            ->allowEmpty('discount_rate');

        $validator
            ->allowEmpty('credit_card_type');

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
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));

        return $rules;
    }
}
