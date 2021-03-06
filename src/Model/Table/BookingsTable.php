<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Date;
use Cake\I18n\FrozenTime;

/**
 * Bookings Model
 *
 * @property \App\Model\Table\VenuesTable&\Cake\ORM\Association\BelongsTo $Venues
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsToMany $Suppliers
 * @property \App\Model\Table\TalentsTable&\Cake\ORM\Association\BelongsToMany $Talents
 *
 * @method \App\Model\Entity\Booking newEmptyEntity()
 * @method \App\Model\Entity\Booking newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Booking findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BookingsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('bookings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Venues', [
            'foreignKey' => 'venue_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Suppliers', [
            'foreignKey' => 'booking_id',
            'targetForeignKey' => 'supplier_id',
            'joinTable' => 'bookings_suppliers',
        ]);
        $this->belongsToMany('Talents', [
            'foreignKey' => 'booking_id',
            'targetForeignKey' => 'talent_id',
            'joinTable' => 'bookings_talents',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('date')
            ->notEmptyDate('date','Please select a date.');

        $validator
            ->dateTime('start_time')
            ->notEmptyDateTime('start_time','Please select a start time.');

        $validator
            ->dateTime('end_time')
            ->notEmptyDateTime('end_time','Please select an end time.');

        $validator
            ->scalar('event_type')
            ->maxLength('event_type', 64)
            ->notEmptyString('event_type','Please select an event type.');

        $validator
            ->integer('no_of_people')
            ->notEmptyString('no_of_people','Please provide a number.')
            ->add('no_of_people', 'range', [
                'rule' => ['range',1,5000],
                'message' => 'Please enter a valid number.'
            ]);

        $validator
            ->scalar('cost')
            ->requirePresence('cost', 'create')
            ->notEmptyString('cost')
            ->add('cost', 'range', [
                'rule' => ['range',1,5000],
                'message' => 'Please enter a valid number.'
            ]);
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['venue_id'], 'Venues'), ['errorField' => 'venue_id']);
        $rules->add($rules->existsIn(['customer_id'], 'Customers'), ['errorField' => 'customer_id']);

        return $rules;
    }
}
