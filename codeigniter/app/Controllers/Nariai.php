<?php
namespace App\Controllers;

class Nariai extends BaseController
{

public function __construct(){
  $this->model = model(NariaiModel::class);
}

    public function index()    {
		$data = array(
      'title' => "Nariai",
			'nariai' => $this->model->getNariai()
		);
    $this->template('nariai', $data);
    }

    public function naujas() {
      helper('form');

      $validation_rules = [
        'vardas' => 'required',
        'pavarde' => 'required',
        'el_pastas' => 'required',
        'tel_nr' => 'required'
      ];

      if ($this->validate($validation_rules)) {

        $request = \Config\Services::request();

        $new_data = [
          'vardas' => $request->getPost('vardas', FILTER_SANITIZE_STRING),
          'pavarde' => $request->getPost('pavarde', FILTER_SANITIZE_STRING),
          'el_pastas' => $request->getPost('el_pastas', FILTER_SANITIZE_STRING),
          'tel_nr' => $request->getPost('tel_nr', FILTER_SANITIZE_STRING)
        ];

        $this->model->insert($new_data);

        return redirect()->to('nariai');
      }

      $data = array(
        'title' => "Narys",
        'edit' => false
      );
      $this->template('narys', $data);
    }

    public function redaguoti($id = false) {
      helper('form');

      $validation_rules = [
        'vardas' => 'required'
      ];

      if ($this->validate($validation_rules)) {

        $request = \Config\Services::request();

        $updated_data = [
          'vardas' => $request->getPost('vardas', FILTER_SANITIZE_STRING),
          'pavarde' => $request->getPost('pavarde', FILTER_SANITIZE_STRING),
          'el_pastas' => $request->getPost('el_pastas', FILTER_SANITIZE_STRING),
          'tel_nr' => $request->getPost('tel_nr', FILTER_SANITIZE_STRING)
        ];
        $nario_id = $request->getPost('id', FILTER_SANITIZE_STRING);
        $this->model->update($nario_id, $updated_data);

        return redirect()->to('nariai');
      }

  		$data = array(
        'title' => "Narys",
        'edit' => true,
  			'narys' => $this->model->getNariai($id),
        'visos_knygos' => $this->model->getVisosKnygos($id)
  		);
      $this->template('narys', $data);
    }

public function prideti_uzsakyma($knygos_id, $nario_id, $populiarumas)
{
  date_default_timezone_set('Europe/Riga');
  $date = date("Y/m/d");
  if ($populiarumas=='didelis') {
    $retdate = date('Y-m-d', strtotime($date. ' + 7 days'));
  }
  elseif ($populiarumas=='vidutinis') {
    $retdate = date('Y-m-d', strtotime($date. ' + 30 days'));
  }
  else {
    $retdate = date('Y-m-d', strtotime($date. ' + 60 days'));
  }
    $new_data = [
      'nario_id' => $nario_id,
      'knygos_id' => $knygos_id,
      'isdavimo_data' => $date,
      'grazinti_iki' => $retdate,
      'busena' => 'išduota'
    ];
    echo $nario_id;
    if (!empty($new_data['nario_id']) && !empty($new_data['knygos_id'])) {
        $this->model->insertNaujasUzsakymas($new_data);
    } else {
      echo "Ne visi duomenys pateikti";
      exit();
    }
    return redirect()->to("uzsakymai");
}

public function istrinti($id = false)
{
  $this->model->delete($id);
  return redirect()->to('nariai');
}

}
