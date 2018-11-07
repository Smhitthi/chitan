<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FinishedItem Controller
 *
 * @property \App\Model\Table\FinishedItemTable $FinishedItem
 *
 * @method \App\Model\Entity\FinishedItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FinishedItemController extends AuctionBaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'Users']
        ];
        $finishedItem = $this->paginate($this->FinishedItem);

        $this->set(compact('finishedItem'));
    }

    /**
     * View method
     *
     * @param string|null $id Finished Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $finishedItem = $this->FinishedItem->get($id, [
            'contain' => ['Items', 'Users']
        ]);

        $this->set('finishedItem', $finishedItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $finishedItem = $this->FinishedItem->newEntity();
        if ($this->request->is('post')) {
            $finishedItem = $this->FinishedItem->patchEntity($finishedItem, $this->request->getData());
            if ($this->FinishedItem->save($finishedItem)) {
                $this->Flash->success(__('The finished item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The finished item could not be saved. Please, try again.'));
        }
        $items = $this->FinishedItem->Items->find('list', ['limit' => 200]);
        $users = $this->FinishedItem->Users->find('list', ['limit' => 200]);
        $this->set(compact('finishedItem', 'items', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Finished Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $finishedItem = $this->FinishedItem->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $finishedItem = $this->FinishedItem->patchEntity($finishedItem, $this->request->getData());
            if ($this->FinishedItem->save($finishedItem)) {
                $this->Flash->success(__('The finished item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The finished item could not be saved. Please, try again.'));
        }
        $items = $this->FinishedItem->Items->find('list', ['limit' => 200]);
        $users = $this->FinishedItem->Users->find('list', ['limit' => 200]);
        $this->set(compact('finishedItem', 'items', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Finished Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $finishedItem = $this->FinishedItem->get($id);
        if ($this->FinishedItem->delete($finishedItem)) {
            $this->Flash->success(__('The finished item has been deleted.'));
        } else {
            $this->Flash->error(__('The finished item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
