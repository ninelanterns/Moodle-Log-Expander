<?php namespace LogExpander\Events;

/*
id:	576
eventname: \mod_scorm\event\scoreraw_submitted
component: mod_scorm
action:	submitted
target:	scoreraw
objecttable:	scorm_scoes_track
objectid:	2
crud:	u
edulevel:	2
contextid: 125
contextlevel:	70
contextinstanceid: 4
userid:	2
courseid:	15
relateduserid: 2
anonymous:	0
other: a:3:{s:9:"attemptid";i:2;s:10:"cmielement";s:18:"cmi.core.score.raw";s:8:"cmivalue";s:1:"0";}
timecreated: 1467386941
origin:	web
ip:	217.155.37.242
realuserid: NULL
*/

class ScormSubmitted extends Event {
    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {
        $cmi_unserialized = unserialize($opts['other']);
        $scoid = $opts->contextinstanceid;
        $scormid = $opts->objectid;
        $attempt = $cmi_unserialized['attemptid'];
        $scorm_scoes_track = $this->repo->readScormScoesTrack($opts->userid,
                                                              $scormid,
                                                              $scoid,
                                                              $attempt);
        return array_merge(parent::read($opts), [
            'module' => $this->repo->readModule($scormid, 'scorm'),
            'scorm_scoes_track' => $scorm_scoes_track,
            'scorm_scoes' => $this->repo->readModule($scoid, 'scorm_scoes'),
            'cmi_data' => $cmi_unserialized,
        ]);
    }
}
