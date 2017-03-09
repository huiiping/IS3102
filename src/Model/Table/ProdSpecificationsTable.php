<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdSpecifications Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Products
 *
 * @method \App\Model\Entity\ProdSpecification get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdSpecification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProdSpecification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdSpecification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdSpecification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdSpecification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdSpecification findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdSpecificationsTable extends Table
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

        $this->table('prod_specifications');
        $this->displayField('title');
        $this->primaryKey('title');

        $this->belongsToMany('Products', [
            'foreignKey' => 'prod_specification_title',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'products_prod_specifications'
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
            ->allowEmpty('title', 'create');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
