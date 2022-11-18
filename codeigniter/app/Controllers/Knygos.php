<?php

namespace App\Controllers;

class Knygos extends BaseController
{
  public function __construct(){
    $this->model = model(KnygosModel::class);
  }

    public function index(){
		$data = array(
      'title' => "Knygos",
			'knygos' => $this->model->getKnygos(),
		);
        $this->template('knygos', $data);
    }



    public function redaguoti($id = false){
      helper('form');

      $validation_rules = [
        'pavadinimas' => 'required',
        'kategorija' => 'required',
        'metai' => 'required',
        'likutis' => 'required'
      ];

      if ($this->validate($validation_rules)) {

        $request = \Config\Services::request();

        $updated_data = [
          'pavadinimas' => $request->getPost('pavadinimas', FILTER_SANITIZE_STRING),
          'kategorija' => $request->getPost('kategorija', FILTER_SANITIZE_STRING),
          'metai' => $request->getPost('metai', FILTER_SANITIZE_STRING),
          'populiarumas' => $request->getPost('populiarumas', FILTER_SANITIZE_STRING),
          'likutis' => $request->getPost('likutis', FILTER_SANITIZE_STRING)
        ];

        $this->model->update($request->getPost('id', FILTER_SANITIZE_STRING), $updated_data);
        return redirect()->to('knygos');
      }

      $data = array(
        'title' => "Knyga",
        'edit' => true,
        'knyga' => $this->model->getKnygos($id),
      );
      $this->template('knyga', $data);
    }

    public function istrinti($id = false)
    {
      $this->model->delete($id);
      return redirect()->to('knygos');
    }
}
