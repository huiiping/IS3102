<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetaileremployeesRetaileremployeeroles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployeeroles
 *
 * @method \App\Model\Entity\RetaileremployeesRetaileremployeerole get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetaileremployeesRetaileremployeerole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesRetaileremployeerole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesRetaileremployeerole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetaileremployeesRetaileremployeerole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesRetaileremployeerole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetaileremployeesRetaileremployeerole findOrCreate($search, callable $callback = null, $options = [])
 */
class RetaileremployeesRetaileremployeerolesTable extends Table
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

        $this->table('retaileremployees_retaileremployeeroles');
        $this->displayField('retailerEmployee_id');
        $this->primaryKey(['retailerEmployee_id', 'retailerEmployeeRoles_id']);

        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'retailerEmployee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Retaileremployeeroles', [
            'foreignKey' => 'retailerEmployeeRoles_id',
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
        $rules->add($rules->existsIn(['retailerEmployeeRoles_id'], 'Retaileremployeeroles'));

        return $rules;
    }
}
