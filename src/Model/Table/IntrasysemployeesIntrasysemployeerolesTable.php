<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IntrasysemployeesIntrasysemployeeroles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Intrasysemployees
 * @property \Cake\ORM\Association\BelongsTo $Intrasysemployeeroles
 *
 * @method \App\Model\Entity\IntrasysemployeesIntrasysemployeerole get($primaryKey, $options = [])
 * @method \App\Model\Entity\IntrasysemployeesIntrasysemployeerole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IntrasysemployeesIntrasysemployeerole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysemployeesIntrasysemployeerole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IntrasysemployeesIntrasysemployeerole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysemployeesIntrasysemployeerole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysemployeesIntrasysemployeerole findOrCreate($search, callable $callback = null, $options = [])
 */
class IntrasysemployeesIntrasysemployeerolesTable extends Table
{
    public static function defaultConnectionName()
    {
        return 'intrasysdb';
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

        $this->table('intrasysemployees_intrasysemployeeroles');
        $this->displayField('intrasysEmployee_id');
        $this->primaryKey(['intrasysEmployee_id', 'intrasysEmployeeRole_id']);

        $this->belongsTo('Intrasysemployees', [
            'foreignKey' => 'intrasysEmployee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Intrasysemployeeroles', [
            'foreignKey' => 'intrasysEmployeeRole_id',
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
        $rules->add($rules->existsIn(['intrasysEmployee_id'], 'Intrasysemployees'));
        $rules->add($rules->existsIn(['intrasysEmployeeRole_id'], 'Intrasysemployeeroles'));

        return $rules;
    }
}
