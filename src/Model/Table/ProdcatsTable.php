<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prodcats Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 *
 * @method \App\Model\Entity\Prodcat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prodcat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prodcat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prodcat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prodcat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prodcat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prodcat findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdcatsTable extends Table
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

        $this->table('prodcats');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'employee_id'
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
            ->allowEmpty('catName');

        $validator
            ->allowEmpty('catDesc');

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
        $rules->add($rules->existsIn(['employee_id'], 'Retaileremployees'));

        return $rules;
    }
}
