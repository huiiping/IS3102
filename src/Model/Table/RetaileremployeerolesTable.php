<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Retaileremployeeroles Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Retaileremployees
 *
 * @method \App\Model\Entity\Retaileremployeerole get($primaryKey, $options = [])
 * @method \App\Model\Entity\Retaileremployeerole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Retaileremployeerole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Retaileremployeerole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Retaileremployeerole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Retaileremployeerole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Retaileremployeerole findOrCreate($search, callable $callback = null, $options = [])
 */
class RetaileremployeerolesTable extends Table
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

        $this->table('retaileremployeeroles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Retaileremployees', [
            'foreignKey' => 'retaileremployeerole_id',
            'targetForeignKey' => 'retaileremployee_id',
            'joinTable' => 'retaileremployees_retaileremployeeroles'
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
            ->requirePresence('roleName', 'create')
            ->notEmpty('roleName');

        $validator
            ->allowEmpty('roleDesc');

        return $validator;
    }
}
