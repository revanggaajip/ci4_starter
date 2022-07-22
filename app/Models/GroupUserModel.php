<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupUserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'auth_groups_users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['group_id', 'user_id'];

    public function updateUserFromGroup(int $userId, $groupId)
    {
        cache()->delete("{$groupId}_users");
        cache()->delete("{$userId}_groups");
        cache()->delete("{$userId}_permissions");

        return $this->save(
            ['group_id' => (int) $groupId], ['user_id' => $userId]);
    }

}