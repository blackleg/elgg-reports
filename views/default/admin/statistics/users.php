<?php
$users = elgg_get_entities(array('type' => 'user', 'limit' => 0));

$table = array();

foreach ($users as $user) {
    $table[$user->time_created] = $user;
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
                    <th><?php echo elgg_echo('rm_group_reports:email'); ?></th>
                    <th><?php echo elgg_echo('rm_group_reports:banned'); ?></th>
                    <th><?php echo elgg_echo('rm_group_reports:admin'); ?></th>
                    <th><?php echo elgg_echo('rm_group_reports:created'); ?></th>
                </tr>
            </thead>
            <tbody class="rm_group_reports_sortable">
                <?php
                foreach ($table as $group) {
                    echo '<tr>';
                    echo '<td class="rm_group_reports_first">' . $group->guid . '</td>';
                    echo '<td><a href="' . $group->getURL() . '" target="_blank">' . $group->getDisplayName() . '</a></td>';
                    echo '<td>' . $group->email . '</td>';
                    echo '<td>' . $group->isBanned() . '</td>';
                    echo '<td>' . $group->isAdmin() . '</td>';
                    echo '<td>' . date('d/m/Y H:i', $group->time_created) . '</td>';
                    echo '<tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

