<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Venues Controller
 *
 * @property \App\Model\Table\VenuesTable $Venues
 * @method \App\Model\Entity\Venue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VenuesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $venues = $this->paginate($this->Venues);

        $this->set(compact('venues'));
    }

    /**
     * View method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => ['Bookings'],
        ]);

        $this->set(compact('venue'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venue = $this->Venues->newEmptyEntity();
        if ($this->request->is('post')) {
            $venue = $this->Venues->patchEntity($venue, $this->request->getData());

            $image = $this->request->getData('image_file');
            $name = $image->getClientFileName();
            $targetPath = WWW_ROOT.'venue-img'.DS.$name;
            if($name)
                $image->moveTo($targetPath);
            $venue->image = $name;

            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $this->set(compact('venue'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venue = $this->Venues->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venue = $this->Venues->patchEntity($venue, $this->request->getData());

            $image = $this->request->getData('change_image');
            $name = $image->getClientFileName();

            if($name){
                $targetPath = WWW_ROOT.'venue-img'.DS.$name;
                $image->moveTo($targetPath);

                $imgpath = WWW_ROOT.'venue-img'.DS.$venue->image;
                if(file_exists($imgpath)){
                    unlink($imgpath);
                }
                $venue->image = $name;
            }

            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $this->set(compact('venue'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venue = $this->Venues->get($id);
        $imgpath = WWW_ROOT.'venue-img'.DS.$venue->image;
        if ($this->Venues->delete($venue)) {
            if(file_exists($imgpath)){
                unlink($imgpath);
            }
            $this->Flash->success(__('The venue has been deleted.'));
        } else {
            $this->Flash->error(__('The venue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Profile method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profile($id = null){
        $venue = $this->Venues->get($id);
        $this->set(compact('venue'));
    }


    /**
     * Results method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function results($location=null, $date=null, $numPeople=null)
    {
        //$key = $this->request->getQuery('location');
        //if($key){
//            $query = $this->Venues->findBySuburb($key);
//        } else{
//            $query = $this->Venues;
//        }
//
//        $this->set(compact('query'));
        $venues = $this->paginate($this->Venues);

        $this->set(compact('venues'));
    }

}
