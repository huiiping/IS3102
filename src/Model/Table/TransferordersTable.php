<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transferorders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsToMany $Retaileremployees
 *
 * @method \App\Model\Entity\Transferorder get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transferorder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transferorder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transferorder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transferorder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transferorder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transferorder findOrCreate($search, callable $callback = null, $options = [])
 */
class TransferordersTable extends Table
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

        $this->table('transferorders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'locationFrom_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'locationTo_id'
        ]);
        $this->belongsToMany('Retaileremployees', [
            'foreignKey' => 'transferorder_id',
            'targetForeignKey' => 'retaileremployee_id',
            'joinTable' => 'retaileremployees_transferorders'
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
            ->integer('locationFrom')
            ->requirePresence('locationFrom', 'create')
            ->notEmpty('locationFrom');

        $validator
            ->integer('locationTo')
            ->requirePresence('locationTo', 'create')
            ->notEmpty('locationTo');

        $validator
            ->allowEmpty('trasnferStatus');

        $validator
            ->dateTime('trasferDate')
            ->allowEmpty('trasferDate');

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
        $rules->add($rules->existsIn(['locationFrom_id'], 'Locations'));
        $rules->add($rules->existsIn(['locationTo_id'], 'Locations'));

        return $rules;
    }
}
