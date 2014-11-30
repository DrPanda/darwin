<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add', 'logout');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->Auth->user()['role'] == "assets") {
	        $this->redirect(array('controller' => 'UnitSessions', 'action' => 'index'));
	    }
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if ($this->Auth->user()['role'] == "assets") {
	        $this->redirect(array('controller' => 'UnitSessions', 'action' => 'index'));
	    }
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->Auth->user()['role'] == "assets") {
	        $this->redirect(array('controller' => 'UnitSessions', 'action' => 'index'));
	    }
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if ($this->Auth->user()['role'] == "assets") {
	        $this->redirect(array('controller' => 'UnitSessions', 'action' => 'index'));
	    }
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	public function passwd($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if ($this->Auth->user()['role'] == "assets") {
	        $this->redirect(array('controller' => 'UnitSessions', 'action' => 'index'));
	    }
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	      		if ($this->Auth->user('is_active') == 0) {
		            $this->Auth->logout();
					$this->Session->setFlash(__('Your account is not active.'));
			    } else if ($this->Auth->user('is_active') == 1) {
		            return $this->redirect($this->Auth->redirect(array('controller' => 'UnitSessions', 'action' => 'index')));
			    }
	        } else {
	            $this->Session->setFlash(__("Username or password invalid, please try again."));
	        }
	    }
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}
}
