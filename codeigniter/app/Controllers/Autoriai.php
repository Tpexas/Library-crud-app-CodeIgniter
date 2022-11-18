<?php

namespace App\Controllers;

class Autoriai extends BaseController
{
  public function __construct(){
    $this->model = model(AutoriaiModel::class);
  }

    public function index()    {
		$data = array(
      'title' => "Autoriai",
			'autoriai' => $this->model->getAutoriai()
		);
        $this->template('autoriai', $data);
    }

    public function naujas() {
      helper('form');

      $validation_rules = [
        'vardas' => 'required',
        'pavarde' => 'required',
      ];

      if ($this->validate($validation_rules)) {

        $request = \Config\Services::request();

        $new_data = [
          'vardas' => $request->getPost('vardas', FILTER_SANITIZE_STRING),
          'pavarde' => $request->getPost('pavarde', FILTER_SANITIZE_STRING)
        ];

        $this->model->insert($new_data);

        return redirect()->to("autoriai");
      }

      $data = array(
        'title' => "Autorius",
        'edit' => false
      );
      $this->template('autorius', $data);
    }



    public function redaguoti($id = false) {
      helper('form');

      $validation_rules = [
        'vardas' => 'required',
        'pavarde' => 'required',
      ];

      if ($this->validate($validation_rules)) {

        $request = \Config\Services::request();

        $updated_data = [
          'vardas' => $request->getPost('vardas', FILTER_SANITIZE_STRING),
          'pavarde' => $request->getPost('pavarde', FILTER_SANITIZE_STRING)
        ];
                $autoriaus_id = $request->getPost('id', FILTER_SANITIZE_STRING);
          			$this->model->update($autoriaus_id, $updated_data);



        if ( $request->getPost('prideti_autoriaus_knyga', FILTER_SANITIZE_STRING) !== NUll ) {
          $new_data = [
            'autoriaus_id' => $autoriaus_id,
            'pavadinimas' => $request->getPost('pavadinimas', FILTER_SANITIZE_STRING),
            'kategorija' => $request->getPost('kategorija', FILTER_SANITIZE_STRING),
            'metai' => $request->getPost('metai', FILTER_SANITIZE_STRING),
            'populiarumas' => $request->getPost('populiarumas', FILTER_SANITIZE_STRING),
            'likutis' => $request->getPost('likutis', FILTER_SANITIZE_STRING)
          ];

          if (!empty($new_data['autoriaus_id']) && !empty($new_data['pavadinimas']) && !empty($new_data['kategorija']) && !empty($new_data['metai']) && !empty($new_data['likutis']) && !empty($new_data['populiarumas'])) {
              $this->model->insertAutoriausKnyga($new_data);
  				} else {
  					echo "Ne visi duomenys pateikti";
  					exit();
  				}
          return redirect()->to("autoriai/redaguoti/$id");
        }
        return redirect()->to('autoriai');
      }

      $data = array(
        'title' => "Autorius",
        'edit' => true,
        'autorius' => $this->model->getAutoriai($id),
        'autoriaus_knygos' => $this->model->getAutoriausKnygos($id),

      );
      $this->template('autorius', $data);
    }



    public function istrinti($id = false)
    {
      $this->model->delete($id);
      return redirect()->to('autoriai');
    }

    public function istrinti_knyga($id, $autoriaus_id)
    {
      $this->model->deleteAutoriausKnyga($id, $autoriaus_id);
      return redirect()->to("/autoriai/redaguoti/$autoriaus_id");
    }

}
