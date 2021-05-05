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
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
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

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
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
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name','Please provide a name.');

        $validator
            ->numeric('phone')
            ->add('phone', 'length', [
                'rule' => ['lengthBetween', 10,11],
                'message' => 'Please enter a 10-digit phone number.'
            ])
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone','Please provide a phone number.');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email','Please provide an email.');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 64)
            ->requirePresence('genre', 'create')
            ->notEmptyString('genre','Please select a genre.');


        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('image')
            ->maxLength('image', 256)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->numeric('pph')
            ->requirePresence('pph', 'create')
            ->notEmptyString('pph')
            ->add('pph', 'range', [
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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
