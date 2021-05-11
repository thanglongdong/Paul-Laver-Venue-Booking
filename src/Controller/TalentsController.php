<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Talents Controller
 *
 * @property \App\Model\Table\TalentsTable $Talents
 * @method \App\Model\Entity\Talent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TalentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $talents = $this->paginate($this->Talents);

        $this->set(compact('talents'));
    }

    /**
     * View method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $talent = $this->Talents->get($id, [
            'contain' => ['Users', 'Bookings'],
        ]);

        $this->set(compact('talent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $talent = $this->Talents->newEmptyEntity();
        if ($this->request->is('post')) {
            $talent = $this->Talents->patchEntity($talent, $this->request->getData());

            $image = $this->request->getData('image_file');
            $name = $image->getClientFileName();

            if(!is_dir(WWW_ROOT.'talent-img'))
                mkdir(WWW_ROOT.'talent-img',0775);
            $targetPath = WWW_ROOT.'talent-img'.DS.$name;

            if($name)
                $image->moveTo($targetPath);
            $talent->image = $name;

            if ($this->Talents->save($talent)) {
                $this->Flash->success(__('The talent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The talent could not be saved. Please, try again.'));
        }
        $users = $this->Talents->Users->find('list', ['limit' => 200]);
        $bookings = $this->Talents->Bookings->find('list', ['limit' => 200]);
        $this->set(compact('talent', 'users', 'bookings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $talent = $this->Talents->get($id, [
            'contain' => ['Bookings'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $talent = $this->Talents->patchEntity($talent, $this->request->getData());

            $image = $this->request->getData('change_image');
            $name = $image->getClientFileName();

            if(!is_dir(WWW_ROOT.'talent-img'))
                mkdir(WWW_ROOT.'talent-img',0775);

            if($name){
                $targetPath = WWW_ROOT.'talent-img'.DS.$name;
                $image->moveTo($targetPath);

                $imgpath = WWW_ROOT.'talent-img'.DS.$talent->image;
                if(file_exists($imgpath)){
                    unlink($imgpath);
                }
                $talent->image = $name;
            }

            if ($this->Talents->save($talent)) {
                $this->Flash->success(__('The talent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The talent could not be saved. Please, try again.'));
        }
        $users = $this->Talents->Users->find('list', ['limit' => 200]);
        $bookings = $this->Talents->Bookings->find('list', ['limit' => 200]);
        $this->set(compact('talent', 'users', 'bookings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $talent = $this->Talents->get($id);

        $venue = $this->Talents->get($id);
        $imgpath = WWW_ROOT.'talent-img'.DS.$talent->image;

        if ($this->Talents->delete($talent)) {
            $this->Flash->success(__('The talent has been deleted.'));
        } else {
            $this->Flash->error(__('The talent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profile($id = null){
        $talent = $this->Talents->get($id);
        $this->set(compact('talent'));
    }

    public function editprofile($id = null)
    {
        $talent = $this->Talents->get($id, [
            'contain' => ['Bookings'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $talent = $this->Talents->patchEntity($talent, $this->request->getData());

            if ($this->Talents->save($talent)) {
                $this->Flash->success(__('The talent has been saved.'));

                return $this->redirect(['action' => 'profile',$talent->id]);
            }
            $this->Flash->error(__('The talent could not be saved. Please, try again.'));
        }
        $users = $this->Talents->Users->find('list', ['limit' => 200]);
        $bookings = $this->Talents->Bookings->find('list', ['limit' => 200]);
        $this->set(compact('talent', 'users', 'bookings'));
    }

}
