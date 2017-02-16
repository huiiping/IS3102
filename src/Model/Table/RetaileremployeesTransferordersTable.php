<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetaileremployeesTransferorders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\BelongsTo $Transferorders
 *
 * @method \App\Model\Entity\RetaileremployeesTransferorder get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransferorder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransferorder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransferorder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransferorder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransferorder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesTransferorder findOrCreate($search, callable $callback = null, $options = [])
 */
class RetaileremployeesTransferordersTable extends Table
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

        $this->table('retaileremployees_transferorders');
        $this->displayField('retailerEmployee_id');
        $this->primaryKey(['retailerEmployee_id', 'transferOrder_id']);

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'retailerEmployee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Transferorders', [
            'foreignKey' => 'transferOrder_id',
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
        $rules->add($rules->existsIn(['transferOrder_id'], 'Transferorders'));

        return $rules;
    }
}
