<?php
require_once "Task.php";

$task = new Task(1, 2, "new");

print("<pre>");
    print_r($task->get_current_status());
print("</pre>");

print("<pre>");
    print_r($task->get_actions());
print("</pre>");

print("<pre>");
    print_r($task->get_statuses());
print("</pre>");

print("<pre>");
    print_r($task->get_status_from_action("complete"));
print("</pre>");
print("<pre>");
    print_r($task->get_status_from_action("add"));
print("</pre>");

print("<pre>");
print_r($task->get_actions_for_status("new"));
print("</pre>");
print("<pre>");
print_r($task->get_actions_for_status("add"));
print("</pre>");
