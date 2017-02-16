<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PromotionsProdtypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Promotions
 * @property \Cake\ORM\Association\BelongsTo $Prodtypes
 *
 * @method \App\Model\Entity\PromotionsProdtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\PromotionsProdtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PromotionsProdtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProdtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PromotionsProdtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProdtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PromotionsProdtype findOrCreate($search, callable $callback = null, $options = [])
 */
class PromotionsProdtypesTable extends Table
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

        $this->table('promotions_prodtypes');
        $this->displayField('promotion_id');
        $this->primaryKey(['promotion_id', 'prodtype_id']);

        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Prodtypes', [
            'foreignKey' => 'prodtype_id',
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
        $rules->add($rules->existsIn(['prodtype_id'], 'Prodtypes'));

        return $rules;
    }
}
