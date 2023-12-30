<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
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
        $categories = $this->paginate($this->Categories->find()->where(['deleted IS NULL']));

        $this->set(compact('categories'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('カテゴリーを追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('カテゴリーを保存できませんでした、再度試してください。'));
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success('カテゴリーを保存しました。');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('カテゴリーを保存できませんでした、再度試してください。');
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $category = $this->Categories->get($id);
        $category = $this->Categories->patchEntity($category, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->Categories->save($category)) {
            $this->Flash->success('カテゴリーを削除しました');
        } else {
            $this->Flash->error('カテゴリーの削除に失敗しました');
        }

        return $this->redirect(['action' => 'index']);
    }
}
