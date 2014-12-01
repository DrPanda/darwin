<?php
App::uses('AppController', 'Controller');
/**
 * Students Controller
 *
 * @property Student $Student
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StudentsController extends AppController {

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
		$this->Student->recursive = 0;
		$this->set('students', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
		$student = $this->Student->find('first', $options);
		// var_dump($student);
		$this->set('student', $student);
		$this->loadModel('UnitSessions');
		$this->loadModel('Exercices');
		$this->set('session', $this->UnitSessions->findAllById($student['Student']['session_id'])[0]['UnitSessions']['name']);
		$this->set('exercices', $this->Exercices->find('list', array('fields' => array('Exercices.id', 'Exercices.subject'))));
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
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit exerice method
 *
 * @return void
 */

	public function edit_exercice() {
		$id = $this->request->data['StudentExercices']['id'];
		$this->loadModel('StudentExercice');
		if (!$this->StudentExercice->exists($id)) {
			throw new NotFoundException(__('Invalid student exercice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			var_dump($this->request->data);
			if ($this->StudentExercice->save($this->request->data)) {
				$this->redirect($this->referer());
			} else {
				$this->redirect($this->referer());
			}
		} 
		$this->redirect($this->referer());
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
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
			$this->request->data = $this->Student->find('first', $options);
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
		if ($this->Auth->user()['role'] == "assets") {
	        $this->redirect(array('controller' => 'UnitSessions', 'action' => 'index'));
	    }
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Student->delete()) {
			$this->Session->setFlash(__('The student has been deleted.'));
		} else {
			$this->Session->setFlash(__('The student could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
