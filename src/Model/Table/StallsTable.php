<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stalls Model
 *
 * @property \App\Model\Table\FoodTypesTable|\Cake\ORM\Association\BelongsTo $FoodTypes
 * @property \App\Model\Table\ReservationsTable|\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\Stall get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stall newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stall[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stall|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stall patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stall[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stall findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StallsTable extends Table
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

        $this->setTable('stalls');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('FoodTypes');
        $this->hasMany('Reservations');
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
            ->scalar('description')
            //->requirePresence('description', 'create')
            ->allowEmpty('description');

        $validator
            ->decimal('rating')
            //->requirePresence('rating', 'create')
            ->allowEmpty('rating');

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
        $rules->add($rules->existsIn(['food_type_id'], 'FoodTypes'));

        return $rules;
    }
}
