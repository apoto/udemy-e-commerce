<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\Model\Entity\Product;
use Cake\Utility\Hash;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public $paginate = [
        'limit' => 2,
    ];

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $products = $this->paginate(
            $this->Products->find()
                ->contain(['Categories'])
                ->where(['Products.deleted IS NULL'])
        );
        $this->set(compact('products'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('商品を追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('商品を保存できませんでした、再度試してください。'));
        }

        // カテゴリーのリストを取得
        $categories = $this->Products->Categories->find('list', ['keyField' => 'id', 'value' => 'name'])
        ->where(['deleted IS NULL'])
        ->toArray();

        // 特徴を取得
        $Characteristics = $this->fetchTable('Characteristics');
        $characteristics = $Characteristics->find()
        ->contain(['CharacteristicValues' => ['conditions' => ['deleted IS NULL']]])
        ->where(['deleted IS NULL'])
        ->toArray();

        $characteristicValues = [];
        foreach($characteristics as $characteristic) {
            foreach($characteristic->characteristic_values as $characteristic_value){
                $characteristicValues[$characteristic_value->id] = $characteristic_value->name;
            }
        }
        $this->set(compact('product', 'categories', 'characteristics', 'characteristicValues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, ['contain' => ['CharacteristicValues']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success('商品を保存しました。');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('商品を保存できませんでした、再度試してください。');
        }

        // カテゴリーのリストを取得
        $categories = $this->Products->Categories->find('list', ['keyField' => 'id', 'value' => 'name'])
        ->where(['deleted IS NULL'])
        ->toArray();
        
        // 特徴を取得
        $Characteristics = $this->fetchTable('Characteristics');
        $characteristics = $Characteristics->find()
        ->contain(['CharacteristicValues' => ['conditions' => ['deleted IS NULL']]])
        ->where(['deleted IS NULL'])
        ->toArray();

        $characteristicValues = [];
        foreach($characteristics as $characteristic) {
            foreach($characteristic->characteristic_values as $characteristic_value){
                $characteristicValues[$characteristic_value->id] = $characteristic_value->name;
            }
        }
        $this->set(compact('product', 'categories', 'characteristics', 'characteristicValues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $product = $this->Products->get($id);
        $product = $this->Products->patchEntity($product, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->Products->save($product)) {
            $this->Flash->success('商品を削除しました');
        } else {
            $this->Flash->error('商品の削除に失敗しました');
        }

        return $this->redirect(['action' => 'index']);
    }
}
