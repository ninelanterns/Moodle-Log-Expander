<?php namespace LogExpander\Tests;
use \LogExpander\Events\AttemptEvent as Event;

class AttemptEventTest extends EventTest {
    /**
     * Sets up the tests.
     * @override TestCase
     */
    public function setup() {
        $this->event = new Event($this->repo);
    }

    protected function constructInput() {
        return array_merge(parent::constructInput(), [
            'objecttable' => 'quiz_attempts',
            'objectid' => 1,
            'eventname' => '\mod_quiz\event\attempt_preview_started',
        ]);
    }

    protected function assertOutput($input, $output) {
        parent::assertOutput($input, $output);
        $this->assertModule(1, $output['module'], 'quiz');
        $this->assertAttempt($input['objectid'], $output['attempt']);
        $this->assertEquals(5, $output['grade_items']->gradepass);
        $this->assertEquals(5, $output['grade_items']->grademax);
        $this->assertEquals(0, $output['grade_items']->grademin);
    }

    protected function assertQuestionAttempts($input, $output) {
        $this->assertEquals("1", $output['attempt']->questions["1"]->id);
        $this->assertEquals("2", $output['attempt']->questions["1"]->steps["2"]->id);
        $this->assertEquals("2", $output['attempt']->questions["1"]->steps["1"]->data["2"]->id);
    }

    protected function assertQuestions($input, $output) {
        $this->assertEquals("1", $output['questions']["1"]->id);
    }

    // The functions below are copied exactly from the Moodle-xAPI-Translator test input. 
    private function constructQuestionAttempts() {
        return [
            $this->constructQuestionAttempt(0, 'truefalse'),
            $this->constructQuestionAttempt(1, 'multichoice'),
            $this->constructQuestionAttempt(2, 'calculated'),
            $this->constructQuestionAttempt(3, 'calculatedmulti'),
            $this->constructQuestionAttempt(4, 'calculatedsimple'),
            $this->constructQuestionAttempt(5, 'randomsamatch'),
            $this->constructQuestionAttempt(6, 'match'),
            $this->constructQuestionAttempt(7, 'shortanswer'),
            $this->constructQuestionAttempt(8, 'somecustomquestiontypethatsnotstandardinmoodle'),
            $this->constructQuestionAttempt(9, 'someothertypewithnoanswers'),
            $this->constructQuestionAttempt(10, 'shortanswer'),
            $this->constructQuestionAttempt(11, 'numerical')
        ];
    }

    private function constructQuestionAttempt($index, $qtype) {
         $questionAttempt = (object) [
            'id' => $index,
            'questionid' => $index,
            'maxmark' => '5.0000000',
            'steps' => [
                (object)[
                    'sequencenumber' => 1,
                    'state' => 'todo',
                    'timecreated' => '1433946000',
                    'fraction' => null
                ],
                (object)[
                    'sequencenumber' => 2,
                    'state' => 'gradedright',
                    'timecreated' => '1433946701',
                    'fraction' => '1.0000000'
                ],
            ],
            'responsesummary' => 'test answer',
            'rightanswer' => 'test answer',
            'variant' => '1'
        ];

        $choicetypes = [
            'multichoice',
            'somecustomquestiontypethatsnotstandardinmoodle'
        ];

        $matchtypes = [
            'randomsamatch',
            'match'
        ];

        $numerictypes = [
            'numerical',
            'calculated',
            'calculatedmulti',
            'calculatedsimple'
        ];

        if (in_array($qtype, $matchtypes)) {
            $questionAttempt->responsesummary = 'test question -> test answer; test question 2 -> test answer 4';
            $questionAttempt->rightanswer = 'test question -> test answer; test question 2 -> test answer 4';
        } else if (in_array($qtype, $choicetypes)) {
            $questionAttempt->responsesummary = 'test answer; test answer 2';
            $questionAttempt->rightanswer = 'test answer; test answer 2';
        } else if (in_array($qtype, $numerictypes)) {
            $questionAttempt->responsesummary = '5';
            $questionAttempt->rightanswer = '5';
        } else if ($qtype == 'truefalse') {
            $questionAttempt->responsesummary = 'True';
            $questionAttempt->rightanswer = 'True';
        }

        return $questionAttempt;
    }

