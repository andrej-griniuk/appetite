<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FoodTypes Model
 *
 * @property \App\Model\Table\StallsTable|\Cake\ORM\Association\HasMany $Stalls
 *
 * @method \App\Model\Entity\FoodType get($primaryKey, $options = [])
 * @method \App\Model\Entity\FoodType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FoodType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FoodType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FoodType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FoodType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FoodType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FoodTypesTable extends Table
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

        $this->setTable('food_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Stalls', [
            'foreignKey' => 'food_type_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('flag')
            //->requirePresence('flag', 'create')
            ->allowEmpty('flag');

        return $validator;
    }
}
