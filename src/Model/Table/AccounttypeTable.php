<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accounttype Model
 *
 * @method \App\Model\Entity\Accounttype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accounttype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Accounttype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accounttype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accounttype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accounttype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accounttype findOrCreate($search, callable $callback = null, $options = [])
 */
class AccounttypeTable extends Table
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

        $this->table('accounttype');
        $this->displayField('accountId');
        $this->primaryKey('accountId');
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
            ->integer('accountId')
            ->allowEmpty('accountId', 'create');

        $validator
            ->allowEmpty('accountTypeName');

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
            ->integer('numOfProductTypes')
            ->allowEmpty('numOfProductTypes');

        return $validator;
    }
}
