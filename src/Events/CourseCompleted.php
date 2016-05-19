<?php
/**
 * Created by PhpStorm.
 * User: lee.kirkland
 * Date: 5/19/2016
 * Time: 4:44 PM
 */

namespace LogExpander\Events;


class CourseCompleted extends Event
{
    /**
     * As of right now, nothing needs to be added to this, but we return an array merge to pass test.
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {
        return parent::read($opts);
    }
}