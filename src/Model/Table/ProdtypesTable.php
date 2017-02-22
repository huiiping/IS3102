<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ProdCats
 * @property \Cake\ORM\Association\HasMany $Inventory
 * @property \Cake\ORM\Association\BelongsToMany $Promotions
 *
 * @method \App\Model\Entity\ProdType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProdType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdType findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdTypesTable extends Table
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

        $this->table('prod_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('ProdCats', [
            'foreignKey' => 'prod_cat_id'
        ]);
        $this->hasMany('Inventory', [
            'foreignKey' => 'prod_type_id'
        ]);
        $this->belongsToMany('Promotions', [
            'foreignKey' => 'prod_type_id',
            'targetForeignKey' => 'promotion_id',
            'joinTable' => 'promotions_prod_types'
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
            ->allowEmpty('colour');

        $validator
            ->allowEmpty('dimension');

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
