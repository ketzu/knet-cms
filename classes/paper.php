<?php

class paper
{
    public $id;
    public $mainauthor;
    public $title;
    public $conference;
    public $rating;
    public $link;
    public $picture;
    public $year;
    public $frontpage;

    public function __construct()
    {
        $this->id = -1;
    }

    public function store($mysqli)
    {
        if($this->id==-1){
            // insert
            $stmt = $mysqli->prepare("INSERT INTO knet_papers (mainauthor,title,conference,rating,link,picture,year,frontpage) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_param('ississi',$this->mainauthor, $this->title, $this->conference, $this->rating, $this->link, $this->picture, $this->year, $this->frontpage);
            $stmt->execute();
            $this->id = $stmt->insert_id;
        }else{
            // update
            $stmt = $mysqli->prepare("UPDATE users SET mainauthor=?, title=?, conference=?, rating=?, link=?, picture=?, year=?, frontpage=? WHERE id=?");
            $stmt->bind_param('ississi',$this->mainauthor, $this->title, $this->conference, $this->rating, $this->link, $this->picture, $this->year, $this->frontpage);
            $stmt->execute();
        }
    }
}

function getPapers($mysqli)
{
    $results = array();
    $stmt = $mysqli->prepare("SELECT id,mainauthor,title,conference,rating,link,picture,year,frontpage FROM knet_papers");
    $stmt->execute();
    $stmt->bind_result($id,$mainauthor,$title,$conference,$rating,$link,$picture,$year,$frontpage);
    while($stmt->fetch())
    {
        $tmp = new paper();
        $tmp->id = $id;
        $tmp->mainauthor = $mainauthor;
        $tmp->title = $title;
        $tmp->conference = $conference;
        $tmp->rating = $rating;
        $tmp->link = $link;
        $tmp->picture = $picture;
        $tmp->year = $year;
        $tmp->frontpage = $frontpage;
        $results[] = $tmp;
    }
    return $results;
}