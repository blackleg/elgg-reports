<?php
$groups = elgg_get_entities(array('type' => 'group', 'limit' => 0));

$table = array();

foreach ($groups as $group) {
    $table[$group->time_created] = $group;
}

ksort($table);
?>

<div class="elgg-module elgg-module-inline">
    <div class="elgg-body">
        <table class="sortable elgg-table-alt">
            <thead>
                <tr>
                    <th class="rm_group_reports_first"><?php echo elgg_echo('rm_group_reports:id'); ?></th>
                    <th><?php echo elgg_echo('rm_group_reports:name'); ?></th>
                    <th><?php echo elgg_echo('rm_group_reports:members'); ?></th>
                    <th><?php echo elgg_echo('rm_group_reports:discussions'); ?></th>
                    <th><?php echo elgg_echo('rm_group_reports:created'); ?></th>
                    <th><?php echo elgg_echo('rm_group_reports:activity'); ?></th>
                </tr>
            </thead>
            <tbody class="rm_group_reports_sortable">
                <?php
                foreach ($table as $group) {
                    echo '<tr>';
                    echo '<td class="rm_group_reports_first">' . $group->guid . '</td>';
                    echo '<td><a href="' . $group->getURL() . '" target="_blank">' . $group->name . '</a></td>';
                    echo '<td><a href="' . elgg_get_config('url') . 'groups/members/' . $group->guid . '" target="_blank">' . $group->getMembers(array('count' => true)) . '</a></td>';
                    /* Last Discussions */
                    echo '<td>' . elgg_get_entities(['type' => 'object', 'subtype' => 'discussion', 'container_guids' => $group->guid, 'limit' => 0, 'count' => true]) . '</td>';
                    echo '<td>' . date('d/m/Y H:i', $group->time_created) . '</td>';
                    /* Last Activity */
                    $activity = elgg_get_entities(['container_guids' => $group->guid, 'limit' => 1]);
                    if ($activity && count($activity) > 0) {
                        echo '<td>' . date('d/m/Y H:i', $activity[0]->time_created) . '</td>';
                    } else {
                        echo '<td> -- </td>';
                    }
                    echo '<tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

