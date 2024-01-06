<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
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
        $orders = $this->paginate($this->Orders->find());

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     */
    public function view($idOrder)
    {
        $order = $this->Orders->get($idOrder, ['contain' => ['OrderLines.Products']]);

        $this->set(compact('order'));
    }

    /**
     * Export method
     *
     */
    public function export()
    {
        $orders = $this->Orders->find()->contain('OrderLines.Products');

        $data = [['Name', 'Email', 'Total']];
        foreach ($orders as $order){
            $orderTable = [];
            $orderTable[] = $order->full_name;
            $orderTable[] = $order->email;

            $total = 0;
            foreach ($order->order_lines as $order_line){
                $total += $order_line->product->price * $order_line->quantity;
            }

            $orderTable[] = $total;
            $data[] = $orderTable;
        }

        $this->set(compact('data'));
        $this->viewBuilder()
            ->setClassName('CsvView.Csv')
            ->setOptions([
                'serialize' => 'data',
                'delimiter' => ';',
                'bom' => true,
            ]);

        $this->setResponse($this->getResponse()->withDownload('orders.csv'));
    }
}
