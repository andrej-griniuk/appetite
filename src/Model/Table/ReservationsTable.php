<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservations Model
 *
 * @property \App\Model\Table\SpotsTable|\Cake\ORM\Association\BelongsTo $Spots
 * @property \App\Model\Table\StallsTable|\Cake\ORM\Association\BelongsTo $Stalls
 *
 * @method \App\Model\Entity\Reservation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reservation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reservation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reservation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReservationsTable extends Table
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

        $this->setTable('reservations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Spots');
        $this->belongsTo('Stalls');
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
            ->date('reservation_date')
            ->requirePresence('reservation_date', 'create')
            ->notEmpty('reservation_date');

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
        $rules->add($rules->existsIn(['spot_id'], 'Spots'));
        $rules->add($rules->existsIn(['stall_id'], 'Stalls'));

        return $rules;
    }
}
