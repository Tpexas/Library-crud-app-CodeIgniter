<?php

namespace App\Models;

use CodeIgniter\Model;

class UzsakymaiModel extends Model
{
	protected $table = 'uzsakymai';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nario_id', 'knygos_id', 'isdavimo_data', 'grazinti_iki', 'busena', 'grazinimo_data'];
	public function getUzsakymai($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		}

		return $this->where(['id' => $id])->first();
	}

	public function Grazinimas($new_data, $id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('uzsakymai');
		$builder->where('id', $id);
		$builder->update($new_data);
	}

}
