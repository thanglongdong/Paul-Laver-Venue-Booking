<?php
declare(strict_types=1);


namespace App\Controller;
use Cake\ORM\TableRegistry;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Venues', 'Customers'],
        ];
        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Venues', 'Customers', 'Suppliers', 'Talents'],
        ]);

        $this->set(compact('booking'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $venues = TableRegistry::getTableLocator()->get('Venues');

        $booking = $this->Bookings->newEmptyEntity();
        if ($this->request->is('post')) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());

            $stime = $this->request->getData('start_time'); //start time variable
            $etime = $this->request->getData('end_time'); //end time variable
            $bookingdate = $this->request->getData('date'); //end time variable
            $numofpeople=$this->request->getData('no_of_people'); //number of people variable
            $venue_id=$this->request->getData('venue_id'); //venue_id variable

            $venue=$venues //find the venue selected
            ->find()
            ->where(['id' => $venue_id])
            ->first();
            $venuecapacity=$venue->capacity; //find the capacity of the selected venue

            if ($stime < $etime){ //if start time is before end time (what we want)
                if ($bookingdate <= $stime){ // make sure booking start time is either on the day it was booked, or later (NOT BEFORE!)
                    if ($numofpeople <= $venuecapacity ){ //make sure the number of people entered is smaller than the venue capacity
                        if ($this->Bookings->save($booking)) {
                            $this->Flash->success(__('The venue has been saved.'));
    
                            return $this->redirect(['action' => 'index']);
                        }
                        $this->Flash->error(__('The booking could not be saved. Please, try again.'));
                    }
                    else{
                    $this->Flash->error(__('The venue selected has the capacity of '.$venuecapacity.' only.'));
                    }
                }
                else{
                    $this->Flash->error(__('The booking could not be saved - Booking cannot be in the past'));
                }
            }
            else{ //otherwise, the end time must be before the start (not correct) so we display an customized error message
                $this->Flash->error(__("The booking could not be saved - The Bookings' end time must be after the start time"));
            }

        }
        $venues = $this->Bookings->Venues->find('list', ['limit' => 200]);
        $customers = $this->Bookings->Customers->find('list', ['limit' => 200]);
        $suppliers = $this->Bookings->Suppliers->find('list', ['limit' => 200]);
        $talents = $this->Bookings->Talents->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'venues', 'customers', 'suppliers', 'talents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venues = TableRegistry::getTableLocator()->get('Venues');

        $booking = $this->Bookings->get($id, [
            'contain' => ['Suppliers', 'Talents'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());

            $stime = $this->request->getData('start_time'); //start time variable
            $etime = $this->request->getData('end_time'); //end time variable
            $numofpeople=$this->request->getData('no_of_people'); //number of people variable
            $venue_id=$this->request->getData('venue_id'); //venue_id variable

            $venue=$venues //find the venue selected
            ->find()
            ->where(['id' => $venue_id])
            ->first();
            $venuecapacity=$venue->capacity; //find the capacity of the selected venue

            if ($stime < $etime) { //if start time is before end time (what we want)
                if ($numofpeople <= $venuecapacity ){ //make sure the number of people entered is smaller than the venue capacity
                    if ($this->Bookings->save($booking)) {
                        $this->Flash->success(__('The venue has been saved.'));
    
                        return $this->redirect(['action' => 'index']);
                    }
                        $this->Flash->error(__('The booking could not be saved. Please, try again.'));
                }
                else{
                $this->Flash->error(__('The venue selected has the capacity of '.$venuecapacity.' only.'));
                }
            }
            else{ //otherwise, the end time must be before the start (not correct) so we display an customized error message
                $this->Flash->error(__("The booking could not be saved - The Bookings' end time must be after the start time"));
            }
        }
        $venues = $this->Bookings->Venues->find('list', ['limit' => 200]);
        $customers = $this->Bookings->Customers->find('list', ['limit' => 200]);
        $suppliers = $this->Bookings->Suppliers->find('list', ['limit' => 200]);
        $talents = $this->Bookings->Talents->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'venues', 'customers', 'suppliers', 'talents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
