<?php
App::uses('AppController', 'Controller');
/**
 * Exercices Controller
 *
 * @property Exercice $Exercice
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ExercicesController extends AppController {

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
		$this->Exercice->recursive = 0;
		$this->set('exercices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Exercice->exists($id)) {
			throw new NotFoundException(__('Invalid exercice'));
		}
		$options = array('conditions' => array('Exercice.' . $this->Exercice->primaryKey => $id));
		$this->set('exercice', $this->Exercice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Exercice->create();
			if ($this->Exercice->save($this->request->data)) {
				$this->Session->setFlash(__('The exercice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The exercice could not be saved. Please, try again.'));
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
		if (!$this->Exercice->exists($id)) {
			throw new NotFoundException(__('Invalid exercice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Exercice->save($this->request->data)) {
				$this->Session->setFlash(__('The exercice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The exercice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Exercice.' . $this->Exercice->primaryKey => $id));
			$this->request->data = $this->Exercice->find('first', $options);
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
		$this->Exercice->id = $id;
		if (!$this->Exercice->exists()) {
			throw new NotFoundException(__('Invalid exercice'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Exercice->delete()) {
			$this->Session->setFlash(__('The exercice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The exercice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
