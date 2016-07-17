<?php namespace LogExpander\Tests;
use \LogExpander\Events\ScormSubmitted as Event;

class ScormSubmittedTest extends EventTest {
    /**
     * Sets up the tests.
     * @override TestCase
     */
    public function setup() {
        $this->event = new Event($this->repo);
    }

    protected function constructInput() {
        return array_merge(parent::constructInput(), [
            'objecttable' => 'scorm_scoes_track',
            'objectid' => 1,
            'eventname' => '\mod_scorm\event\scoreraw_submitted',
            'other' => 'a:3:{s:9:"attemptid";i:2;s:10:"cmielement";s:18:"cmi.core.score.raw";s:8:"cmivalue";s:1:"0";}',
        ]);
    }

    protected function assertOutput($input, $output) {
        parent::assertOutput($input, $output);
        $this->assertModule(1, $output['module'], 'scorm');
        $this->assertScorm(1, $output['scorm_scoes_track']);
    }

    protected function assertScorm($input, $output) {
        $this->assertRecord($input, $output);
    }
}
