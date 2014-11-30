<?php
App::uses('AppController', 'Controller');
/**
 * UnitSessions Controller
 *
 * @property UnitSession $UnitSession
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UnitSessionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UnitSession->recursive = 0;
		$this->set('unitSessions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UnitSession->exists($id)) {
			throw new NotFoundException(__('Invalid unit session'));
		}
		$options = array('conditions' => array('UnitSession.' . $this->UnitSession->primaryKey => $id));
		$this->set('unitSession', $this->UnitSession->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UnitSession->create();
			// debug($this->request->data); die();
			
			if ($this->UnitSession->save($this->request->data)) {
				$this->Session->setFlash(__('The unit session has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The unit session could not be saved. Please, try again.'));
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
		if (!$this->UnitSession->exists($id)) {
			throw new NotFoundException(__('Invalid unit session'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UnitSession->save($this->request->data)) {
				$this->Session->setFlash(__('The unit session has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The unit session could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UnitSession.' . $this->UnitSession->primaryKey => $id));
			$this->request->data = $this->UnitSession->find('first', $options);
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
		$this->UnitSession->id = $id;
		if (!$this->UnitSession->exists()) {
			throw new NotFoundException(__('Invalid unit session'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UnitSession->delete()) {
			$this->Session->setFlash(__('The unit session has been deleted.'));
		} else {
			$this->Session->setFlash(__('The unit session could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
