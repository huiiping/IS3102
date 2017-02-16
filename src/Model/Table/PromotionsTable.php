<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promotions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\BelongsToMany $Customers
 * @property \Cake\ORM\Association\BelongsToMany $Prodtypes
 *
 * @method \App\Model\Entity\Promotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Promotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion findOrCreate($search, callable $callback = null, $options = [])
 */
class PromotionsTable extends Table
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

        $this->table('promotions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'retailerEmployee_id'
        ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'promotion_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'customers_promotions'
        ]);
        $this->belongsToMany('Prodtypes', [
            'foreignKey' => 'promotion_id',
            'targetForeignKey' => 'prodtype_id',
            'joinTable' => 'promotions_prodtypes'
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
            ->dateTime('startDate')
            ->allowEmpty('startDate');

        $validator
            ->dateTime('endDate')
            ->allowEmpty('endDate');

        $validator
            ->allowEmpty('promoDesc');

        $validator
            ->allowEmpty('firstVouherNo');

        $validator
            ->allowEmpty('lastVoucherNo');

        $validator
            ->numeric('discountRate')
            ->allowEmpty('discountRate');

        $validator
            ->allowEmpty('creditCardType');

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
        $rules->add($rules->existsIn(['retailerEmployee_id'], 'Retaileremployees'));

        return $rules;
    }
}
