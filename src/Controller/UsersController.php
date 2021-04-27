<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class UsersController extends AppController
{

    public function index()
    {
        $this->set('users', $this->Users->find()->all());
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->Authentication->setIdentity($user); //As we have just registered as a user, we can login using those credentials
                return $this->redirect('/');
                //return $this->redirect(['action' => 'register']);
                //return $this->redirect($this->referer()); //want to redirect to page before we clicked sign up
                //return $this->redirect('/');
            }
            // $this->Flash->error(__('Unable to register the user.'));
        }
        $this->set('user', $user);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue

        //$this->Authentication->addUnauthenticatedActions(['login']);

    }

     // redirect to /dashboard if this is an admin account and redirect should be fixed later--better to redirect to the page where they are
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {

            // $user = $this->Users->find()->firstOrFail();

            // if($user['role']=='admin'){
            //     $this->Auth->setUser($user);
            //     $redirect = $this->request->getQuery('redirect', [
            //         'controller' => 'dashboard',
            //         'action' => 'index',
            //     ]);
            // }
            // elseif($user['role']=='customer'){

            //     $this->Auth->setUser($user);
            //     $redirect = $this->request->getQuery('redirect', [
            //         'controller' => 'dashboard',
            //         'action' => 'index',
            //     ]);
            //     }
            //more elseif condition for talents/suppliers should be added below
            //$redirect = $this->request->getQuery('redirect', [
            //   'controller' => 'pages',
            //   'action' => 'home',
            //]);
            //return $this->redirect($redirect);
            return $this->redirect('/');
            //return $this->redirect($this->referer()); //want to redirect to page before we clicked log in
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Flash->success('You are now logged out.');
            $this->Authentication->logout();
            return $this->redirect('/');
        }
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $users = $this->Users->get($id);
        if ($this->Users->delete($users)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
