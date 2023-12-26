<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // 認証を必要としないログインアクションを構成し、
        // 無限リダイレクトループの問題を防ぎます
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    /**
     * Connection
     */
    public function login()
    {
        $this->getRequest()->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // POST, GET を問わず、ユーザーがログインしている場合はリダイレクトします
        if ($result && $result->isValid()) {
            return $this->redirect(['controller' => 'Commands', 'action' => 'index']);
        }
        
        // ユーザーが submit 後、認証失敗した場合は、エラーを表示します
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }

        $this->viewBuilder()->setLayout('BackTheme.login');
    }

    /**
     * Deconnection
     */
    // in src/Controller/UsersController.php
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // POST, GET を問わず、ユーザーがログインしている場合はリダイレクトします
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $this->Flash->error('ログアウトできませんでした。');
        return $this->redirect($this->referer());
    }
}
