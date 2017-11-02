<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Hash;
use Cake\Validation\Validator;

/**
 * Spots Model
 *
 * @property \App\Model\Table\ReservationsTable|\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\Spot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Spot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Spot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Spot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Spot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Spot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Spot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SpotsTable extends Table
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

        $this->setTable('spots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Reservations');
        $this->hasOne('DayReservations', [
            'className' => 'Reservations'
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
            ->decimal('lat')
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        $validator
            ->decimal('lng')
            ->requirePresence('lng', 'create')
            ->notEmpty('lng');

        return $validator;
    }

    /**
     * Grants summary finder
     *
     * @param Query $query The query builder.
     * @param array $options
     * @return Query
     */
    public function findReserved(Query $query, $options = [])
    {
        $date = Hash::get($options, 'date');

        return $query
            ->contain([
                'DayReservations' => function(Query $query) use ($date) {
                    return $query
                        ->contain(['Stalls.FoodTypes'])
                        ->where([
                            'reservation_date' => $date
                        ]);
                }
            ]);
    }
}