    private function constructQuestions() {
        return [
            $this->constructQuestion('00', 'truefalse'),
            $this->constructQuestion('01', 'multichoice'),
            $this->constructQuestion('02', 'calculated'),
            $this->constructQuestion('03', 'calculatedmulti'),
            $this->constructQuestion('04', 'calculatedsimple'),
            $this->constructQuestion('05', 'randomsamatch'),
            $this->constructQuestion('06', 'match'),
            $this->constructQuestion('07', 'shortanswer'),
            $this->constructQuestion('08', 'somecustomquestiontypethatsnotstandardinmoodle'),
            $this->constructQuestion('09', 'someothertypewithnoanswers'),
            $this->constructQuestion('10', 'shortanswer'),
            $this->constructQuestion('11', 'numerical')
        ];
    }

    private function constructQuestion($index, $qtype) {
        $question = (object) [
            'id' => $index,
            'name' => 'test question '.$index,
            'questiontext' => 'test question',
            'url' => 'http://localhost/moodle/question/question.php?id='.$index,
            'answers' => [
                '1'=> (object)[
                    'id' => '1',
                    'answer' => 'test answer',
                    'fraction' => '0.50'
                ],
                '2'=> (object)[
                    'id' => '2',
                    'answer' => 'test answer 2',
                    'fraction' => '0.50'
                ],
                '3'=> (object)[
                    'id' => '3',
                    'answer' => 'wrong test answer',
                    'fraction' => '0.00'
                ]
            ],
            'qtype' => $qtype
        ];

        if ($question->qtype == 'numerical') {
            $question->numerical = (object)[
                'answers' => [
                    '1'=> (object)[
                        'id' => '1',
                        'question' => $index,
                        'answer' => '1',
                        'tolerance' => '1'
                    ],
                    '2'=> (object)[
                        'id' => '2',
                        'question' => $index,
                        'answer' => '2',
                        'tolerance' => '1'
                    ]
                ]
            ];
            $question->answers = [
                '1'=> (object)[
                    'id' => '1',
                    'answer' => '5',
                    'fraction' => '1.00'
                ],
                '2'=> (object)[
                    'id' => '2',
                    'answer' => '10',
                    'fraction' => '0.00'
                ]
            ];
        } else if ($question->qtype == 'match') {
            $question->match = (object)[
                'subquestions' => [
                    '1'=> (object)[
                        'id' => '1',
                        'questiontext' => '<p>test question</p>',
                        'answertext' => '<p>test answer</p>'
                    ],
                    '2'=> (object)[
                        'id' => '4',
                        'questiontext' => '<p>test question 2</p>',
                        'answertext' => '<p>test answer 4</p>'
                    ]
                ]
            ];
        } else if (strpos($question->qtype, 'calculated') === 0) {
            $question->calculated = (object)[
                'answers' => [
                    '1'=> (object)[
                        'id' => '1',
                        'question' => $index,
                        'answer' => '1',
                        'tolerance' => '1'
                    ],
                    '2'=> (object)[
                        'id' => '2',
                        'question' => $index,
                        'answer' => '2',
                        'tolerance' => '1'
                    ]
                ]
            ];
            $question->answers = [
                '1'=> (object)[
                    'id' => '1',
                    'answer' => '5',
                    'fraction' => '1.00'
                ],
                '2'=> (object)[
                    'id' => '2',
                    'answer' => '10',
                    'fraction' => '0.00'
                ]
            ];
        } else if ($question->qtype == 'shortanswer') {
            $question->shortanswer = (object)[
                'options' => (object)[
                    'usecase' => '0'
                ]
            ];
            $question->answers['1']->fraction = '1.00';
            $question->answers['2']->fraction = '0.00';
        } else if ($question->qtype == 'someothertypewithnoanswers') {
            $question->answers = [];
        } else if ($question->qtype == 'truefalse') {
            $question->answers = [
                '1'=> (object)[
                    'id' => '1',
                    'answer' => 'True',
                    'fraction' => '1.00'
                ],
                '2'=> (object)[
                    'id' => '2',
                    'answer' => 'False',
                    'fraction' => '0.00'
                ]
            ];
        }

        if ($index == '10') {
            $question->questiontext = 'test question 2';
            $question->answers = [
                '1'=> (object)[
                    'id' => '4',
                    'answer' => 'test answer 4',
                    'fraction' => '1.00'
                ]
            ];
        }
        return $question;
    }
}
