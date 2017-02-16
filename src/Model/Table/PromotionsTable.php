<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promotions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Item1s
 * @property \Cake\ORM\Association\BelongsTo $Item2s
 * @property \Cake\ORM\Association\BelongsTo $ProdType1s
 * @property \Cake\ORM\Association\BelongsTo $ProdType2s
 * @property \Cake\ORM\Association\BelongsTo $ProdCats
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\HasMany $Transferorderitems
 * @property \Cake\ORM\Association\BelongsToMany $Locations
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

        $this->belongsTo('Item1s', [
            'foreignKey' => 'item1_id'
        ]);
        $this->belongsTo('Item2s', [
            'foreignKey' => 'item2_id'
        ]);
        $this->belongsTo('ProdType1s', [
            'foreignKey' => 'prodType1_id'
        ]);
        $this->belongsTo('ProdType2s', [
            'foreignKey' => 'prodType2_id'
        ]);
        $this->belongsTo('ProdCats', [
            'foreignKey' => 'prodCat_id'
        ]);
        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->hasMany('Transferorderitems', [
            'foreignKey' => 'promotion_id'
        ]);
        $this->belongsToMany('Locations', [
            'foreignKey' => 'promotion_id',
            'targetForeignKey' => 'location_id',
            'joinTable' => 'locations_promotions'
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
        $rules->add($rules->existsIn(['item1_id'], 'Item1s'));
        $rules->add($rules->existsIn(['item2_id'], 'Item2s'));
        $rules->add($rules->existsIn(['prodType1_id'], 'ProdType1s'));
        $rules->add($rules->existsIn(['prodType2_id'], 'ProdType2s'));
        $rules->add($rules->existsIn(['prodCat_id'], 'ProdCats'));
        $rules->add($rules->existsIn(['employee_id'], 'Retaileremployees'));

        return $rules;
    }
}
