<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\User;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Administrations Controller
 *
 * @method \App\Model\Entity\Administration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdministrationsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login', 'subscribe']);
    }

    public function dashboard()
    {
    }

    public function subscribe()
    {
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        if ($this->request->getData()) {
            $user = $usersTable->newEntity($this->request->getData());
            $usersTable->save($user);
            $this->redirect(['controller' => 'Administrations', 'action' => 'login']);
            return;
        }

        $user = $usersTable->newEmptyEntity();

        $this->set(compact('user'));
    }

    public function login()
    {
        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/dashboard';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Administrations', 'action' => 'login']);
    }
}
