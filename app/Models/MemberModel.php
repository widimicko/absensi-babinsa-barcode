<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class MemberModel extends Model
{
    protected $table = "members";
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'nrp', 'image', 'rank', 'birthdate', 'credential'];
}