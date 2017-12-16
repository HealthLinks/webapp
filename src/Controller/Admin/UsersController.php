<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

	public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['resetpwd','login']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {   
        /* Pagination Limit Set */
        $pagination = 5;
        if(isset($this->request->data['page']) && !empty($this->request->data['page'])){
        $pagination = $this->request->data['page'];
        $this->request->session()->write('User.pagination',$pagination);
        $this->request->query['page'] = 1;
        }

        $this->set('loggedIn', false);
        $user = $this->Auth->user();
        $this->paginate = ['contain'=>['Roles'],
        'limit' => $pagination];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
        	$this->request->data['status'] = '1';
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
		$roles = $this->getUserRoles();
		$this->set('roles',$roles);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if($user['role'] == 'admin'){
            return $this->redirect(['action' => 'view',$id]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
		$roles = $this->getUserRoles();
		$this->set('roles',$roles);
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
		$this->viewBuilder()->layout('admin');
        if ($this->request->is('post')) {
        $user = $this->Auth->identify();

        if ($user) {
        $this->Auth->setUser($user);
        return $this->redirect('/admin');

     
        }

        $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }


    /* Reset Forgot Password View File */
     public function resetpwd()
    {   
	$this->viewBuilder()->layout('admin');
        if($this->request->is('post')) {

            $email = $this->request->data['email'];
            $userTable = TableRegistry::get('Users');
            $exists = $userTable->exists(['email' => $email]);

            if($exists == '1'){

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $hasher = new DefaultPasswordHasher();
            $hashedPassword = $hasher->hash($randomString);

            $emailObj = new Email();
            
            try {
                  $res = $emailObj->from('dev12sebiz@gmail.com')
                      ->to($email)
                      ->subject('TEST SITE - New Requested Password')                   
                      ->send('Please find your Requested Password - '.$randomString);

                  $this->Flash->success('Email Sent. Please Check Your Email containing New Password');

                  $query = $userTable->query();
                  $query->update()
                            ->set(['password' => $hashedPassword])
                            ->where(['email' => $email])
                            ->execute();

                $this->redirect(array('action' => 'login'));

                } catch (Exception $e) {

                    echo 'Exception : ',  $e->getMessage(), "\n";

                }

            }else{

                $this->Flash->error('No Such E-mail address registerd with us');
            }
        }

    }



    public function editProfile()
    {
        $currentUser = $this->Auth->user();
        $this->set('user', $currentUser);
        $this->set('_serialize', ['user']);
        $userId = $currentUser['id'];
        $userRole = $currentUser['role'];
        
        if($userRole == 'admin'){

            $user_details = $this->Users->get($userId);
            if ($this->request->is(['post', 'put'])) {
                $this->Users->patchEntity($user_details, $this->request->data);
                
                if ($this->Users->save($user_details)) {
                    $this->request->session()->write('Auth.User.username',$this->request->data['username']);
                    $this->Flash->success(__('Your Profile has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your user.'));
            }

            $this->set('user', $user_details);
            
        }
      }


    public function changePassword()
    {
         $user =$this->Users->get($this->Auth->user('id'));
        if (!empty($this->request->data)) {
            $user = $this->Users->patchEntity($user, [
                    'old_password'  => $this->request->data['old_password'],
                    'password'      => $this->request->data['password2'],
                    'password1'     => $this->request->data['password1'],
                    'password2'     => $this->request->data['password2']
                ],
                  ['validate' => 'password']
            );
            if ($this->Users->save($user)) {
                $this->Flash->success('The password is successfully changed');
                $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('There was an error during the save!');
            }
        }
        $this->set('user',$user);
    }

	private function getUserRoles () {
		$this->loadModel('Roles');
		$roles = $this->Roles->find('all')->toArray();
		return($roles);
	}
}
