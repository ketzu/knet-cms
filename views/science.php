<?php
require_once "util/config.php";

require_once "classes/paper.php";

$title = "Science"
?>

<?php
$papers = getPapers($mysqli);
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="px-5 col-md-8 text-center mx-auto">
                <h3 class="text-light display-4"> <b>Science</b> </h3>
                <h2 class="my-3">You can also find me on <a href="https://scholar.google.de/citations?user=Qkl3QC8AAAAJ&hl=de">Google Scholar</a>.</h2>
            </div>
        </div>
    </div>
</div>

<div class="py-5 text-white">
    <div class="container">
        <div class="row text-dark">
            <?php
            require_once "classes/paper.php";
            $papers = getPapers($mysqli);
            usort($papers, function($p1, $p2) { return $p1->rating < $p2->rating; });
            foreach ($papers as $paper) {
                    echo '
            <div class="col-lg-4 p-3">
                <div class="card text-center">
                    <div class="card-body p-4">
                        <h3>', $paper->conference, ' ' , $paper->year ,'</h3>
                        <p class="my-3 lead">', $paper->title,'</p>
                        <a class="btn btn-link" href="',$paper->link,'">Read it</a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
</div>