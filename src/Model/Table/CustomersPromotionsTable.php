<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomersPromotions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Promotions
 *
 * @method \App\Model\Entity\CustomersPromotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomersPromotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomersPromotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomersPromotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomersPromotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomersPromotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomersPromotion findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersPromotionsTable extends Table
{
    public static function defaultConnectionName()
    {
        return 'retailerdb';
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

        $this->table('customers_promotions');
        $this->displayField('customer_id');
        $this->primaryKey(['customer_id', 'promotion_id']);

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'));

        return $rules;
    }
}
