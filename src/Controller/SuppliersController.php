<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SuppliersController extends AppController
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
        $suppliers = $this->paginate($this->Suppliers);

        $this->set(compact('suppliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['Users', 'Bookings'],
        ]);

        $this->set(compact('supplier'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplier = $this->Suppliers->newEmptyEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());

            if(!$supplier->getErrors){
                $image = $this->request->getData('image_file');

                $name  = $image->getClientFilename();

                if (!is_dir(WWW_ROOT . 'img' . DS . 'supplier-img')) {
                    mkdir(WWW_ROOT . 'img' . DS . 'supplier-img', 0775);
                }

                $targetPath = WWW_ROOT.'img'.DS.'supplier-img'.DS.$name;

                if($name)
                    $image->moveTo($targetPath);

                $supplier->image = 'supplier-img/'.$name;
            }

//            $image = $this->request->getData('image_file');
//            $name = $image->getClientFileName();
//
//            if(!is_dir(WWW_ROOT.'supplier-img'))
//                mkdir(WWW_ROOT.'supplier-img',0775);
//            $targetPath = WWW_ROOT.'supplier-img'.DS.$name;
//
//            if($name)
//                $image->moveTo($targetPath);
//            $supplier->image = $name;

            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));

        }
        $users = $this->Suppliers->Users->find('list', ['limit' => 200]);
        $bookings = $this->Suppliers->Bookings->find('list', ['limit' => 200]);
        $this->set(compact('supplier', 'users', 'bookings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['Bookings'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());

            if (!$supplier->getErrors) {
                $image = $this->request->getData('change_image');

                $name  = $image->getClientFilename();

                if ($name){
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'supplier-img')) {
                        mkdir(WWW_ROOT . 'img' . DS . 'supplier-img', 0775);
                    }

                    $targetPath = WWW_ROOT . 'img' . DS . 'supplier-img' . DS . $name;


                    $image->moveTo($targetPath);

                    $imgpath = WWW_ROOT . 'img' . DS .'supplier-img'. DS. $supplier->image;
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }

                    $supplier->image = 'supplier-img/' . $name;
                }
            }

//            $image = $this->request->getData('change_image');
//            $name = $image->getClientFileName();
//
//            if(!is_dir(WWW_ROOT.'supplier-img'))
//                mkdir(WWW_ROOT.'supplier-img',0775);
//
//            if($name){
//                $targetPath = WWW_ROOT.'supplier-img'.DS.$name;
//                $image->moveTo($targetPath);
//
//                $imgpath = WWW_ROOT.'supplier-img'.DS.$supplier->image;
//                if(file_exists($imgpath)){
//                    unlink($imgpath);
//                }
//                $supplier->image = $name;
//            }

            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $users = $this->Suppliers->Users->find('list', ['limit' => 200]);
        $bookings = $this->Suppliers->Bookings->find('list', ['limit' => 200]);
        $this->set(compact('supplier', 'users', 'bookings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplier = $this->Suppliers->get($id);

//        $venue = $this->Suppliers->get($id);
        $imgpath = WWW_ROOT.'img'.DS.$supplier->image;
//        $imgpath = WWW_ROOT.'supplier-img'.DS.$supplier->image;

        if ($this->Suppliers->delete($supplier)) {
            if(file_exists($imgpath)){
                unlink($imgpath);
            }
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profile($id = null){
        $supplier = $this->Suppliers->get($id);
        $this->set(compact('supplier'));
    }

    public function editprofile($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['Bookings'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());

            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'profile',$supplier->id]);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $users = $this->Suppliers->Users->find('list', ['limit' => 200]);
        $bookings = $this->Suppliers->Bookings->find('list', ['limit' => 200]);
        $this->set(compact('supplier', 'users', 'bookings'));
    }

    public function results()
    {

        $suppliers_query = $this->Suppliers->find('all');

        $suppliers = $this->paginate($suppliers_query);

        $this->set(compact('suppliers'));


    }


}
