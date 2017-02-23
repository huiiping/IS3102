<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerInfo Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retailers
 *
 * @method \App\Model\Entity\RetailerInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerInfo findOrCreate($search, callable $callback = null, $options = [])
 */
class RetailerInfoTable extends Table
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

        $this->table('retailer_info');
        $this->displayField('retailer_id');
        $this->primaryKey('retailer_id');
        /*
        $this->belongsTo('Retailers', [
            'foreignKey' => 'retailer_id',
            'joinType' => 'INNER'
        ]);*/
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {   
        /*
        $rules->add($rules->existsIn(['retailer_id'], 'Retailers'));

        return $rules;*/
    }
}
