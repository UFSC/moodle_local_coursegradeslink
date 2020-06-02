<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 * Defines the version of this module
 *
 * This code fragment is called by moodle_needs_upgrading() and
 * /admin/index.php
 *
 * @package    local
 * @subpackage coursegradeslink
 * @copyright  2018 Texas A&M Engineering Extension Service
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function local_coursegradeslink_extend_navigation_course($navigation, $course, $coursecontext) {
    $adminoptions = course_get_user_administration_options($course, $coursecontext);
    
    // Create gradebook link and add it to course administration if rights available
    if ($adminoptions->gradebook) {
        $url = new moodle_url('/grade/report/index.php?id=' . $course->id);
        $gradeslink = navigation_node::create('Grades', $url, navigation_node::TYPE_SETTING, 'Grades', 'gradeslink', new pix_icon('i/grades', ''));
        $navigation->add_node($gradeslink, 'outcomes'); // Link inserted above outcomes
    }
}