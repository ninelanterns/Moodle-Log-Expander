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
        $this->assertEquals(5, $output['gradeitems']->gradepass);
        $this->assertEquals(5, $output['gradeitems']->grademax);
        $this->assertEquals(0, $output['gradeitems']->grademin);
    }
}
