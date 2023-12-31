<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * CharacteristicValues Controller
 *
 * @property \App\Model\Table\CharacteristicValuesTable $CharacteristicValues
 * @method \App\Model\Entity\CharacteristicValues[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CharacteristicValuesController extends AppController
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
    public function index($characteristicId)
    {
        $characteristicValues = $this->paginate($this->CharacteristicValues->find()
        ->where(['characteristic_id' => $characteristicId, 'deleted IS NULL']));

        $this->set(compact('characteristicId', 'characteristicValues'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($characteristicId)
    {
        $characteristicValue = $this->CharacteristicValues->newEmptyEntity();
        if ($this->request->is('post')) {
            $characteristicValue = $this->CharacteristicValues->patchEntity(
                $characteristicValue,
                $this->request->getData() + ['characteristic_id' => $characteristicId]
            );
            if ($this->CharacteristicValues->save($characteristicValue)) {
                $this->Flash->success(__('特徴オプションを追加しました。'));

                return $this->redirect(['action' => 'index', $characteristicId]);
            }
            $this->Flash->error(__('特徴オプションを保存できませんでした、再度試してください。'));
        }
        $this->set(compact('characteristicValues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id characteristicValues id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $characteristicValue = $this->CharacteristicValues->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $characteristicValue = $this->CharacteristicValues->patchEntity($characteristicValue, $this->request->getData());
            if ($this->CharacteristicValues->save($characteristicValue)) {
                $this->Flash->success('特徴オプションを保存しました。');

                return $this->redirect(['action' => 'index', $characteristicValue->characteristic_id]);
            }
            $this->Flash->error('特徴オプションを保存できませんでした、再度試してください。');
        }
        $this->set(compact('characteristicValue'));
    }

    /**
     * Delete method
     *
     * @param string|null $id CharacteristicValues id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $characteristicValue = $this->CharacteristicValues->get($id);
        $characteristicValue = $this->CharacteristicValues->patchEntity($characteristicValue, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->CharacteristicValues->save($characteristicValue)) {
            $this->Flash->success('特徴オプションを削除しました');
        } else {
            $this->Flash->error('特徴オプションの削除に失敗しました');
        }

        return $this->redirect(['action' => 'index', $characteristicValue->characteristic_id]);
    }
}
