<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetaileremployeesMessages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\BelongsTo $Messages
 *
 * @method \App\Model\Entity\RetaileremployeesMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetaileremployeesMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesMessage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetaileremployeesMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesMessage findOrCreate($search, callable $callback = null, $options = [])
 */
class RetaileremployeesMessagesTable extends Table
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

        $this->table('retaileremployees_messages');
        $this->displayField('retailerEmployee_id');
        $this->primaryKey(['retailerEmployee_id', 'message_id']);

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'retailerEmployee_id',
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
        $rules->add($rules->existsIn(['retailerEmployee_id'], 'Retaileremployees'));
        $rules->add($rules->existsIn(['message_id'], 'Messages'));

        return $rules;
    }
}
