<?php

require_once('commons/database.php');

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

        foreach ($variable as $key => $value) {
            $setValue [] = "{$key} = :{$key}";
        }

        $data['id'] = $id;
        $setValue = implode(',', $setValue);

        $sql = "
            UPDATE {$this->table}
            SET {$setValue}
            WHERE id = :id
        ";

        return $this->DB->excute($sql, $data, false);
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
}
