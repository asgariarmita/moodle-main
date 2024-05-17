<?php

/**
 * This file is part of Totara LMS
 *
 * Copyright (C) 2020 onwards Totara Learning Solutions LTD
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author patrick.nehme@learnchamp.com <totara@learnchamp.com>
 * @package block_hello_world
 */

defined('MOODLE_INTERNAL') || die();

class block_hello_world extends block_base
{
    function init()
    {
        $this->title = get_string('pluginname', 'block_hello_world');
    }

    function get_required_javascript()
    {
        global $PAGE;

        $PAGE->requires->js_call_amd('block_hello_world/hello_world', 'init', []);
    }

    function get_content()
    {
        global $PAGE, $USER, $CFG, $DB, $OUTPUT;

        if ($this->content !== NULL) {
            return $this->content;
        }

        $coreRenderer = $PAGE->get_renderer('core');
        $templateData = [];
        // $templateData['heading'] = get_string('heading', 'block_hello_world');

        $this->content = new stdClass;
        $user_picture = new user_picture($USER);
        $user_picture->size = 100;
        $user_picture_html = $OUTPUT->render($user_picture);

        $username = fullname($USER);
        $email = $USER->email;

        $templateData = [
            'user_picture_html' => $user_picture_html,
            'username' => $username,
            'email' => $email,
        ];


        $this->content->text = $coreRenderer->render_from_template('block_hello_world/hello_world', $templateData);

        //         $form = '
        //         <div id="card">
        //     <div id="userInfo">
        //         <div id="avatar">' . $user_picture_html . '</div>
        //         <div id="info">
        //             <div>' . $username . '</div>
        //             <div>' . $email . '</div>
        //         </div>
        //     </div>
        //     <div id="lit">Lorem ipsum Text Lorem ipsum Text Lorem ipsum Text Lorem ipsum Text Lorem ipsum Text Lorem ipsum Text Lorem ipsum Text Lorem ipsum Text Lorem ipsum Text</div>
        //     <div id="actions">
        //         <input type="text" id="greetingText" placeholder="Greeting Text" />
        //         <button id="showModalBtn">OK</button>
        //     </div>
        // </div>
        // <dialog id="modal">
        //     <button id="closeIcon" class="closeModalBtn">X</button>
        //     <div id="modalContent">
        //         <h2>Hello</h2>
        //         <p id="modalEmail">' . $email . '</p>
        //         <p id="modalGreeting"></p>
        //         <button id="closeModalBtn" class="closeModalBtn">Cancel</button>
        //         <button id="confirmModalBtn" class="closeModalBtn">OK</button>
        //     </div>
        // </dialog>

        //         ';

        //         $this->content->text = $form;

        return $this->content;
    }
}
