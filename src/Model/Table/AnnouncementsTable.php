<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Announcements Model
 *
 * @method \App\Model\Entity\Announcement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Announcement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Announcement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Announcement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Announcement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Announcement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Announcement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnnouncementsTable extends Table
{
    public static function defaultConnectionName() {
        return 'intrasysdb';
    }

    public $filterArgs = array(
        'title' => array(
            'type' => 'like',
            'field' => 'title'
        ),
        'search' => array(
            'type' => 'like',
            'field' => array('title','message','remarks','id')
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

        $this->table('announcements');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->allowEmpty('remarks');

        return $validator;
    }
}
