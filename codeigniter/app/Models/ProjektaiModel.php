<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjektaiModel extends Model
{
	protected $table = 'projektai';

	public function getProjektai($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		}

		return $this->where(['id' => $id])->first();
	}


}
