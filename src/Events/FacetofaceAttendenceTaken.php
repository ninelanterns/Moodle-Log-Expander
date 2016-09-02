<?php namespace LogExpander\Events;

class FacetofaceAttendenceTaken extends FacetofaceEvent {
    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {
        $other = unserialize($opts['other']);
        $session = $this->repo->readFacetofaceSession($other['sessionid']);
        return array_merge(parent::read($opts), [
            'signups' => $this->repo->readFacetofaceSessionSignups($opts['objectid'], $opts['timecreated']),
            'session' => $session
        ]);
    }
}