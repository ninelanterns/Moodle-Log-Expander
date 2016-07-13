<?php namespace LogExpander\Tests;
use \LogExpander\Repository as MoodleRepository;

class TestRepository extends MoodleRepository {

    protected $fakeMoodleDatabase;

    function __construct($store, PhpObj $cfg) {
        parent::__construct($store, PhpObj $cfg);
        $file = file_get_contents(__DIR__ ."/fakeDB.json");
        $this->fakeMoodleDatabase = json_decode($file, true);
   }

    /**
     * Reads an object from the store with the given id.
     * @param string $type
     * @param [string => mixed] $query
     * @return php_obj
     * @override MoodleRepository
     */
    protected function readStoreRecord($type, array $query, $index = 0) {

        $response;
        if (isset($this->fakeMoodleDatabase[$type][$index])) {
            $response = $this->fakeMoodleDatabase[$type][$index];
        } else {
            $response = $this->fakeMoodleDatabase[$type][0];
            $response['id'] = strval($index + 1);
        }

        // Required for assertRecord in EventTest.php to pass, but what's the purpose of including and testing this? 
        $response['type'] = 'object';

        return (object) $response;
    }

    /**
     * Reads an array of objects from the store with the given type and query.
     * @param String $type
     * @param [String => Mixed] $query
     * @return PhpArr
     * @override MoodleRepository
     */
    protected function readStoreRecords($type, array $query) {
        $record1 = $this->readStoreRecord($type, $query, 0);
        $record2 = $this->readStoreRecord($type, $query, 1);
        return [
            "1" => $record1,
            "2" => $record2
        ];
    }

    protected function fullname($user) {
        return "test_fullname";
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
