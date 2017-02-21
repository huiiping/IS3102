<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loggings Model
 *
 * @method \App\Model\Entity\Logging get($primaryKey, $options = [])
 * @method \App\Model\Entity\Logging newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Logging[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Logging|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Logging patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Logging[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Logging findOrCreate($search, callable $callback = null, $options = [])
 */
class LoggingsTable extends Table
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

        $this->table('loggings');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('type');

        $validator
            ->integer('entity_num')
            ->allowEmpty('entity_num');

        return $validator;
    }
}
