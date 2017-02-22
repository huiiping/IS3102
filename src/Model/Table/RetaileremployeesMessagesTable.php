<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerEmployeesMessages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 * @property \Cake\ORM\Association\BelongsTo $Messages
 *
 * @method \App\Model\Entity\RetailerEmployeesMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerEmployeesMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeesMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeesMessage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerEmployeesMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeesMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerEmployeesMessage findOrCreate($search, callable $callback = null, $options = [])
 */
class RetailerEmployeesMessagesTable extends Table
{
    public static function defaultConnectionName()
    {
        return 'retailerdb';
    }
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('retailer_employees_messages');
        $this->displayField('retailer_employee_id');
        $this->primaryKey(['retailer_employee_id', 'message_id']);

        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Messages', [
            'foreignKey' => 'message_id',
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
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));
        $rules->add($rules->existsIn(['message_id'], 'Messages'));

        return $rules;
    }
}
