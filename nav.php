<?php
session_start();
require_once "populateNav.php";
require_once "include/functions.inc.php";
require_once "populateTags.php";

?>
<nav id="leftNav" class="side-nav fixed cyan darken responsive-img" style="transform: translateX(0%);">
    <h5 class="dropdown-button col s12" href="#!" data-activates="dropdownNavHeader" ><img src="img/WhiteLogo100x100.png" height="60px" width="60px" class="navLogo  left responsive-img" ><i class="material-icons right">menu</i> <i class="mdi-navigation-arrow-drop-down right"></i></h5>

    <ul id="dropdownNavHeader"  class="navControl collection red lighten  dropdown-content" style="margin-top: 27%">
        <li><a href="logout.php" class="logOut white-text red lighten collection-item" title="Sign Out">SIGN OUT<img src="img/logoutIcon.png" alt="Logout" class="secondary-content" width="30px" height="30px"></a></li>
    </ul>


    <ul class="collapsible" data-collapsible="accordion">
        <li class="">
            <div class=" red col s12 collapsible-header active">
            <h4 class="no-padding">NOTES</h4>
                </div>
            <div class="collapsible-body col s12 ">
                <ul class=" black-text">
                    <?php
                        for( $i = 0;$i<count($notes);$i++)
                        {
                            echo "<li class='truncate'><a href='?cc=shownote&t=".$notes[$i]->noteid." '>".$notes[$i]->noteTitle."</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </li>
      </ul>

     <ul class=" collapsible no-padding " data-collapsible="accordion">
         <li class="">
             <div class="valign-wrapper yellow darken-2  col s12 collapsible-header">
             <h4 class="no-padding ">GROUPS</h4>
                 </div>
                <div class="collapsible-body col s12">
                    <ul class="collection black-text ">
                        <?php for ($i = 0; $i<count($groups); $i++)
                        {
                            echo "<li class=\"collection-item truncate\"><a href=\"?cc=editgroup&pt=Edit Group&groupID=".$groups[$i]->groupid."\">".$groups[$i]->groupName."</a></li>";
                        }
                        ?>

                   </ul>
                </div>
         </li>
     </ul>

    <ul class=" collapsible no-padding " data-collapsible="accordion">
        <li class="">
            <div class="valign-wrapper blue darken-2 col s12 collapsible-header">
                <h4 class="">TAGS</h4>
            </div>
            <div class="collapsible-body col s12" style="padding-bottom: 8%">

`                    <?php for ($i = 0; $i<count($uniqueTags); $i++)
                    {
                        echo "<a style='display: inline' class='no-padding' href=\"?cc=tagspage&pt=Tags Page&tag=".$uniqueTags[$i]."\"><div class='chip'>".$uniqueTags[$i]."</div></a>";
                    }
                    ?>


            </div>
        </li>
    </ul>
</nav>
<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" hidden>View Source</a>
