<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chat Controller
 *
 * @property \App\Model\Table\ChatTable $Chat
 *
 * @method \App\Model\Entity\Chat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChatController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Items']
        ];
        $chat = $this->paginate($this->Chat);

        $this->set(compact('chat'));
    }

    /**
     * View method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chat = $this->Chat->get($id, [
            'contain' => ['Users', 'Items']
        ]);

        $this->set('chat', $chat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chat = $this->Chat->newEntity();
        if ($this->request->is('post')) {
            $chat = $this->Chat->patchEntity($chat, $this->request->getData());
            if ($this->Chat->save($chat)) {
                $this->Flash->success(__('The chat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chat could not be saved. Please, try again.'));
        }
        $users = $this->Chat->Users->find('list', ['limit' => 200]);
        $items = $this->Chat->Items->find('list', ['limit' => 200]);
        $this->set(compact('chat', 'users', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chat = $this->Chat->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chat = $this->Chat->patchEntity($chat, $this->request->getData());
            if ($this->Chat->save($chat)) {
                $this->Flash->success(__('The chat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chat could not be saved. Please, try again.'));
        }
        $users = $this->Chat->Users->find('list', ['limit' => 200]);
        $items = $this->Chat->Items->find('list', ['limit' => 200]);
        $this->set(compact('chat', 'users', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chat = $this->Chat->get($id);
        if ($this->Chat->delete($chat)) {
            $this->Flash->success(__('The chat has been deleted.'));
        } else {
            $this->Flash->error(__('The chat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
