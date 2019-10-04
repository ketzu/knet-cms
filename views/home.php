<?php
require_once "util/config.php";
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-2 mr-auto order-2 order-md-1">
                <img class="img-fluid d-block border rounded-lg mt-4" src="static/self.jpg"> <?php /* 350x525 */ ?>
            </div>
            <div class="px-md-5 p-3 d-flex flex-column align-items-start justify-content-center col-md-5 order-1 order-md-2">
                <h1>David Mödinger</h1>
                <p class="mb-3 lead">
                    I am a computer scientist at <a href="https://www.uni-ulm.de/index.php?id=david">Ulm University</a>.
                    Previously I worked on the <a href="https://www.uni-ulm.de/in/vs/res/proj/pricloud/">PriCloud</a> research project for a privacy preserving Cloud storage using blockchains.
                    Currently I am working on <a href="https://arxiv.org/abs/1807.11338">privacy preserving broadcast protocols</a>.
                </p>
                <p class="mb-3 lead">
                    Outside of university, I like to work on various things.
                    For some examples see the <a href="index.php?page=projects">projects</a> or <a href="index.php?page=photography">photography</a> ppage.
                </p>
                <div class="row text-muted">
                    <div class="col-12 p-2 offset-1">
                        <a href="https://www.linkedin.com/in/david-m%C3%B6dinger-707664b4/"><i class="d-inline fa fa-linkedin fa-3x"></i></a>
                        <a href="https://scholar.google.de/citations?user=Qkl3QC8AAAAJ&hl=de"><i class="d-inline fa fa-graduation-cap fa-3x mx-4"></i></a>
                        <a href="https://www.instagram.com/ketzulite/"><i class="d-inline fa fa-instagram fa-3x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-light mb-4">I have some noteworthy publications!</h1>
            </div>
        </div>
        <div class="row text-dark">
            <?php
            require_once "classes/paper.php";
            $papers = array_filter(getPapers($mysqli),function ($paper) { return $paper->frontpage; });
            usort($papers, function($p1, $p2) { return $p1->rating < $p2->rating; });
            $counter = 0;
            foreach ($papers as $paper) {
                if($counter < 3)
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

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-light mb-4">And worked on some small projects on my own.</h1>
            </div>
        </div>
        <div class="row">
            <?php
            require_once "classes/project.php";
            $projects = array_filter(getProjects($mysqli),function ($project) { return $project->frontpage; });
            $counter = 0;
            foreach ($projects as $project) {
                if($counter < 3)
                    echo '
            <div class="col-md-4 col-6 p-3"> 
                <a href="', $project->link ,'">            
                    <img class="img-fluid d-block" src="',$project->picture,'">
                </a>
                <h2 class="my-3"><b>', $project->name ,'</b> </h2>
                <p>', $project->info ,'</p>
                <a class="btn btn-link" href="',$project->link,'">Visit</a>
                ', $project->git ? ('<a class="btn btn-link" href="'.$project->git.'">Source</a>') : "" ,'
            </div>';
            }
            ?>
        </div>
    </div>
</div>