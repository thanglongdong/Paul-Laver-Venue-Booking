<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookingsTalents Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\BelongsTo $Bookings
 * @property \App\Model\Table\TalentsTable&\Cake\ORM\Association\BelongsTo $Talents
 *
 * @method \App\Model\Entity\BookingsTalent newEmptyEntity()
 * @method \App\Model\Entity\BookingsTalent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BookingsTalent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookingsTalent get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookingsTalent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BookingsTalent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookingsTalent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookingsTalent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookingsTalent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookingsTalent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BookingsTalent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BookingsTalent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BookingsTalent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BookingsTalentsTable extends Table
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

        $this->setTable('bookings_talents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Bookings', [
            'foreignKey' => 'booking_id',
        ]);
        $this->belongsTo('Talents', [
            'foreignKey' => 'talent_id',
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
            ->dateTime('perform_stime')
            ->allowEmptyDateTime('perform_stime');

        $validator
            ->dateTime('perform_etime')
            ->allowEmptyDateTime('perform_etime');

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
        $rules->add($rules->existsIn(['booking_id'], 'Bookings'), ['errorField' => 'booking_id']);
        $rules->add($rules->existsIn(['talent_id'], 'Talents'), ['errorField' => 'talent_id']);

        return $rules;
    }
}
