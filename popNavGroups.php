<?php
# Populates the Group Section of the side nav with all the groups that exist
# Foreach loop that cycles through a users groups and echos the below statement for each


echo "<li class=\"collection-item\"><a href=\"?cc=editgroup&pt=Edit Group&groupName=$groups[i]->groupName\">$groups[i]->groupName</a></li>";

echo '<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" hidden>View Source</a>';
