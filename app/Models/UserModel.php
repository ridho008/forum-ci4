<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
   protected $table = 'user';
   protected $primaryKey = 'id';
   protected $allowedFields = ['username', 'password', 'salt', 'nama', 'email', 'tgl_lahir', 'alamat', 'no_telp', 'avatar', 'role', 'created_at', 'created_by', 'updated_at', 'updated_by'];
   protected $returnType = 'App\Entities\User';
   protected $useTimestamps = false;
}