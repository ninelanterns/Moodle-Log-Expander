<?php namespace LogExpander\Events;

class FacetofaceEvent extends Event {
    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {

        return array_merge(parent::read($opts), [
            'module' => $this->repo->readModule($session->facetoface, 'facetoface'),
            'session' => $this->repo->readFacetofaceSession($opts['objectid']),
            'signups' => $this->repo->readFacetofaceSessionSignups($opts['objectid'], $opts['userid'])
        ]);
    }
}