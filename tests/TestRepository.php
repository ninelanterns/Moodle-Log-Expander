<?php namespace LogExpander\Tests;
use \LogExpander\Repository as MoodleRepository;

class TestRepository extends MoodleRepository {
    /**
     * Reads an object from the store with the given id.
     * @param string $type
     * @param [string => mixed] $query
     * @return php_obj
     * @override MoodleRepository
     */
    protected function readStoreRecord($type, array $query) {
        return (object) [
            'id' => '1',
            'username' => 'test_username',
            'lang' => 'en',
            'fullname' => 'test_fullname',
            'summary' => 'test_summary',
            'name' => 'test_name',
            'intro' => 'test_intro',
            'timestart' => 1433946701,
            'timefinish' => 1433946702,
            'state' => 'finished',
            'course' => '1',
            'sumgrades' => '1',
            'grade' => '2',
            'quiz' => '1',
            'assignment' => '1',
            'userid' => '1',
            'forum' => '1',
            'type' => 'object',
            'scorm' => '1',
            'grademax' => '5.00000',
            'grademin' => '0.00000',
            'gradepass' => '5.00000',
            'commenttext' => '<p>test comment</p>',
            'questionid' => '1'
        ];
    }

    /**
     * Reads an array of objects from the store with the given type and query.
     * @param String $type
     * @param [String => Mixed] $query
     * @return PhpArr
     * @override MoodleRepository
     */
    protected function readStoreRecords($type, array $query) {
        $record1 = $this->readStoreRecord($type, $query);
        $record2 = $this->readStoreRecord($type, $query);
        $record2->id = '2';
        $record2->questionid = '1';
        return [
            "1" => $record1, 
            "2" => $record2
        ];
    }

    /**
     * Reads an object from the store with the given id.
     * @param string $id
     * @param string $type
     * @return php_obj
     */
    public function readObject($id, $type) {
        $model = $this->readStoreRecord($type, ['id' => $id]);
        $model->id = $id;
        return $model;
    }
}
