<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->notEmpty('email', 'An email is required')
            ->email('email')

            ->notEmpty('password', 'A password is required')
            ->add('password', 'length', [
                'rule' => ['lengthBetween', 8,100],
                'message' => 'A password must be at least 8 characters'
            ])

            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'customer','talent','supplier']],
                'message' => 'Please enter a valid role'
            ]);
    }
}
