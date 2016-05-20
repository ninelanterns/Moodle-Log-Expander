<?php
/**
 * Created by PhpStorm.
 * User: lee.kirkland
 * Date: 5/20/2016
 * Time: 9:12 AM
 */

namespace LogExpander\Events;


class CourseCompleted extends Event
{
    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {
        $version = str_replace("\n", "", str_replace("\r", "", file_get_contents(__DIR__.'/../../VERSION')));
        return [
            'user' => $opts['relateduserid'] < 1 ? null : $this->repo->readUser($opts['relateduserid']),
            'relateduser' => $opts['relateduserid'] < 1 ? null : $this->repo->readUser($opts['relateduserid']),
            'course' => $this->repo->readCourse($opts['courseid']),
            'app' => $this->repo->readCourse(1),
            'info' => (object) [
                'https://moodle.org/' => $this->repo->readRelease(),
                'https://github.com/LearningLocker/Moodle-Log-Expander' => $version,
            ],
            'event' => $opts,
        ];
    }
}