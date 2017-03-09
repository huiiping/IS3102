<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PromotionsProducts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Promotions
 * @property \Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\PromotionsProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\PromotionsProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PromotionsProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PromotionsProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class PromotionsProductsTable extends Table
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

        $this->table('promotions_products');
        $this->displayField('promotion_id');
        $this->primaryKey(['promotion_id', 'product_id']);

        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
