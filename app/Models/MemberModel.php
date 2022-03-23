<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class MemberModel extends Model
{
    protected $table = "members";
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'image', 'rank', 'birthdate', 'credential'];
}