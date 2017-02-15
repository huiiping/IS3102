<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prodtypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\BelongsTo $Prodcats
 *
 * @method \App\Model\Entity\Prodtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prodtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prodtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prodtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prodtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prodtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prodtype findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdtypesTable extends Table
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

        $this->table('prodtypes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->belongsTo('Prodcats', [
            'foreignKey' => 'prodCat_id'
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
            ->allowEmpty('prodName');

        $validator
            ->allowEmpty('prodDesc');

        $validator
            ->allowEmpty('colour');

        $validator
            ->allowEmpty('dimension');

        $validator
            ->numeric('storeUnitPrice')
            ->allowEmpty('storeUnitPrice');

        $validator
            ->numeric('webStoreUnitPrice')
            ->allowEmpty('webStoreUnitPrice');

        $validator
            ->allowEmpty('SKU');

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
        $rules->add($rules->existsIn(['prodCat_id'], 'Prodcats'));

        return $rules;
    }
}
