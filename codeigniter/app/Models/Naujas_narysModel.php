<?php

namespace App\Models;

use CodeIgniter\Model;

class Naujas_narysModel extends Model
{
	protected $table = 'naujas_narys';

	public function getNaujas_narys($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		}

		return $this->where(['id' => $id])->first();
	}


}
