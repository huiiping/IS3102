<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deliveryorders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Transactions
 *
 * @method \App\Model\Entity\Deliveryorder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Deliveryorder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Deliveryorder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Deliveryorder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Deliveryorder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Deliveryorder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Deliveryorder findOrCreate($search, callable $callback = null, $options = [])
 */
class DeliveryordersTable extends Table
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

        $this->table('deliveryorders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Transactions', [
            'foreignKey' => 'transaction_id'
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
            ->allowEmpty('deliveryStatus');

        $validator
            ->numeric('deliveryCharge')
            ->allowEmpty('deliveryCharge');

        $validator
            ->dateTime('expectedDeliveryDate')
            ->allowEmpty('expectedDeliveryDate');

        $validator
            ->dateTime('actualDeliveryDate')
            ->allowEmpty('actualDeliveryDate');

        $validator
            ->allowEmpty('deliverer');

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
        $rules->add($rules->existsIn(['transaction_id'], 'Transactions'));

        return $rules;
    }
}
