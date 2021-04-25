<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Talents Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\BelongsToMany $Bookings
 *
 * @method \App\Model\Entity\Talent newEmptyEntity()
 * @method \App\Model\Entity\Talent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Talent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Talent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Talent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Talent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Talent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Talent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Talent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TalentsTable extends Table
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

        $this->setTable('talents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Bookings', [
            'foreignKey' => 'talent_id',
            'targetForeignKey' => 'booking_id',
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
            ->ascii('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('phone')
            ->add('phone', 'length', [
                'rule' => ['lengthBetween', 10,10],
                'message' => 'Please enter a valid phone number.'
            ])
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 64)
            ->requirePresence('genre', 'create')
            ->notEmptyString('genre');

        return $validator;
    }
}
