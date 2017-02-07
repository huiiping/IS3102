<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productcategory Model
 *
 * @method \App\Model\Entity\Productcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Productcategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Productcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Productcategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Productcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Productcategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Productcategory findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductcategoryTable extends Table
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

        $this->table('productcategory');
        $this->displayField('productCatId');
        $this->primaryKey('productCatId');
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
            ->integer('productCatId')
            ->allowEmpty('productCatId', 'create');

        $validator
            ->allowEmpty('productName');

        $validator
            ->allowEmpty('productDesc');

        return $validator;
    }
}
