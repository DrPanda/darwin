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
		// $this->UnitSession->recursive = 0;
		$this->set('unitSessions', $this->Paginator->paginate());
		$options = array('conditions' => array('UnitSession.' . $this->UnitSession->primaryKey => $id));
		$this->set('unitSession', $this->UnitSession->find('first', $options));
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
			$this->UnitSession->create();
			if ($this->UnitSession->save($this->request->data)) {
				if ($this->request->data['UnitSession']['csv_file']['size'] > 0)
				{
					$extension = strtolower(pathinfo($this->request->data['UnitSession']['csv_file']['name'], PATHINFO_EXTENSION));
					$filename = $this->request->data['UnitSession']['csv_file']['tmp_name'];
					var_dump($this->request->data['UnitSession']['csv_file']);
					die();
					if(
						!empty($filename) &&
						in_array($extension, array('csv'))
						){
						$file = fopen($filename, 'r');
						$csv_line = fgetcsv($file, 10000, "\r");
						$tmp = false;
						foreach ($csv_line as $value) {
							if ($tmp === true)// && isset($csv_field[20]) && isset($csv_field[19]) && isset($csv_field[31]))
							{
								$csv_field = explode(";", $value);
								$data = array(
									'Student' => array(
										'session_id' => $this->UnitSession->id,
										'id' => $csv_field[20],
										'first_name' => $csv_field[19],
										'last_name' => $csv_field[31]
									)
								);
								$this->loadModel('Student');
								$this->Student->create();
								$this->Student->save($data);
							}
							$tmp = true;
						}
						fclose($file);

						// }
						move_uploaded_file(
							$this->request->data['UnitSession']['csv_file']['tmp_name'],
							WWW_ROOT . DS . 'files' . DS . 'csvs' . DS . $this->UnitSession->id . '.' . $extension);
						// $this->UnitSession->saveField('files', $extension);
					$this->Session->setFlash(__('The unit session has been saved.'));
					// return $this->redirect(array('action' => 'index'));
					}
				}

			}

			// 	$extension = strtolower(pathinfo($this->request->data['UnitSession']['csv_file']['name'], PATHINFO_EXTENSION));
			// 	if(
			// 		!empty($this->request->data['UnitSession']['label']['tmp_name']) &&
			// 		in_array($extension, array('csv'))
			// 		){
			// 		move_uploaded_file(
			// 			$this->request->data['UnitSession']['csv_file']['tmp_name'],
			// 			FILES . 'UnitSession' . DS . $this->UnitSession->id . '.' . $extension);
			// 		$this->UnitSession->saveField('files', $extension);
			// 	$this->Session->setFlash(__('The unit session has been saved.'));
				return $this->redirect(array('action' => 'index'));
			// } else {
				// $this->Session->setFlash(__('The unit session could not be saved. Please, try again.'));
			// }
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
		// var_dump($this->request->data);
		// die();
		if (!$this->UnitSession->exists($id)) {
			throw new NotFoundException(__('Invalid unit session'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UnitSession->save($this->request->data)) {
				if ($this->request->data['UnitSession']['csv_file']['size'] > 0)
				{
					$extension = strtolower(pathinfo($this->request->data['UnitSession']['csv_file']['name'], PATHINFO_EXTENSION));
					$filename = $this->request->data['UnitSession']['csv_file']['tmp_name'];
					// echo $extension;
					// var_dump(in_array($extension, array('csv')));
					// die();
					if(!empty($filename) && (in_array($extension, array('csv')) === TRUE) )
					{
						$file = fopen($filename, 'r');
						$csv_line = fgetcsv($file, 0, "\r");
						$tmp = false;
						foreach ($csv_line as $value) {
							if ($tmp === true)
							{
								$csv_field = explode(";", $value);
								// var_dump($csv_field);
								$data = array(
									'Student' => array(
										'session_id' => $this->UnitSession->id,
										'id' => $csv_field[20],
										'first_name' => $csv_field[19],
										'last_name' => $csv_field[31]
									)
								);
								$this->loadModel('Student');
								$this->Student->create();
								$this->Student->save($data);
							}
							$tmp = true;
						}
						fclose($file);

						// }
						move_uploaded_file(
							$this->request->data['UnitSession']['csv_file']['tmp_name'],
							WWW_ROOT . DS . 'files' . DS . 'csvs' . DS . $this->UnitSession->id . '.' . $extension);
						// $this->UnitSession->saveField('files', $extension);
						$this->Session->setFlash(__('The student has been saved.'));
						// return $this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The file can\'t be uploaded.'));
						return;
					}
				}
				$this->Session->setFlash(__('The unit session has been edited.'));
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
		if ($this->Auth->user()['role'] == "assets") {
	        $this->redirect(array('controller' => 'UnitSessions', 'action' => 'index'));
	    }
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

// 	public $useTable = 'Student';
//  	var $components = array('Export.Export', 'comment');

// 	public function export() {
// 		$this->Student->contain('Comment');
//     	$data = $this->Student->find('all');
//     	$this->Export->exportCsv($data);
// }
	public function export($id = NULL) {
		if (!$this->UnitSession->exists($id)) {
			throw new NotFoundException(__('Invalid unit session'));
		}
		$options = array('conditions' => array('UnitSession.' . $this->UnitSession->primaryKey => $id));
		$this->set('unitSession', $this->UnitSession->find('first', $options));
		if ($this->Auth->user()['role'] == "assets") {
			$this->redirect(array('controller' => 'UnitSessions', 'action' => 'index'));
		}
		$this->loadModel('UnitSession');
		$filename = WWW_ROOT . 'files' . DS . 'csvs' . DS . $id . ".csv";
		// $filename = '../webroot/files/csvs/' . $id . '.csv';
		var_dump($id);
		// die();
		$csv_line = array();
		if(!empty($filename))
					{
						$file = fopen($filename, 'r');
						$csv_line = fgetcsv($file, 0, '\r');
						$tmp = false;

						// $options = array('conditions' => array('Student.' . $this->Student->comment => $comment));
						// $student = $this->Student->find('first', $options);
						$this->loadModel('Student');
						// $this->Student->create();
						// $this->Student->save($data);
					//	var_dump($this->Student->findAllById($student['Student']['id']));
						// return $this->redirect(array('action' => 'index'));
						// die();
						foreach ($csv_line as $value) {
							if ($tmp === true)
							{
								$csv_field = explode(";", $value);
								// $data = array(
								// 	'Student' => array(
								// 		'session_id' => $this->UnitSession->id,
								// 		'id' => $csv_field[20],
								// 		'first_name' => $csv_field[19],
								// 		'last_name' => $csv_field[31]
								// 	)
								// );
								$csv_line[50] = $this->Student['id']['comment'];
								// $this->Student->create();
								// $this->Student->save($data);
							}
							$tmp = true;
						}
						fclose($file);
		return $this->redirect(array('action' => 'index'));
		}
	}
}