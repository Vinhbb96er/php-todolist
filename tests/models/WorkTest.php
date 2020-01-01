<?php

require_once('src/configs/setting.php');
require_once('src/moldels/Work.php');

use PHPUnit\Framework\TestCase;

class WorkTest extends TestCase
{
    public function testGetListWorkWithEmptyKeyword()
    {
        $work = new Work;
        $result = $work->getList();
        $this->assertTrue(is_array($result));
    }

    /**
     * @dataProvider providerTestGetListWork
     */
    public function testGetListWorkWithKeyword($keyword)
    {
        $work = new Work;
        $result = $work->getList(['keyword' => $keyword]);
        $this->assertTrue(is_array($result));
    }

    public function providerTestGetListWork()
    {
        return [
            [''],
            ['test'],
            ['2019-12-31'],
            ['%!@#'],
        ];
    }

    public function testCreateWorkSuccess()
    {
        $work = new Work;
        $result = $work->create([
            'name'=> 'Work test',
            'starting_date' => '2019-12-31',
            'ending_date' => '2020-01-05',
        ]);
        $this->assertEquals($result, 1);
    }

    /**
     * @dataProvider providerCreateUpdateWorkFailed
     */
    public function testCreateWorkFailed($name, $starting_date, $ending_date)
    {
        $work = new Work;
        $result = $work->create([
            'name'=> $name,
            'starting_date' => $starting_date,
            'ending_date' => $ending_date,
        ]);
        $this->assertFalse($result);
    }

    public function providerCreateUpdateWorkFailed()
    {
        return [
            ['', '', ''],
            ['Test', '', ''],
            ['', '2019-12-31', ''],
            ['', '', '2020-01-05'],
            ['Test', 'a', 'a'],
        ];
    }

    public function testUpdateWorkSuccess()
    {
        $work = new Work;
        $workObjUpdate = $work->getList()[0];
        $result = $work->update($workObjUpdate['id'], [
            'name'=> 'Work test',
            'starting_date' => '2019-12-31',
            'ending_date' => '2020-01-05',
        ]);
        $this->assertEquals($result, 1);
    }

    /**
     * @dataProvider providerCreateUpdateWorkFailed
     */
    public function testUpdateWorkFailed($name, $starting_date, $ending_date)
    {
        $work = new Work;
        $workObjUpdate = $work->getList()[0];
        $result = $work->update($workObjUpdate['id'], [
            'name'=> $name,
            'starting_date' => $starting_date,
            'ending_date' => $ending_date,
        ]);
        $this->assertFalse($result);
    }

    public function testGetWorkSuccess()
    {
        $work = new Work;
        $workObj = $work->getList()[0];
        $result = $work->getWork($workObj['id']);
        $this->assertEquals($result, $workObj);
    }

    public function testGetWorkFailed()
    {
        $work = new Work;
        $result = $work->getWork('abc');
        $this->assertFalse($result);
    }

    public function testDeleteWork()
    {
        $work = new Work;
        $workObjDelete = $work->getList()[0];
        $work->delete($workObjDelete['id']);
        $workObj = $work->getWork($workObjDelete['id']);
        $this->assertFalse($workObj);
    }

    public function testGetCalendarData()
    {
        $work = new Work;
        $result = $work->getCalendarData();
        $this->assertTrue(is_array($result));
    }
}
