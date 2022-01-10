<?php

namespace App\Models; 
use CodeIgniter\Model;

class SuratModel extends Model
{    
    protected $DBGroup          = 'default';
    protected $table            = 'surat';
    protected $primaryKey       = 'id_surat';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
	protected $allowedFields        = [
		'isi_surat',
		'file_surat',
        'id_status',
        'id_user',
        'id_kategori',
        'id_status_kerjasama',
        'id_dnk',
        'draft_naskah'
	];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getSurat()
    {
        $query = $this->db->table('surat')
            ->join('users', 'users.id = surat.id_user')
            ->join('status_surat', 'status_surat.id_status = surat.id_status')
            ->join('kategori_surat', 'kategori_surat.id_kategori = surat.id_kategori')
            ->join('status_kerjasama', 'status_kerjasama.id_status_kerjasama = surat.id_status_kerjasama')
            ->join('draft_naskah_kerjasama', 'draft_naskah_kerjasama.id_dnk = surat.id_dnk')
            ->get();
        return $query;
    }

    public function allSurat()
    {
        $builder = $this->db->table('surat');
        $query = $builder->countAll();
        return $query;
    }

    public function getSuratByID()
    {
        $query = $this->db->table('surat')
            ->join('users', 'users.id = surat.id_user')
            ->join('status_surat', 'status_surat.id_status = surat.id_status')
            ->join('kategori_surat', 'kategori_surat.id_kategori = surat.id_kategori')
            ->join('status_kerjasama', 'status_kerjasama.id_status_kerjasama = surat.id_status_kerjasama')
            ->join('draft_naskah_kerjasama', 'draft_naskah_kerjasama.id_dnk = surat.id_dnk')
            ->where(['id_user'=>session()->get('id')])
            ->get();
        return $query;
    }
}