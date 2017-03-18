<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IntrasysLoggings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retailers
 *
 * @method \App\Model\Entity\IntrasysLogging get($primaryKey, $options = [])
 * @method \App\Model\Entity\IntrasysLogging newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IntrasysLogging[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysLogging|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IntrasysLogging patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysLogging[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IntrasysLogging findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IntrasysLoggingsTable extends Table
{
    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'retailer_id' => array(
            'type' => 'like',
            'field' => 'Retailers.retailer_name'
        ),
        'action' => array(
            'type' => 'like',
            'field' => 'action'
        ),
        'entity' => array(
            'type' => 'like',
            'field' => 'entity'
        ),
        'entityid' => array(
            'type' => 'like',
            'field' => 'entityid'
        ),
        'employeeid' => array(
            'type' => 'like',
            'field' => 'employeeid'
        ),
        'created' => array(
            'type' => 'like',
            'field' => 'created'
        ),
        'search' => array(
            'type' => 'like',
            'field' => array('action','entity','entityid', 'employeeid','Retailers.retailer_name'),
            'method' => 'findByActions'
        )
    );
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */

    public static function defaultConnectionName() {
        return 'intrasysdb';
    }
    
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('intrasys_loggings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Retailers', [
            'foreignKey' => 'retailer_id'
        ]);
        $this->addBehavior('Searchable');
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
            ->allowEmpty('action');

        $validator
            ->allowEmpty('entity');

        $validator
            ->integer('entityid')
            ->allowEmpty('entityid');

        $validator
            ->integer('employeeid')
            ->requirePresence('employeeid', 'create')
            ->notEmpty('employeeid');

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
        $rules->add($rules->existsIn(['retailer_id'], 'Retailers'));

        return $rules;
    }
}
