<?php

namespace App\Models;

use CodeIgniter\Model;

class AutoriaiModel extends Model
{
	protected $table = 'autoriai';
	protected $primaryKey = 'id';
	protected $allowedFields = ['vardas', 'pavarde'];

	public function getAutoriai($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		}

		return $this->where(['id' => $id])->first();
	}

	public function getAutoriausKnygos($id = false)
	{
			$sql = "SELECT k.id, k.pavadinimas, k.kategorija, k.metai, k.populiarumas, k.likutis FROM knygos k JOIN autoriai a ON k.autoriaus_id=a.id WHERE a.id=?";
			$result = $this->query($sql, [$id]);
			return $result->getResultArray();
	}

	public function insertAutoriausKnyga($new_data)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('knygos');
		$builder->insert($new_data);
	}

	public function deleteAutoriausKnyga($id, $autoriaus_id)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('knygos');
		$builder->where('id', $id);
		$builder->where('autoriaus_id', $autoriaus_id);
		$builder->delete();
	}

}
