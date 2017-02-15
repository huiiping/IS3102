<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \Cake\ORM\Association\HasMany $Items
 * @property \Cake\ORM\Association\HasMany $Retaileremployees
 * @property \Cake\ORM\Association\HasMany $Sections
 * @property \Cake\ORM\Association\HasMany $Stocklevels
 * @property \Cake\ORM\Association\HasMany $Transactions
 * @property \Cake\ORM\Association\BelongsToMany $Promotions
 *
 * @method \App\Model\Entity\Location get($primaryKey, $options = [])
 * @method \App\Model\Entity\Location newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Location[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Location|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Location[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Location findOrCreate($search, callable $callback = null, $options = [])
 */
class LocationsTable extends Table
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

        $this->table('locations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Items', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Retaileremployees', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Sections', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Stocklevels', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsToMany('Promotions', [
            'foreignKey' => 'location_id',
            'targetForeignKey' => 'promotion_id',
            'joinTable' => 'locations_promotions'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('address');

        $validator
            ->integer('contact')
            ->allowEmpty('contact');

        $validator
            ->allowEmpty('type');

        return $validator;
    }
}
