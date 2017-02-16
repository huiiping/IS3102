<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Prodtypes
 * @property \Cake\ORM\Association\BelongsTo $Sections
 * @property \Cake\ORM\Association\HasMany $Deliveryorderitems
 * @property \Cake\ORM\Association\HasMany $Sections
 * @property \Cake\ORM\Association\HasMany $Transactionitems
 * @property \Cake\ORM\Association\HasMany $Transferorderitems
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsTable extends Table
{


    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'itemName' => array(
            'type' => 'like',
            'field' => 'itemName'
        ),
        'itemDesc' => array(
            'type' => 'like',
            'field' => 'itemDesc'
        ),
        'EPC' => array(
            'type' => 'like',
            'field' => 'EPC'
        ),
        'barcode' => array(
            'type' => 'like',
            'field' => 'barcode'
        ),
        'itemStatus' => array(
            'type' => 'like',
            'field' => 'itemStatus'
        ),
        'defective' => array(
            'type' => 'like',
            'field' => 'defective'
        ),
        'location_id' => array(
            'type' => 'like',
            'field' => 'location_id'
        ),
        'prodType_id' => array(
            'type' => 'like',
            'field' => 'prodType_id'
        ),
        'section_id' => array(
            'type' => 'like',
            'field' => 'section_id'
        ));

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('items');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Prodtypes', [
            'foreignKey' => 'prodType_id'
        ]);
        $this->belongsTo('Sections', [
            'foreignKey' => 'section_id'
        ]);
        $this->hasMany('Deliveryorderitems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Sections', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Transactionitems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Transferorderitems', [
            'foreignKey' => 'item_id'
        ]);

        $this->addBehavior('Search.Searchable');
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
            ->allowEmpty('itemName');

        $validator
            ->allowEmpty('itemDesc');

        $validator
            ->allowEmpty('EPC');

        $validator
            ->allowEmpty('barcode');

        $validator
            ->allowEmpty('itemStatus');

        $validator
            ->boolean('defective')
            ->allowEmpty('defective');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['prodType_id'], 'Prodtypes'));
        $rules->add($rules->existsIn(['section_id'], 'Sections'));

        return $rules;
    }
}
