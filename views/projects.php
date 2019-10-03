<?php
require_once "util/config.php";

require_once "classes/project.php";

$title = "Projects"
?>
<?php
$projects = getProjects($mysqli);
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="px-5 col-md-8 text-center mx-auto">
                <h3 class="text-light display-4"> <b>Projects</b> </h3>
                <h2 class="my-3">Things I made in my free time.</h2>
            </div>
        </div>
    </div>
</div>

<div class="py-3">
    <div class="container">
        <?php
        $leftside = true;
        foreach($projects as $project)
        {
            echo "<div class=\"row my-4 d-flex justify-content-center\">";
            if($leftside){
                echo "<div class=\"p-0 order-2 order-lg-1 col-lg-3\">";
                echo "<a href=\"",$project->link,"\">";
                echo "<img class=\"img-fluid d-block\" src=\"", $project->picture ,"\">";
                echo "</a></div>";

                echo "<div class=\"d-flex flex-column justify-content-center p-3 col-lg-7 order-1 order-lg-2\">";
                echo "<h2>", $project->name ,"</h2>";
                echo "<p class=\"lead\">", $project->info ,"</p>";

                echo "<p class=\"lead\">Visit the <a href=\"", $project->link ,"\">project</a>.</p>";
                if($project->git)
                    echo "<p class=\"lead\">Read the <a href=\"", $project->git ,"\">code on GitHub</a>.</p>";
            }else{
                echo "<div class=\"d-flex flex-column justify-content-center p-3 col-lg-7\">";
                echo "<h2>", $project->name ,"</h2>";
                echo "<p class=\"lead\">", $project->info ,"</p>";

                echo "<p class=\"lead\">Visit the <a href=\"", $project->link ,"\">project</a>.</p>";
                if($project->git)
                    echo "<p class=\"lead\">Read the <a href=\"", $project->git ,"\">code on GitHub</a>.</p>";
                echo "</div>";

                echo "<div class=\"p-0 col-lg-3\">";
                echo "<a href=\"",$project->link,"\">";
                echo "<img class=\"img-fluid d-block\" src=\"", $project->picture ,"\">";
                echo "</a>";
            }

            echo "</div>";
            echo "</div>";

            $leftside = !$leftside;
        }

        ?>
    </div>
</div>