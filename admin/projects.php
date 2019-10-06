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

<div class="py-5 text-center text-white">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-10 p-4">
                <h1 class="text-light">I am so happy</h1>
                <p class="mb-4 lead text-light">When, while the lovely valley teems with vapour around me.</p>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-4"> <input type="text" class="form-control" id="nameField" placeholder="Name"> </div>
                        <div class="form-group col-md-4"> <input type="text" class="form-control" id="pictureField" placeholder="Picture"> </div>
                        <div class="form-group col-md-4"> <input type="text" class="form-control" id="gitField" placeholder="Git"> </div>
                    </div>
                    <div class="form-group"> <input type="text" class="form-control" id="linkField" placeholder="Link"> </div>
                    <div class="form-group"> <textarea class="form-control" id="infoField" rows="3" placeholder="Project Info"></textarea> </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
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