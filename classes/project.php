<?php

class project
{
    public $id;
    public $name;
    public $link;
    public $info;
    public $picture;
    public $git;
    public $frontpage;

    public function store($mysqli)
    {
        if($this->id==-1){
            // insert
            $stmt = $mysqli->prepare("INSERT INTO knet_papers (name,link,info,picture,git,frontpage) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('sssss',$this->name, $this->link, $this->info, $this->picture, $this->git, $this->frontpage);
            $stmt->execute();
            $this->id = $stmt->insert_id;
        }else{
            // update
            $stmt = $mysqli->prepare("UPDATE users SET name=?, link=?, info=?, picture=?, git=?, frontpage=? WHERE id=?");
            $stmt->bind_param('ssssss',$this->name, $this->link, $this->info, $this->picture, $this->git, $this->frontpage);
            $stmt->execute();
        }
    }
}

function getProjects($mysqli)
{
    $results = array();
    $stmt = $mysqli->prepare("SELECT * FROM knet_projects");
    $stmt->execute();
    $stmt->bind_result($id,$name,$link,$info,$picture,$git,$frontpage);
    while($stmt->fetch())
    {
        $tmp = new project();
        $tmp->id = $id;
        $tmp->name = $name;
        $tmp->link = $link;
        $tmp->info = $info;
        $tmp->picture = $picture;
        $tmp->git = $git;
        $tmp->frontpage = $frontpage;
        $results[] = $tmp;
    }
    return $results;
}