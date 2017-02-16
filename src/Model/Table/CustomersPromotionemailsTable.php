<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomersPromotionemails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Promotionemails
 *
 * @method \App\Model\Entity\CustomersPromotionemail get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomersPromotionemail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CustomersPromotionemail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomersPromotionemail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomersPromotionemail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomersPromotionemail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomersPromotionemail findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersPromotionemailsTable extends Table
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

        $this->table('customers_promotionemails');
        $this->displayField('customer_id');
        $this->primaryKey(['customer_id', 'promotionEmail_id']);

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Promotionemails', [
            'foreignKey' => 'promotionEmail_id',
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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['promotionEmail_id'], 'Promotionemails'));

        return $rules;
    }
}
