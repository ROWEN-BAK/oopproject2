<?php

namespace Oop2;

class Park
{

    public string $reviewername;

    public float $stars;
    public string $reviewcontent;

    public function __construct(string $reviewername, string $reviewcontent, float $stars)
    {
        $this->reviewername = $reviewername;
        $this->stars = $stars;
        $this->reviewcontent = $reviewcontent;
        //self::$parks[] = $this;
    }

    public function getReview() {
        print "<h3>Naam Reviewer: ".$this->reviewername.".</h3>";
        print "<h4> Park Rating: ".$this->stars."/5 </h4>";
        print "<h4> Review: </h4>";
        print "<p> '".$this->reviewcontent."'</p>";
        return "<br>";
    }
}