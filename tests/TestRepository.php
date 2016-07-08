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
        $response = null; 

        switch ($type) {
            case 'user':
                $response = [
                    'id' => '1',
                    'username' => 'test_username',
                    'lang' => 'en',
                    'fullname' => 'test_fullname',
                    'password' => 'topsecret'
                ];
                break;

            case 'assign':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name'
                ];
                break;

            case 'assign_grades':
                $response = [
                    'id' => '1',
                    'assignment' => '1',
                    'userid' => '1',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                    'grade' => '2',
                ];
                break;

            case 'assign_submission':
                $response = [
                    'id' => '1',
                    'assignment' => '1',
                    'userid' => '1',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ];
                break;
            case 'quiz':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                    'grade' => '10',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ];
                break;

            case 'quiz_attempts':
                $response = [
                    'id' => '1',
                    'quiz' => '1',
                    'userid' => '1',
                    'timemodified' => 1433946702,
                ];
                break;

            case 'forum':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                ];
                break;
            case 'forum_discussions':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'forum' => '1',
                    'name' => 'test_name',
                    'userid' => '1',
                    'timemodified' => 1433946702,
                ];
                break;

            case 'facetoface':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name'
                ];
                break;

            case 'facetoface_sessions':
                $response = [
                    'id' => '1',
                    'facetoface' => '1',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ];
                break;

            case 'facetoface_signups':
                $response = [
                    'id' => '1',
                    'sessionid' => '1',
                    'userid' => '1'
                ];
                break;

            case 'feedback_completed':
                $response = [
                    'id' => '1',
                    'feedback' => '1',
                    'userid' => '1',
                    'timemodified' => 1433946702,
                ];
                break;

            case 'page':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                    'timemodified' => 1433946702,
                ];
                break;

            case 'scorm':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                    'timemodified' => 1433946702,
                ];
                break;

            case 'scorm_scoes':
                $response = [
                    'id' => '1',
                    'scorm' => '1'
                ];
                break;

            case 'modules':
                $response = [
                    'id' => '1',
                    'name' => 'test_name'
                ];
                break;

            case 'course_modules':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'module' => '1',
                    'instance' => '1'
                ];
                break;

            case 'question':
                $response = [
                    'id' => '1',
                    'category' => '1',
                    'name' => 'test_name',
                    'questiontext' => 'test question',
                    'qtype' => 'multichoice',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ];
                break;

            case 'question_attempts':
                $response = [
                    'id' => '1',
                    'questionid' => '1',
                    'variant' => '1',
                    'rightanswer' => 'test answer',
                    'responsesummary' => 'test answer',
                    'timemodified' => 1433946702,
                ];
                break;

            case 'question_attempt_steps':
                $response = [
                    'id' => '1',
                    'state' => 'gradedright',
                    'fraction' => '1.0000',
                    'timecreated' => 1433946702,
                    'userid' => '1',
                ];
                break;

            case 'question_attempt_step_data':
                $response = [
                    'id' => '1',
                    'name' => 'test_name',
                    'value' =>  '2',
                ];
                break;

            case 'quiz_slots':
                $response = [
                    'id' => '1',
                    'slot' => '1',
                    'quizid' => '1',
                    'questionid' => '1',
                    'maxmark' => '5.00000',
                ];
                break;

            case 'question_answers':
                $response = [
                    'id' => '1',
                    'question' => '1',
                    'answer' => '1',
                    'fraction' => '1.0000',
                ];
                break;

            case 'grade_items':
                $response = [
                    'id' => '1',
                    'courseid' => '1',
                    'grademax' => '5.00000',
                    'grademin' => '0.00000',
                    'gradepass' => '5.00000',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ];
                break;

            case 'assignfeedback_comments':
                $response = [
                    'id' => '1',
                    'assignment' => '1',
                    'grade' => '1',
                    'commenttext' => '<p>test comment</p>',
                ];
                break;

            case 'feedback':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                    'timemodified' => 1433946702,
                ];
                break;

            case 'feedback_completed':
                $response = [
                    'id' => '1',
                    'feedback' => '1',
                    'userid' => '1',
                ];
                break;

            case 'feedback_value':
                $response = [
                    'id' => '1',
                    'course_id' => '1',
                    'item' => '1'
                ];
                break;

            case 'feedback_item':
                $response = [
                    'id' => '1',
                    'feedback' => '1',
                    'name' => 'test_name',
                    'presentation' => 'r>>>>>0#### incorrect|1#### correct',
                    'typ' => 'multichoicerated',
                    'template' => '1'
                ];
                break;

            case 'feedback_template':
                $response = [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name'
                ];
                break;

            case 'course':
                $response = [
                    'id' => '1',
                    'category' => '1',
                    'fullname' => 'test_name',
                    'shortname' => 'test_name',
                    'summary' => 'test_summary',
                    'lang' => 'en',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ];
                break;

            default:
                break;
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
        $record1 = $this->readStoreRecord($type, $query);
        $record2 = $this->readStoreRecord($type, $query);
        $record2->id = '2';
        $record2->questionid = '1';
        $record2->sequencenumber = '2';
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
