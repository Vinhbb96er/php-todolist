<?php

require_once('src/commons/database.php');

class Work
{
    private $table = 'works';
    private $DB;

    const STATUS_PLANNING = 1;
    const STATUS_DOING = 2;
    const STATUS_COMPLETE = 3;

    public function __construct()
    {
        $this->DB = DatabaseManager::getDM();
    }

    public function getList($params = [])
    {
        $sql = "SELECT * FROM {$this->table}";
        $data = [];

        if (isset($params['keyword'])) {
            $data['name'] = $data['starting_date'] = $data['ending_date'] = "%{$params['keyword']}%";
            $sql .= " WHERE name like :name or starting_date like :starting_date or ending_date like :ending_date";
        }

        return $this->DB->excute($sql, $data);
    }

    public function create($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['status'] = self::STATUS_PLANNING;
        $sql = "
            INSERT INTO {$this->table}
                (name, starting_date, ending_date, created_at, updated_at, status)
            VALUES
                (:name, :starting_date, :ending_date, :created_at, :updated_at, :status)
        ";

        return $this->DB->excute($sql, $data, false);
    }

    public function update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $setValue = [];

        foreach ($data as $key => $value) {
            $setValue [] = "{$key} = :{$key}";
        }

        $data['id'] = $id;
        $setValue = implode(', ', $setValue);

        $sql = "
            UPDATE {$this->table}
            SET {$setValue}
            WHERE id = :id
        ";

        return $this->DB->excute($sql, $data, false);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";

        return $this->DB->excute($sql, ['id' => $id], false);
    }

    public function getWork($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $work = $this->DB->excute($sql, ['id' => $id]);

        if (!count($work)) {
            return false;
        }

        return $work[0];
    }

    public static function getWorkStatusText($status)
    {
        switch ($status) {
            case self::STATUS_PLANNING:
                return 'Planning';
            case self::STATUS_DOING:
                return 'Doing';
            case self::STATUS_COMPLETE:
                return 'Complete';

            default:
                return null;
        }
    }

    public function getCalendarData()
    {
        $sql = "
            SELECT
                name as title,
                starting_date as start,
                ending_date as end
            FROM {$this->table}
        ";

        return $this->DB->excute($sql);
    }
}
