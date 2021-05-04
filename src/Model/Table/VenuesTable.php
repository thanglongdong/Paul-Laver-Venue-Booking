<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Venues Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 *
 * @method \App\Model\Entity\Venue newEmptyEntity()
 * @method \App\Model\Entity\Venue newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Venue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Venue findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Venue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Venue[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venue[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venue[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venue[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Venue[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */

class VenuesTable extends Table
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

        $this->setTable('venues');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Bookings', [
            'foreignKey' => 'venue_id',
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
            ->scalar('street_address')
            ->maxLength('street_address', 64)
            ->requirePresence('street_address', 'create')
            ->notEmptyString('street_address','Please provide an address.');

        $validator
            ->scalar('suburb')
            ->maxLength('suburb', 64)
            ->requirePresence('suburb', 'create')
            ->notEmptyString('suburb','Please provide a suburb.');

        $validator
            ->requirePresence('state', 'create')
            ->notEmptyString('state','Please select a state.');

        $validator
            ->add('postcode', 'length', [
                'rule' => ['lengthBetween', 4,4],
                'message' => 'Postcode must be 4 characters in length.'
            ])
            ->requirePresence('postcode', 'create')
            ->notEmptyString('postcode','Please provide a postcode.')
            ->numeric('postcode','Postcode should be number');

        $validator
            ->integer('capacity')
            ->requirePresence('capacity', 'create')
            ->notEmptyString('capacity','Please provide a capacity.')
            ->add('capacity', 'range', [
                'rule' => ['range',1,5000],
                'message' => 'Please enter a valid number.'
            ]);

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
            ->scalar('description')
            ->maxLength('description', 256)
            ->requirePresence('description', 'create')
            ->notEmptyString('description','Please provide a description for the venue.');

        //$validator
         //   ->scalar('image')
        //    ->maxLength('image', 256)
         //   ->requirePresence('image', 'create')
         //   ->allowEmptyFile('image');

        $validator
            ->numeric('pph')
            ->requirePresence('pph', 'create')
            ->notEmptyString('pph','Please provide the price per hour');

        return $validator;
    }
}
