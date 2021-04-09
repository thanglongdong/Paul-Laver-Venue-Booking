<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BookingsSuppliers Controller
 *
 * @property \App\Model\Table\BookingsSuppliersTable $BookingsSuppliers
 * @method \App\Model\Entity\BookingsSupplier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsSuppliersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bookings', 'Suppliers'],
        ];
        $bookingsSuppliers = $this->paginate($this->BookingsSuppliers);

        $this->set(compact('bookingsSuppliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Bookings Supplier id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookingsSupplier = $this->BookingsSuppliers->get($id, [
            'contain' => ['Bookings', 'Suppliers'],
        ]);

        $this->set(compact('bookingsSupplier'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookingsSupplier = $this->BookingsSuppliers->newEmptyEntity();
        if ($this->request->is('post')) {
            $bookingsSupplier = $this->BookingsSuppliers->patchEntity($bookingsSupplier, $this->request->getData());
            if ($this->BookingsSuppliers->save($bookingsSupplier)) {
                $this->Flash->success(__('The bookings supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookings supplier could not be saved. Please, try again.'));
        }
        $bookings = $this->BookingsSuppliers->Bookings->find('list', ['limit' => 200]);
        $suppliers = $this->BookingsSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('bookingsSupplier', 'bookings', 'suppliers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookings Supplier id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookingsSupplier = $this->BookingsSuppliers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookingsSupplier = $this->BookingsSuppliers->patchEntity($bookingsSupplier, $this->request->getData());
            if ($this->BookingsSuppliers->save($bookingsSupplier)) {
                $this->Flash->success(__('The bookings supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookings supplier could not be saved. Please, try again.'));
        }
        $bookings = $this->BookingsSuppliers->Bookings->find('list', ['limit' => 200]);
        $suppliers = $this->BookingsSuppliers->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('bookingsSupplier', 'bookings', 'suppliers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookings Supplier id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookingsSupplier = $this->BookingsSuppliers->get($id);
        if ($this->BookingsSuppliers->delete($bookingsSupplier)) {
            $this->Flash->success(__('The bookings supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The bookings supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
