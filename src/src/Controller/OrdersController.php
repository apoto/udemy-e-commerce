<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['checkout', 'confirmation']);
    }

    /**
     * Checkout method
     *
     */
    public function checkout()
    {
        $ProductsTable = $this->fetchTable('Products');
        $listProducts = []; 
        if(!empty($this->getRequest()->getSession()->read('cart'))){
            foreach($this->getRequest()->getSession()->read('cart') as $productId => $quantity) {
                $listProducts[] = [
                    'product' => $ProductsTable->get($productId),
                    'quantity' => $quantity
                ];
            }
        }

        $order = $this->Orders->newEmptyEntity();

        if($this->getRequest()->is('post')) {
            $datas = $this->getRequest()->getData();
            $datas['order_lines'] = [];
            foreach($this->getRequest()->getSession()->read('cart') as $productId => $quantity) {
                $datas['order_lines'][] = [
                    'product_id' => $productId,
                    'quantity' => $quantity
                ];
            }

            $order = $this->Orders->patchEntity(
                $order,
                $datas,
                ['associated' => ['OrderLines']]
            );
            
            if($this->Orders->save($order)) {
                $this->Flash->success(__('ご購入ありがとうございます！'));
                return $this->redirect(['action' => 'confirmation']);
            } else {
                $this->Flash->error('エラー: ' . json_encode($order->getErrors()));
            }
        }
        
        $this->set(compact('order', 'listProducts'));
    }

    /**
     * Confirmation method
     *
     */
    public function confirmation() {

    }

}