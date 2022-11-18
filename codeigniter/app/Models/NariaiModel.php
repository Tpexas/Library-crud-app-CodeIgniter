<?php
namespace App\Models;

use CodeIgniter\Model;

class NariaiModel extends Model
{
	protected $table = 'nariai';
	protected $primaryKey = 'id';
	protected $allowedFields = ['vardas', 'pavarde', 'el_pastas', 'tel_nr'];

	public function getNariai($id = false)
	{
		if ($id === false) {
			return $this->findAll();
		}

		return $this->where(['id' => $id])->first();
	}

	public function getVisosKnygos($id = false)
	{
		$sql = "SELECT * FROM knygos";
		$result = $this->query($sql, [$id]);
		return $result->getResultArray();
	}

	public function insertNaujasUzsakymas($new_data)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('uzsakymai');
		$builder->insert($new_data);
	}

}
