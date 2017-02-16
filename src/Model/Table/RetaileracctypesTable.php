<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Retaileracctypes Model
 *
 * @method \App\Model\Entity\Retaileracctype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Retaileracctype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Retaileracctype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Retaileracctype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Retaileracctype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Retaileracctype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Retaileracctype findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RetaileracctypesTable extends Table
{
    public static function defaultConnectionName()
    {
        return 'intrasysdb';
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

        $this->table('retaileracctypes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->allowEmpty('name');

        $validator
            ->integer('numOfUsers')
            ->allowEmpty('numOfUsers');

        $validator
            ->integer('numOfWarehouses')
            ->allowEmpty('numOfWarehouses');

        $validator
            ->integer('numOfStores')
            ->allowEmpty('numOfStores');

        $validator
            ->integer('numOfProdTypes')
            ->allowEmpty('numOfProdTypes');

        return $validator;
    }
}
