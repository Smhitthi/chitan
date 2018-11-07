<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher; //added.
use Cake\Event\Event; //added.

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class AuctionBaseController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Chat', 'FinishedItem', 'Items']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

//追記分
    public function initialize(){
        parent::initialize();
        //各種のコンポーネントのロード
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ] ,
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'logout',
            ],
            'authError' => 'ログインしてください。',
        ]);
    }

    //ログイン処理
    function login(){
        //POST時の処理
        if($this->request->is('post')) {
            $user = $this->Auth->identify();
            //Authのidentifyをユーザーに設定
            // if(!empty($user)){
            //     $this->Auth->setUser($user);
            //     return $this->redirect($this->Auth->redirectUrl());
            // }
            // $this->Flash->error('ユーザー名かパスワードが間違っています。');
            if($user) {
                $this->Auth->setUser($user);
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('ログインエラーです');
            }
        }
    }

    //ログアウト処理
    public function logout() {
        //セッションを破棄
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    //認証を使わないページの設定
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow([]);
    }

    //認証時のロールチェック
    public function isAuthorized($user = null) {
        //管理者はtrue
        if($user['role'] === 'admin') {
            return true;
        }
        //一般ユーザーはAuctionControllerのみtrue、他はfalse。
        if($user['role'] === 'user') {
        	if($this->name == 'Auction'){
            return ture;
        } else {
        	return false;
        }
    }
        //その他はすべてfalse
        return false;
    }

}

