<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Characteristics Controller
 *
 * @property \App\Model\Table\CharacteristicsTable $Characteristics
 * @method \App\Model\Entity\Characteristic[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CharacteristicsController extends AppController
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
        $characteristics = $this->paginate($this->Characteristics->find()->where(['deleted IS NULL']));

        $this->set(compact('characteristics'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $characteristic = $this->Characteristics->newEmptyEntity();
        if ($this->request->is('post')) {
            $Characteristic = $this->Characteristics->patchEntity($characteristic, $this->request->getData());
            if ($this->Characteristics->save($characteristic)) {
                $this->Flash->success(__('特徴を追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('特徴を保存できませんでした、再度試してください。'));
        }
        $this->set(compact('characteristic'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Characteristic id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $characteristic = $this->Characteristics->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $characteristic = $this->Characteristics->patchEntity($characteristic, $this->request->getData());
            if ($this->Characteristics->save($characteristic)) {
                $this->Flash->success('特徴を保存しました。');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('特徴を保存できませんでした、再度試してください。');
        }
        $this->set(compact('characteristic'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Characteristic id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $characteristic = $this->Characteristics->get($id);
        $characteristic = $this->Characteristics->patchEntity($characteristic, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->Characteristics->save($characteristic)) {
            $this->Flash->success('特徴を削除しました');
        } else {
            $this->Flash->error('特徴の削除に失敗しました');
        }

        return $this->redirect(['action' => 'index']);
    }
}
