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

        $this->Authentication->addUnauthenticatedActions(['index', 'view', 'addCart', 'deleteCart']);
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
        $products = $this->Products->find()->contain(['Photos'])->where(['category_id' => $categoryId]);

        // フィルター選択中であれば、サイズをフィルタリングする
        $filter_size = $this->getRequest()->getQuery('filter_size');
        if (!empty($filter_size)) {
            $products->innerJoinWith('CharacteristicValuesProducts', function($q) use($filter_size) {
                return $q->where(['characteristic_value_id' => $filter_size]);
            });
        }

        // フィルター選択中であれば、カラーをフィルタリングする
        $filter_color = $this->getRequest()->getQuery('filter_color');
        if (!empty($filter_color)) {
            $products->innerJoinWith('CharacteristicValuesProducts', function($q) use($filter_color) {
                return $q->where(['characteristic_value_id' => $filter_color]);
            });
        }

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
    public function view($id)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'CharacteristicValues.Characteristics', 'Photos'],
        ]);

        $this->set(compact('product'));
    }

    /**
     * AddCart method
     */
    public function addCart() {
        $cart = $this->getRequest()->getSession()->read('cart');
        $productId = (int)$this->getRequest()->getData('product_id');
        $quantity = (int)$this->getRequest()->getData('quantity');

        // 商品が既にカートにある場合、数量を追加する
        if($this->getRequest()->getSession()->check('cart.' . $productId)) {
            $quantity += $this->getRequest()->getSession()->read('cart.' . $productId);
        }

        $cart[$productId] = $quantity;
        $this->getRequest()->getSession()->write('cart', $cart);
        return $this->redirect(['controller' => 'Orders', 'action' => 'checkout']);
    }

    /**
     * DeleteCart method
     */
    public function deleteCart($productId) {
        
        $this->getRequest()->getSession()->delete('cart.' . $productId);
        return $this->redirect(['controller' => 'Orders', 'action' => 'checkout']);
    }
}
