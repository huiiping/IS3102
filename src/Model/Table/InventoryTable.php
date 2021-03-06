<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventory Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ProdTypes
 * @property \Cake\ORM\Association\BelongsTo $Sections
 * @property \Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\Inventory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inventory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inventory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inventory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inventory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inventory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inventory findOrCreate($search, callable $callback = null, $options = [])
 */
class InventoryTable extends Table
{



    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'product_id' => array(
            'type' => 'like',
            'field' => 'Products.prod_name'
        ),
        'SKU' => array(
            'type' => 'like',
            'field' => 'SKU'
        ),
        'quantity' => array(
            'type' => 'like',
            'field' => 'quantity'
        ),
        'section_id' => array(
            'type' => 'like',
            'field' => 'Sections.sec_name',
             'method' => 'findByActions'
        ),
        'location_id' => array(
            'type' => 'like',
            'field' => 'Locations.name',
            'method' => 'findByActions'
        ),
        'search' => array(
            'type' => 'like',
            'field' => array('id','Products.prod_name','SKU','quantity','Sections.sec_name','Locations.name'),
            'method' => 'findByActions'
        )

    );
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('inventory');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sections', [
            'foreignKey' => 'section_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
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
            ->requirePresence('SKU', 'create')
            ->notEmpty('SKU');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['section_id'], 'Sections'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
