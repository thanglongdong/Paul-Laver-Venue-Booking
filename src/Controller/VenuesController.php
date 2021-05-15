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

            if(!$venue->getErrors){
                $image = $this->request->getData('image_file');

                $name  = $image->getClientFilename();

                if( !is_dir(WWW_ROOT.'img'.DS.'venue-img') )
                    mkdir(WWW_ROOT.'img'.DS.'venue-img',0775);

                $targetPath = WWW_ROOT.'img'.DS.'venue-img'.DS.$name;

                if($name)
                    $image->moveTo($targetPath);

                $venue->image = 'venue-img/'.$name;
            }

//            $image = $this->request->getData('image_file');
//            $name = $image->getClientFileName();
//
//            if(!is_dir(WWW_ROOT.'venue-img'))
//            mkdir(WWW_ROOT.'venue-img',0775);
//            $targetPath = WWW_ROOT.'venue-img'.DS.$name;
//
//            if($name)
//            $image->moveTo($targetPath);
//            $venue->image = 'venue-img/'.$name;

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

            if (!$venue->getErrors) {
                $image = $this->request->getData('change_image');

                $name  = $image->getClientFilename();

                if ($name){
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'venue-img')) {
                        mkdir(WWW_ROOT . 'img' . DS . 'venue-img', 0775);
                    }

                    $targetPath = WWW_ROOT . 'img' . DS . 'venue-img' . DS . $name;


                    $image->moveTo($targetPath);

                    $imgpath = WWW_ROOT . 'img' . DS .'venue-img'. DS. $venue->image;
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }

                    $venue->image = 'venue-img/' . $name;
                }
            }


//            $image = $this->request->getData('change_image');
//            $name = $image->getClientFileName();
//
//            if(!is_dir(WWW_ROOT.'venue-img'))
//                mkdir(WWW_ROOT.'venue-img',0775);
//
//            if($name){
//                $targetPath = WWW_ROOT.'venue-img'.DS.$name;
//                $image->moveTo($targetPath);
//
//                $imgpath = WWW_ROOT.'venue-img'.DS.$venue->image;
//                if(file_exists($imgpath)){
//                    unlink($imgpath);
//                }
//                $venue->image = 'venue-img/'.$name;
//            }

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

        $imgpath = WWW_ROOT.'img'.DS.$venue->image;
//        $imgpath = WWW_ROOT.'venue-img'.DS.$venue->image;

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

//      $venues_query = $this->Venues->find('all');

        $key= $this->request->getQuery();

        if (!empty($key['hours'])) {  //if not empty (user inputted) - do this
            if (is_numeric($key['hours'])) { //if entered stuff is int do this
                $hours = $key['hours'];
                $price = $venue->pph;
                $estimate =  $price * $hours;
            }
            else {  //if not int, return message error
                $estimate = 'incorrect'; //handled in view
            }

        } //else, no user input - do this
        else{
            $estimate = null;
        }

        $this->set('estimate', $estimate);

        $this->set(compact('venue'));
    }


    /**
     * Results method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function results()
    {
        $this->paginate = [
            'limit' => 10
        ];

        $venues_query = $this->Venues->find('all');

        $key= $this->request->getQuery();

        if (!empty($key['location'])) {
            if (!is_numeric($key['location'])) { //if input is non-integer (so the suburb), then
                $venues_query->where([
                    'Venues.suburb LIKE' => '%' . $key['location'] . '%'
                ]);
            }
            else { //elseif the input is numbers, (so the postcode), then
                $venues_query->where([
                    'Venues.postcode' => $key['location']
                ]);
            }
        }

//        if (!empty($key['num_of_people'])) {
//            if($key['num_of_people'] == '<50'){
//                for ($i = 1; $i < 50; $i++) {
//                    $venues_query->where([
//                        'Venues.capacity' => $i
//
//                    ]);
//                }
//            }
//            elseif($key['num_of_people'] == '50-100'){
//                for ($i = 50; $i <= 100 ; $i++) {
//                    $venues_query->where([
//                        'Venues.capacity' => $i
//                    ]);
//                }
//            }
//            elseif($key['num_of_people'] == '100-200'){
//                for ($i = 100; $i <= 200; $i++) {
//                    $venues_query->where([
//                        'Venues.capacity' => $i
//                    ]);
//                }
//            }
//            elseif($key['num_of_people'] == '200+'){
//                for ($i = 201; $i < 400; $i++) {
//                    $venues_query->where([
//                        'Venues.capacity' => $i
//                    ]);
//                }
//            }
//            else{
        if (!empty($key['num_of_people'])) {
            if (is_numeric($key['num_of_people'])){
                $venues_query->where([
                    'Venues.capacity >=' => $key['num_of_people']
                ]);
                $venues_query->order([
                    'Venues.capacity' => 'ASC'
                ]);
            }
        }

        $venues = $this->paginate($venues_query);

        $this->set(compact('venues'));
    }

}
