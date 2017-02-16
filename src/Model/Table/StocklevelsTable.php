<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stocklevels Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Prodtypes
 *
 * @method \App\Model\Entity\Stocklevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stocklevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stocklevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stocklevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stocklevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stocklevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stocklevel findOrCreate($search, callable $callback = null, $options = [])
 */
class StocklevelsTable extends Table
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

        $this->table('stocklevels');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Prodtypes', [
            'foreignKey' => 'prodType_id'
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
            ->integer('minThresholdLevel')
            ->allowEmpty('minThresholdLevel');

        $validator
            ->boolean('triggered')
            ->allowEmpty('triggered');

        $validator
            ->allowEmpty('notificationMsg');

        $validator
            ->allowEmpty('receiver');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['prodType_id'], 'Prodtypes'));

        return $rules;
    }
}
