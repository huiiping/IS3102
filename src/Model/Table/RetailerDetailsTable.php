<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerDetails Model
 *
 * @method \App\Model\Entity\RetailerDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class RetailerDetailsTable extends Table
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

        $this->table('retailer_details');
        $this->displayField('retailerid');
        $this->primaryKey('retailerid');
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
            ->integer('retailerid')
            ->allowEmpty('retailerid', 'create');

        $validator
            ->requirePresence('retailer_name', 'create')
            ->notEmpty('retailer_name');

        $validator
            ->allowEmpty('retailer_desc');

        $validator
            ->requirePresence('retailer_email', 'create')
            ->notEmpty('retailer_email');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        return $validator;
    }
}
