<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustmembershiptiersRetaileremployees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Custmembershiptiers
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 *
 * @method \App\Model\Entity\CustmembershiptiersRetaileremployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustmembershiptiersRetaileremployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustmembershiptiersRetaileremployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustmembershiptiersRetaileremployee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustmembershiptiersRetaileremployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustmembershiptiersRetaileremployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustmembershiptiersRetaileremployee findOrCreate($search, callable $callback = null, $options = [])
 */
class CustmembershiptiersRetaileremployeesTable extends Table
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

        $this->table('custmembershiptiers_retaileremployees');
        $this->displayField('custMembershipTier_id');
        $this->primaryKey(['custMembershipTier_id', 'retailerEmployee_id']);

        $this->belongsTo('Custmembershiptiers', [
            'foreignKey' => 'custMembershipTier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'retailerEmployee_id',
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
        $rules->add($rules->existsIn(['custMembershipTier_id'], 'Custmembershiptiers'));
        $rules->add($rules->existsIn(['retailerEmployee_id'], 'Retaileremployees'));

        return $rules;
    }
}
