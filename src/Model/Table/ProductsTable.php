<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    public $filterArgs = array(
        'search' => array(
            'type' => 'like',
            'field' => array('prod_name','store_unit_price','web_store_unit_price','SKU')
            )
    );

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('products');
        $this->displayField('prod_name');
        $this->primaryKey('id');

        $this->belongsTo('ProdCats', [
            'foreignKey' => 'prod_cat_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Feedbacks', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Inventory', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('StockLevels', [
            'foreignKey' => 'product_id'
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
        $this->addBehavior('Searchable');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('prod_name', 'create')
            ->notEmpty('prod_name')
            ->add('prod_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('prod_desc', 'create')
            ->notEmpty('prod_desc');

        $validator
            ->numeric('store_unit_price')
            ->allowEmpty('store_unit_price');

        $validator
            ->numeric('web_store_unit_price')
            ->allowEmpty('web_store_unit_price');

        $validator
            ->requirePresence('SKU', 'create')
            ->notEmpty('SKU')
            ->add('SKU', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('barcode');

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
        $rules->add($rules->isUnique(['prod_name']));
        $rules->add($rules->isUnique(['SKU']));
        $rules->add($rules->existsIn(['prod_cat_id'], 'ProdCats'));

        return $rules;
    }
}
