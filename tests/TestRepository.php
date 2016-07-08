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
    protected function readStoreRecord($type, array $query, $index = 0) {

        $fakeMoodleDatabase = [
            'user' => [
                [
                    'id' => '1',
                    'username' => 'test_username',
                    'lang' => 'en',
                    'fullname' => 'test_fullname',
                    'password' => 'topsecret'
                ]
            ],
            'assign' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name'
                ]
            ],
            'assign_grades' => [
                [
                    'id' => '1',
                    'assignment' => '1',
                    'userid' => '1',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                    'grade' => '2',
                ]
            ],
            'assign_submission' => [
                [
                    'id' => '1',
                    'assignment' => '1',
                    'userid' => '1',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ]
            ],
            'quiz' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                    'grade' => '10',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ]
            ],
            'quiz_attempts' => [
                [
                    'id' => '1',
                    'quiz' => '1',
                    'userid' => '1',
                    'timemodified' => 1433946702,
                ]
            ],
            'forum' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                ]
            ],
            'forum_discussions' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'forum' => '1',
                    'name' => 'test_name',
                    'userid' => '1',
                    'timemodified' => 1433946702,
                ]
            ],
            'facetoface' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name'
                ]
            ],
            'facetoface_sessions' => [
                [
                    'id' => '1',
                    'facetoface' => '1',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ]
            ],
            'facetoface_signups' => [
                [
                    'id' => '1',
                    'sessionid' => '1',
                    'userid' => '1'
                ]
            ],
            'feedback_completed' => [
                [
                    'id' => '1',
                    'feedback' => '1',
                    'userid' => '1',
                    'timemodified' => 1433946702,
                ]
            ],
            'page' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                    'timemodified' => 1433946702,
                ]
            ],
            'scorm' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                    'timemodified' => 1433946702,
                ]
            ],
            'scorm_scoes' => [
                [
                    'id' => '1',
                    'scorm' => '1'
                ]
            ],
            'modules' => [
                [
                    'id' => '1',
                    'name' => 'test_name'
                ]
            ],
            'course_modules' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'module' => '1',
                    'instance' => '1'
                ]
            ],
            'question' => [
                [
                    'id' => '1',
                    'category' => '1',
                    'name' => 'test_name',
                    'questiontext' => 'test question',
                    'qtype' => 'multichoice',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ]
            ],
            'question_attempts' => [
                [
                    'id' => '1',
                    'questionid' => '1',
                    'variant' => '1',
                    'rightanswer' => 'test answer',
                    'responsesummary' => 'test answer',
                    'timemodified' => 1433946702,
                ],
                [
                    'id' => '2',
                    'questionid' => '2',
                    'variant' => '1',
                    'rightanswer' => 'test answer',
                    'responsesummary' => 'test answer',
                    'timemodified' => 1433946702,
                ]
            ],
            'question_attempt_steps' => [
                [
                    'id' => '1',
                    'questionattemptid' => '1',
                    'sequencenumber' => '1',
                    'state' => 'complete',
                    'fraction' => null,
                    'timecreated' => 1433946700,
                    'userid' => '1',
                ],
                [
                    'id' => '2',
                    'questionattemptid' => '1',
                    'sequencenumber' => '2',
                    'state' => 'gradedright',
                    'fraction' => '1.0000',
                    'timecreated' => 1433946702,
                    'userid' => '1',
                ]
            ],
            'question_attempt_step_data' => [
                [
                    'id' => '1',
                    'name' => 'test_name',
                    'value' =>  '2',
                ]
            ],
            'quiz_slots' => [
                [
                    'id' => '1',
                    'slot' => '1',
                    'quizid' => '1',
                    'questionid' => '1',
                    'maxmark' => '5.00000',
                ],
                [
                    'id' => '2',
                    'slot' => '2',
                    'quizid' => '1',
                    'questionid' => '2',
                    'maxmark' => '5.00000',
                ]
            ],
            'question_answers' => [
                [
                    'id' => '1',
                    'question' => '1',
                    'answer' => '1',
                    'fraction' => '1.0000',
                ]
            ],
            'grade_items' => [
                [
                    'id' => '1',
                    'courseid' => '1',
                    'grademax' => '5.00000',
                    'grademin' => '0.00000',
                    'gradepass' => '5.00000',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ]
            ],
            'assignfeedback_comments' => [
                [
                    'id' => '1',
                    'assignment' => '1',
                    'grade' => '1',
                    'commenttext' => '<p>test comment</p>',
                ]
            ],
            'feedback' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name',
                    'timemodified' => 1433946702,
                ]
            ],
            'feedback_completed' => [
                [
                    'id' => '1',
                    'feedback' => '1',
                    'userid' => '1',
                ]
            ],
            'feedback_value' => [
                [
                    'id' => '1',
                    'course_id' => '1',
                    'item' => '1'
                ]
            ],
            'feedback_item' => [
                [
                    'id' => '1',
                    'feedback' => '1',
                    'name' => 'test_name',
                    'presentation' => 'r>>>>>0#### incorrect|1#### correct',
                    'typ' => 'multichoicerated',
                    'template' => '1'
                ]
            ],
            'feedback_template' => [
                [
                    'id' => '1',
                    'course' => '1',
                    'name' => 'test_name'
                ]
            ],
            'course' => [
                [
                    'id' => '1',
                    'category' => '1',
                    'fullname' => 'test_name',
                    'shortname' => 'test_name',
                    'summary' => 'test_summary',
                    'lang' => 'en',
                    'timecreated' => 1433946702,
                    'timemodified' => 1433946702,
                ]
            ],
        ];

        if (isset($fakeMoodleDatabase[$type][$index])) {
            $response = $fakeMoodleDatabase[$type][$index];
        } else {
            $response = $fakeMoodleDatabase[$type][0];
            $response['id'] = $index;
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
