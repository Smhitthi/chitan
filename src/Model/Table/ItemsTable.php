<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ChatTable|\Cake\ORM\Association\HasMany $Chat
 * @property \App\Model\Table\FinishedItemTable|\Cake\ORM\Association\HasMany $FinishedItem
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

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('items');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Chat', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('FinishedItem', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'item_id'
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('image')
            ->maxLength('image', 100)
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->scalar('category')
            ->maxLength('category', 100)
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        $validator
            ->scalar('description')
            ->maxLength('description', 2000)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('release')
            ->maxLength('release', 30)
            ->requirePresence('release', 'create')
            ->notEmpty('release');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 2000)
            ->requirePresence('comment', 'create')
            ->notEmpty('comment');

        $validator
            ->dateTime('match_date')
            ->requirePresence('match_date', 'create')
            ->notEmpty('match_date');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
