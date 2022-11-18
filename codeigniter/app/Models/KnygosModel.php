<?php

namespace App\Models;

use CodeIgniter\Model;

class KnygosModel extends Model
{
	protected $table = 'knygos';
	protected $primaryKey = 'id';
	protected $allowedFields = ['pavadinimas', 'kategorija', 'metai', 'populiarumas', 'likutis'];

	public function getKnygos($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		}

		return $this->where(['id' => $id])->first();
	}
}
