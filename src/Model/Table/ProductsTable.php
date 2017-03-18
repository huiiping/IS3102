<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ProdCats
 * @property \Cake\ORM\Association\BelongsToMany $ProdSpecifications
 * @property \Cake\ORM\Association\BelongsToMany $Promotions
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsTable extends Table
{


    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'prod_name' => array(
            'type' => 'like',
            'field' => 'prod_name'
        ),
        'prod_desc' => array(
            'type' => 'like',
            'field' => 'prod_desc'
        ),
        'store_unit_price' => array(
            'type' => 'like',
            'field' => 'store_unit_price'
        ),
        'web_store_unit_price' => array(
            'type' => 'like',
            'field' => 'web_store_unit_price',
            'method' => 'findByActions'
        ),
        'SKU' => array(
            'type' => 'like',
            'field' => 'SKU',
            'method' => 'findByActions'
        ),
        'search' => array(
            'type' => 'like',
            'field' => array('id','prod_name','prod_desc','SKU','store_unit_price','web_store_unit_price'),
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

        $this->table('products');
        $this->displayField('prod_name');
        $this->primaryKey('id');

        $this->belongsTo('ProdCats', [
            'foreignKey' => 'prod_cat_id'
        ]);
        $this->belongsToMany('ProdSpecifications', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'prod_specification_id',
            'joinTable' => 'products_prod_specifications'
        ]);
        $this->belongsToMany('Promotions', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'promotion_id',
            'joinTable' => 'promotions_products'
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
            ->allowEmpty('prod_name');

        $validator
            ->allowEmpty('prod_desc');

        $validator
            ->numeric('store_unit_price')
            ->allowEmpty('store_unit_price');

        $validator
            ->numeric('web_store_unit_price')
            ->allowEmpty('web_store_unit_price');

        $validator
            ->allowEmpty('SKU');

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
        $rules->add($rules->existsIn(['prod_cat_id'], 'ProdCats'));

        return $rules;
    }
}
