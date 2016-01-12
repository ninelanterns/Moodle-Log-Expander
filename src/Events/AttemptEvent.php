<?php namespace LogExpander\Events;

class AttemptEvent extends Event {
    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {
        global $DB;
        $attempt = $this->repo->readAttempt($opts['objectid']);

        $gradeitems = $DB->get_record('grade_items', array('itemmodule' => 'quiz', 'iteminstance' =>$attempt->quiz));

        return array_merge(parent::read($opts), [
            'attempt' => $attempt,
            'module' => $this->repo->readModule($attempt->quiz, 'quiz'),
            'gradeitems' => $gradeitems
        ]);
    }
}