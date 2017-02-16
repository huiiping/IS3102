<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transferorderitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\BelongsTo $Transferorders
 * @property \Cake\ORM\Association\BelongsTo $Promotions
 *
 * @method \App\Model\Entity\Transferorderitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transferorderitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transferorderitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transferorderitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transferorderitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transferorderitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transferorderitem findOrCreate($search, callable $callback = null, $options = [])
 */
class TransferorderitemsTable extends Table
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

        $this->table('transferorderitems');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
        ]);
        $this->belongsTo('Transferorders', [
            'foreignKey' => 'transferOrder_id'
        ]);
        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id'
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
            ->allowEmpty('ECP');

        $validator
            ->allowEmpty('barcode');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['transferOrder_id'], 'Transferorders'));
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'));

        return $rules;
    }
}
