<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Producttype Model
 *
 * @method \App\Model\Entity\Producttype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Producttype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Producttype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Producttype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Producttype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Producttype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Producttype findOrCreate($search, callable $callback = null, $options = [])
 */
class ProducttypeTable extends Table
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

        $this->table('producttype');
        $this->displayField('productTypeId');
        $this->primaryKey('productTypeId');
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
            ->integer('productTypeId')
            ->allowEmpty('productTypeId', 'create');

        $validator
            ->allowEmpty('productTypeName');

        $validator
            ->allowEmpty('productTypeDesc');

        $validator
            ->allowEmpty('colour');

        $validator
            ->allowEmpty('dimension');

        $validator
            ->numeric('storePrice')
            ->allowEmpty('storePrice');

        $validator
            ->numeric('webstorePrice')
            ->allowEmpty('webstorePrice');

        $validator
            ->allowEmpty('SKU');

        $validator
            ->integer('locationId')
            ->allowEmpty('locationId');

        $validator
            ->integer('productCategoryId')
            ->allowEmpty('productCategoryId');

        $validator
            ->integer('column_11')
            ->allowEmpty('column_11');

        return $validator;
    }
}
