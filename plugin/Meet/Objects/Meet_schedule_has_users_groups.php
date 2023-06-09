<?php
require_once dirname(__FILE__) . '/../../../videos/configuration.php';

if(empty($global)){
    $global = [];
}
class Meet_schedule_has_users_groups extends ObjectYPT
{
    protected $id;
    protected $meet_schedule_id;
    protected $users_groups_id;

    public static function getSearchFieldsNames()
    {
        return [];
    }

    public static function getTableName()
    {
        return 'meet_schedule_has_users_groups';
    }

    public static function getAllFromSchedule($meet_schedule_id)
    {
        global $global;
        if(empty($global)){
            $global = [];
        }
        if (!static::isTableInstalled()) {
            return false;
        }
        $meet_schedule_id = intval($meet_schedule_id);

        if (empty($meet_schedule_id)) {
            return false;
        }
        $sql = "SELECT u.*, ml.* FROM  " . static::getTableName() . " ml "
                . " LEFT JOIN users_groups u ON u.id = ml.users_groups_id "
                . "WHERE meet_schedule_id=$meet_schedule_id ";

        $sql .= self::getSqlFromPost();
        $res = sqlDAL::readSql($sql);
        $fullData = sqlDAL::fetchAllAssoc($res);
        sqlDAL::close($res);
        $rows = [];
        if ($res != false) {
            foreach ($fullData as $row) {
                $row = cleanUpRowFromDatabase($row);
                $rows[] = $row;
            }
        } else {
            die($sql . '\nError : (' . $global['mysqli']->errno . ') ' . $global['mysqli']->error);
        }
        return $rows;
    }

    public static function getAllMeet_schedule()
    {
        global $global;
        if(empty($global)){
            $global = [];
        }
        $table = "meet_schedule";
        $sql = "SELECT * FROM {$table} WHERE 1=1 ";

        $sql .= self::getSqlFromPost();
        $res = sqlDAL::readSql($sql);
        $fullData = sqlDAL::fetchAllAssoc($res);
        sqlDAL::close($res);
        $rows = [];
        if ($res != false) {
            foreach ($fullData as $row) {
                $rows[] = $row;
            }
        } else {
            _error_log($sql . ' Error : (' . $global['mysqli']->errno . ') ' . $global['mysqli']->error);
        }
        return $rows;
    }

    public static function getAllUsers_groups()
    {
        global $global;
        if(empty($global)){
            $global = [];
        }
        $table = "users_groups";
        $sql = "SELECT * FROM {$table} WHERE 1=1 ";

        $sql .= self::getSqlFromPost();
        $res = sqlDAL::readSql($sql);
        $fullData = sqlDAL::fetchAllAssoc($res);
        sqlDAL::close($res);
        $rows = [];
        if ($res != false) {
            foreach ($fullData as $row) {
                $rows[] = $row;
            }
        } else {
            _error_log($sql . ' Error : (' . $global['mysqli']->errno . ') ' . $global['mysqli']->error);
        }
        return $rows;
    }

    public function setId($id)
    {
        $this->id = intval($id);
    }

    public function setMeet_schedule_id($meet_schedule_id)
    {
        $this->meet_schedule_id = intval($meet_schedule_id);
    }

    public function setUsers_groups_id($users_groups_id)
    {
        $this->users_groups_id = intval($users_groups_id);
    }

    public function getId()
    {
        return intval($this->id);
    }

    public function getMeet_schedule_id()
    {
        return intval($this->meet_schedule_id);
    }

    public function getUsers_groups_id()
    {
        return intval($this->users_groups_id);
    }

    public static function saveUsergroupsToMeet($meet_schedule_id, $user_groups_ids)
    {
        self::deleteAllFromMeet($meet_schedule_id);
        if (!is_array($user_groups_ids)) {
            return false;
        }
        foreach ($user_groups_ids as $value) {
            $ms = new Meet_schedule_has_users_groups(0);
            $ms->setUsers_groups_id($value);
            $ms->setMeet_schedule_id($meet_schedule_id);
            $ms->save();
        }
        return true;
    }

    public static function deleteAllFromMeet($meet_schedule_id)
    {
        global $global;
        if (!empty($meet_schedule_id)) {
            $sql = "DELETE FROM " . static::getTableName() . " ";
            $sql .= " WHERE meet_schedule_id = ?";
            $global['lastQuery'] = $sql;
            //_error_log("Delete Query: ".$sql);
            return sqlDAL::writeSql($sql, "i", [$meet_schedule_id]);
        }
        _error_log("Id for table " . static::getTableName() . " not defined for deletion", AVideoLog::$ERROR);
        return false;
    }
}
