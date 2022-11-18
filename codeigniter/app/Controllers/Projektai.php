<?php

namespace App\Controllers;

class Projektai extends BaseController
{
    public function index()
    {
		$model = model(ProjektaiModel::class);

		$data = array(
			'test' => "labas pasauli",
			'projektai' => $model->getProjektai()
		);

        return view('projektai', $data);
    }

}
