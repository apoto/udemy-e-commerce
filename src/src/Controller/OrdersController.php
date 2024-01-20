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

        $this->Authentication->addUnauthenticatedActions(['checkout']);
    }

    /**
     * Checkout method
     *
     */
    public function checkout()
    {
        $this->loadModel('Products');
        $order = $this->Orders->newEmptyEntity();

        if($this->getRequest()->is('post')) {
            
        }
        $listProducts = [];
        foreach($this->getRequest()->getSession()->read('cart') as $product) {
            $listProducts[] = [
                'product' => $this->Products->get($product['product_id']),
                'quantity' => $product['quantity']
            ];
        }

        $this->set(compact('order', 'listProducts'));
        //dd($listProducts);
    }

}