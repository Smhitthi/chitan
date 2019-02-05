<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

use Cake\Event\Event;
use Exception;
use Cake\I18n\Time; //時間の取得
use DateTime; //時間の取得
use Cake\Datasource\ConnectionManager; //SQL直叩き

class AuctionController extends AuctionBaseController {
	//デフォルトテーブルを使わない
	public $useTable = false;

	//初期化処理
	public function initialize() {
		parent::initialize();
		$this->loadComponent('Paginator');
		//必要なモデルをすべてロード
		$this->loadModel('Users');
		$this->loadModel('Chat');
		$this->loadModel('Items');
		$this->loadModel('FinishedItem');
		$this->loadModel('Messages');
		//ログインしているユーザー情報をauthuserに設定
		$this->set('authuser', $this->Auth->user());
		//レイアウトをアクションに変更
        $this->viewBuilder()->setLayout('auction');
	}

	//トップページ
	public function index() {
		//ページネーションでitemsを取得
		$auction = $this->paginate('Items', [
			'order' =>['release' => 'desc'],
			'limit' => 10]);
		$this->set(compact('auction'));
	}

	//商品情報の表示
	public function view($id = null) {
		//$idのItemsを取得
		$query = $this->Items->get($id, [
			'contain' => ['Users']
			]);

        $this->set('items', $query);

		//messagesを新たに用意
		$messages = $this->getTableLocator()->get('Messages');
		$msg = $messages->newEntity();

		//POST送信時の処理
		if ($this->request->is('post')) {
			//送信されたフォームで$msgを更新
			$msg = $this->Messages->patchEntity($msg, $this->request->getData());
			$this->log($msg);
			//messagesを保存
			if ($this->Messages->save($msg)) {
				$this->Flash->success(__('保存しました。'));
			} else {
				$this->Flash->error(__('保存に失敗しました。もう一度入力してください。'));
			}
		}

		//Item.id=Messages.item.idを取得
		$msg = $this->Messages->find('all',[
			'conditions'=>['Items.id'=>$id],
			'contain'=>['Items','Users'],
			'order'=>['created'=>'desc']]);
		$this->log($msg);

		//SQL直叩き
		// $connection = ConnectionManager::get('default');
		// $result = $connection->execute('SELECT username FROM Users, Messages WHERE Users.id = Messages.user_id')->fetchAll('assoc');

		$this->set('msg', $msg);
	}

	//出品をする処理
	public function add() {
		//Biditemインスタンスを用意
		$item = $this->Items->newEntity();
		//POST送信時の処理
		if ($this->request->is('post')) {
			//$biditemにフォームの送信内容の反映
			$item = $this->Items->patchEntity($item, $this->request->getData());
			//$biditemを保存する
			if ($this->Items->save($item)) {
				//成功時のメッセージ
				$this->Flash->success(__('保存しました。'));
				//トップページ(index)に移動
				return $this->redirect(['action' => 'index']);
			}
			//失敗時のメッセージ
			$this->Flash->error(__('保存に失敗しました。もう一度入力してください。'));
		}
		//値を保管
		$this->set(compact('item'));

		$time = new DateTime();
		$this->set(compact('time'));
	}

	// //入札の処理
	// public function bid($biditem_id = null) {
	// 	//入札用のBidrequestインスタンスを用意
	// 	$bidrequest = $this->Bidrequests->newEntity();
	// 	//bidrequestにbiditem_idとuser_idを設定
	// 	$bidrequest->biditem_id = $biditem_id;
	// 	$bidrequest->user_id = $this->Auth->user('id');
	// 	//POST送信時の処理
	// 	if ($this->request->is('post')) {
	// 		//bidrequsetに送信フォームの内容を反映する
	// 		$bidrequest = $this->Bidrequests->patchEntity($bidrequest, $this->request->getData());
	// 		//Bidrequestを保存
	// 		if ($this->Bidrequests->save($bidrequest)) {
	// 			//成功時のメッセージ
	// 			$this->Flash->success(__('入札を送信しました。'));
	// 			//トップページにリダイレクト
	// 			return $this->redirect(['action' => 'view', $biditem_id]);
	// 		}
	// 		//失敗時のメッセージ
	// 		$this->Flash->erorr(__('入札に失敗しました。もう一度入力してください。'));
	// 	}
	// 	//$biditem_idの$biditemを取得する
	// 	$biditem = $this->Biditems->get($biditem_id);
	// 	$this->set(compact('bidrequest', 'biditem'));
	// }

	// //落札情報の表示
	// public function home() {
	// 	//自分が落札したBidinfoをページネーションで取得
	// 	$bidinfo = $this->paginate('Bidinfo', [
	// 		'conditions' => ['Bidinfo.user_id' => $this->Auth->user('id')],
	// 		'contain' => ['Users', 'Biditems'],
	// 		'order' => ['created' => 'desc'],
	// 		'limit' => 10])->toArray();
	// 	$this->set(compact('bidinfo'));
	// }

	// //出品情報の表示
	// public function home2() {
	// 	//自分が出品したBiditemをページネーションで取得
	// 	$biditems = $this->paginate('Biditems', [
	// 		'conditions' => ['Biditems.user_id' => $this->Auth->user('id')],
	// 		'contain' => ['Users', 'Bidinfo'],
	// 		'order' => ['created' => 'desc'],
	// 		'limit' => 10])->toArray();
	// 	$this->set(compact('biditems'));
	// }
}