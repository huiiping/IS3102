<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetaileremployeesSuppliermemos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\BelongsTo $Suppliermemos
 *
 * @method \App\Model\Entity\RetaileremployeesSuppliermemo get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetaileremployeesSuppliermemo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesSuppliermemo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesSuppliermemo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetaileremployeesSuppliermemo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesSuppliermemo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesSuppliermemo findOrCreate($search, callable $callback = null, $options = [])
 */
class RetaileremployeesSuppliermemosTable extends Table
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

        $this->table('retaileremployees_suppliermemos');
        $this->displayField('retailerEmployee_id');
        $this->primaryKey(['retailerEmployee_id', 'supplierMemo_id']);

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'retailerEmployee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Suppliermemos', [
            'foreignKey' => 'supplierMemo_id',
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
        $rules->add($rules->existsIn(['retailerEmployee_id'], 'Retaileremployees'));
        $rules->add($rules->existsIn(['supplierMemo_id'], 'Suppliermemos'));

        return $rules;
    }
}
