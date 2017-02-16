<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Incidentreports Model
 *
 * @property \Cake\ORM\Association\BelongsTo $References
 * @property \Cake\ORM\Association\BelongsTo $Retaileremployees
 *
 * @method \App\Model\Entity\Incidentreport get($primaryKey, $options = [])
 * @method \App\Model\Entity\Incidentreport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Incidentreport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Incidentreport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Incidentreport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Incidentreport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Incidentreport findOrCreate($search, callable $callback = null, $options = [])
 */
class IncidentreportsTable extends Table
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

        $this->table('incidentreports');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('References', [
            'foreignKey' => 'reference_id'
        ]);
        $this->belongsTo('Retaileremployees', [
            'foreignKey' => 'employee_id'
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
            ->allowEmpty('title');

        $validator
            ->dateTime('dateCreated')
            ->allowEmpty('dateCreated');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['reference_id'], 'References'));
        $rules->add($rules->existsIn(['employee_id'], 'Retaileremployees'));

        return $rules;
    }
}
