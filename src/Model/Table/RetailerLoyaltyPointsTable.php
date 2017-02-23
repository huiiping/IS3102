<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerLoyaltyPoints Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retailers
 *
 * @method \App\Model\Entity\RetailerLoyaltyPoint get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerLoyaltyPoint newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerLoyaltyPoint[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerLoyaltyPoint|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerLoyaltyPoint patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerLoyaltyPoint[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerLoyaltyPoint findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RetailerLoyaltyPointsTable extends Table
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

        $this->table('retailer_loyalty_points');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Retailers', [
            'foreignKey' => 'retailer_id',
            'joinType' => 'INNER'
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
            ->integer('loyalty_pts')
            ->allowEmpty('loyalty_pts');

        $validator
            ->integer('redemption_pts')
            ->allowEmpty('redemption_pts');

        $validator
            ->allowEmpty('remarks');

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
        $rules->add($rules->existsIn(['retailer_id'], 'Retailers'));

        return $rules;
    }
}
