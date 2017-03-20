<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdCats Model
 *
 * @property \Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\ProdCat get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdCat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProdCat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdCat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdCat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdCat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdCat findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdCatsTable extends Table
{

    public $filterArgs = array(
        'search' => array(
            'type' => 'like',
            'field' => 'cat_name','cat_desc','parentid')
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

        $this->table('prod_cats');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Products', [
            'foreignKey' => 'prod_cat_id'
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
            ->integer('parentid')
            ->allowEmpty('parentid');

        $validator
            ->requirePresence('cat_name', 'create')
            ->notEmpty('cat_name')
            ->add('cat_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('cat_desc');

        return $validator;
    }
}
