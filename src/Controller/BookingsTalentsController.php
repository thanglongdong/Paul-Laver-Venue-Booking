<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BookingsTalents Controller
 *
 * @property \App\Model\Table\BookingsTalentsTable $BookingsTalents
 * @method \App\Model\Entity\BookingsTalent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsTalentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bookings', 'Talents'],
        ];
        $bookingsTalents = $this->paginate($this->BookingsTalents);

        $this->set(compact('bookingsTalents'));
    }

    /**
     * View method
     *
     * @param string|null $id Bookings Talent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookingsTalent = $this->BookingsTalents->get($id, [
            'contain' => ['Bookings', 'Talents'],
        ]);

        $this->set(compact('bookingsTalent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookingsTalent = $this->BookingsTalents->newEmptyEntity();
        if ($this->request->is('post')) {
            $bookingsTalent = $this->BookingsTalents->patchEntity($bookingsTalent, $this->request->getData());
            if ($this->BookingsTalents->save($bookingsTalent)) {
                $this->Flash->success(__('The bookings talent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookings talent could not be saved. Please, try again.'));
        }
        $bookings = $this->BookingsTalents->Bookings->find('list', ['limit' => 200]);
        $talents = $this->BookingsTalents->Talents->find('list', ['limit' => 200]);
        $this->set(compact('bookingsTalent', 'bookings', 'talents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookings Talent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookingsTalent = $this->BookingsTalents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookingsTalent = $this->BookingsTalents->patchEntity($bookingsTalent, $this->request->getData());
            if ($this->BookingsTalents->save($bookingsTalent)) {
                $this->Flash->success(__('The bookings talent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookings talent could not be saved. Please, try again.'));
        }
        $bookings = $this->BookingsTalents->Bookings->find('list', ['limit' => 200]);
        $talents = $this->BookingsTalents->Talents->find('list', ['limit' => 200]);
        $this->set(compact('bookingsTalent', 'bookings', 'talents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookings Talent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookingsTalent = $this->BookingsTalents->get($id);
        if ($this->BookingsTalents->delete($bookingsTalent)) {
            $this->Flash->success(__('The bookings talent has been deleted.'));
        } else {
            $this->Flash->error(__('The bookings talent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
