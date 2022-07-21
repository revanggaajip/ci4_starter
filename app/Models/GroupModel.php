<?php

namespace App\Models;

class GroupModel extends \Myth\Auth\Authorization\GroupModel
{
    public function updateUserFromGroup(int $userId, $groupId)
    {
        cache()->delete("{$groupId}_users");
        cache()->delete("{$userId}_groups");
        cache()->delete("{$userId}_permissions");

        return $this->db->table('auth_groups_users')
            ->where('user_id', $userId)->update([
                'user_id'  => $userId,
                'group_id' => (int) $groupId
            ]);
    }
}