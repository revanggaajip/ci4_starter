<?php

namespace App\Models;

class GroupModel extends \Myth\Auth\Authorization\GroupModel
{
    public function updateUserFromGroup(int $userId, $groupId)
    {
        cache()->delete("{$groupId}_users");
        cache()->delete("{$userId}_groups");
        cache()->delete("{$userId}_permissions");

        return $this->save(
            ['group_id' => (int) $groupId], ['user_id' => $userId]);
    }
}