<?php

namespace App\Controllers;

class Uzsakymai extends BaseController
{

  public function __construct(){
    $this->model = model(UzsakymaiModel::class);
  }

  public function index()    {
  $data = array(
    'title' => "Uzsakymai",
    'uzsakymai' => $this->model->getUzsakymai()
  );
      $this->template('uzsakymai', $data);
  }

  public function grazinti($id)
  {
    date_default_timezone_set('Europe/Riga');
    $date = date("Y/m/d");

    $new_data = [
      'busena' => 'grąžinta',
      'grazinimo_data' => $date
    ];
    $this->model->Grazinimas($new_data, $id);
    	return redirect()->to("uzsakymai");
  }

}
