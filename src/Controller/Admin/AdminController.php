<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class AdminController extends AppController
{

	 public function index()
    {	
    	$this->set('loggedIn', false);
    	$user = $this->Auth->user();
        $this->set('user', $user);
    	$userId = $user['id'];

    	if(isset($userId) && !empty($userId)){
    		$this->set('loggedIn', true);
    	}
    }

    public function logout()
    {	
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}



