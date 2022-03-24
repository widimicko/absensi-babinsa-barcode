<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class AbsenceModel extends Model
{
  protected $table = "absences";
  protected $useTimestamps = true;
  protected $allowedFields = ['member_id', 'absence', 'date'];

  public function getAbsences() {
    $builder = $this->builder();
    $builder->select(
      'absences.id as id, members.id as member_id, 
      members.name as name, members.rank as rank, members.birthdate as birthdate,
      absences.absence as absence, absences.date as date,absences.created_at as created_at, absences.updated_at as updated_at');
    $builder->join('members', 'members.id = absences.member_id');
    $builder->orderby('created_at', 'DESC');
    $query = $builder->get();

    return $query->getResultArray();
  }

  public function getFilteredAbsences($absence, $created_at, $member_id) {
    $builder = $this->builder();
    $builder->select(
      'absences.id as id, members.id as member_id, 
      members.name as name, members.rank as rank, members.birthdate as birthdate,
      absences.absence as absence, absences.date as date,absences.created_at as created_at, absences.updated_at as updated_at');
    $builder->join('members', 'members.id = absences.member_id');
    $builder->where('absences.absence', $absence);
    $builder->where('absences.created_at', $created_at);
    $builder->where('members.id', $member_id);
    $builder->orderby('created_at', 'DESC');
    $query = $builder->get();

    return $query->getResultArray();
  }
}