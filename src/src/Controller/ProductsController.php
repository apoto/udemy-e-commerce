<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($categoryId)
    {
        // カテゴリーを取得
        $category = $this->Products->Categories->get($categoryId);

        // 選択カテゴリーを含む商品一覧を取得
        $products = $this->Products->find()->where(['category_id' => $categoryId]);

        // カラーを取得
        $CharacteristicValues = $this->fetchTable('CharacteristicValues');
        $colors = $CharacteristicValues->find(
            'list', [
                'keyField' => 'id',
                'valueField' => 'name',
        ])
        ->where(['characteristic_id' => CHARACTERISTIC_COLOR_ID, 'deleted IS NULL']);

        // サイズを取得
        $sizes = $CharacteristicValues->find(
            'list', [
                'keyField' => 'id',
                'valueField' => 'name',
        ])
        ->where(['characteristic_id' => CHARACTERISTIC_SIZE_ID, 'deleted IS NULL']);


        $this->set(compact('category', 'colors', 'sizes'));
        $this->set(['products' => $this->paginate($products)]);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'CharacteristicValues', 'Photos', 'OrderLines'],
        ]);

        $this->set(compact('product'));
    }
}
