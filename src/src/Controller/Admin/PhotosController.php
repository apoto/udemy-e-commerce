<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Photos Controller
 *
 * @property \App\Model\Table\PhotosTable $Photos
 * @method \App\Model\Entity\Photos[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhotosController extends AppController
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
    public function index($productId)
    {
        $photos = $this->paginate($this->Photos->find()
        ->where(['product_id' => $productId, 'deleted IS NULL']));

        $this->set(compact('productId', 'photos'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($productId)
    {
        $photo = $this->Photos->newEmptyEntity();
        if ($this->request->is('post')) {
            $photo = $this->Photos->patchEntity(
                $photo,
                $this->request->getData() + ['product_id' => $productId]
            );
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('写真を追加しました。'));

                return $this->redirect(['action' => 'index', $productId]);
            }
            $this->Flash->error(__('写真を保存できませんでした、再度試してください。'));
        }
        $this->set(compact('photo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id photos id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photo = $this->Photos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Photos->patchEntity($photo, $this->request->getData());
            if ($this->Photos->save($photo)) {
                $this->Flash->success('写真を保存しました。');

                return $this->redirect(['action' => 'index', $photo->product_id]);
            }
            $this->Flash->error('写真を保存できませんでした、再度試してください。');
        }
        $this->set(compact('photo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Photos id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $photo = $this->Photos->get($id);
        $photo = $this->Photos->patchEntity($photo, ['deleted' => date('Y-m-d H:i:s')]);

        if ($this->Photos->save($photo)) {
            $this->Flash->success('写真を削除しました');
        } else {
            $this->Flash->error('写真の削除に失敗しました');
        }

        return $this->redirect(['action' => 'index', $photo->product_id]);
    }
}
