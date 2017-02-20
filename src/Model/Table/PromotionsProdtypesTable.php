<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PromotionsProdTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Promotions
 * @property \Cake\ORM\Association\BelongsTo $ProdTypes
 *
 * @method \App\Model\Entity\PromotionsProdType get($primaryKey, $options = [])
 * @method \App\Model\Entity\PromotionsProdType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PromotionsProdType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProdType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PromotionsProdType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProdType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProdType findOrCreate($search, callable $callback = null, $options = [])
 */
class PromotionsProdTypesTable extends Table
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

        $this->table('promotions_prod_types');
        $this->displayField('promotion_id');
        $this->primaryKey(['promotion_id', 'prod_type_id']);

        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProdTypes', [
            'foreignKey' => 'prod_type_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'));
        $rules->add($rules->existsIn(['prod_type_id'], 'ProdTypes'));

        return $rules;
    }
}
