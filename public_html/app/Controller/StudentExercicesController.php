<?php
App::uses('AppController', 'Controller');
/**
 * StudentExercices Controller
 *
 * @property StudentExercice $StudentExercice
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StudentExercicesController extends AppController {

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
		$this->StudentExercice->recursive = 0;
		$this->set('studentExercices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StudentExercice->exists($id)) {
			throw new NotFoundException(__('Invalid student exercice'));
		}
		$options = array('conditions' => array('StudentExercice.' . $this->StudentExercice->primaryKey => $id));
		$this->set('studentExercice', $this->StudentExercice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StudentExercice->create();
			if ($this->StudentExercice->save($this->request->data)) {
				$this->Session->setFlash(__('The student exercice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student exercice could not be saved. Please, try again.'));
			}
		}
		$exercices = $this->StudentExercice->Exercice->find('list');
		$students = $this->StudentExercice->Student->find('list');
		$this->set(compact('exercices', 'students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StudentExercice->exists($id)) {
			throw new NotFoundException(__('Invalid student exercice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StudentExercice->save($this->request->data)) {
				$this->Session->setFlash(__('The student exercice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student exercice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StudentExercice.' . $this->StudentExercice->primaryKey => $id));
			$this->request->data = $this->StudentExercice->find('first', $options);
		}
		$exercices = $this->StudentExercice->Exercice->find('list');
		$students = $this->StudentExercice->Student->find('list');
		$this->set(compact('exercices', 'students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StudentExercice->id = $id;
		if (!$this->StudentExercice->exists()) {
			throw new NotFoundException(__('Invalid student exercice'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StudentExercice->delete()) {
			$this->Session->setFlash(__('The student exercice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The student exercice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
