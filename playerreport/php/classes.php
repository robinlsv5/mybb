<?php

class Player
{
    public $steamid;
    public $name;

}

class Report
{
        public $id;
        public $title;
        public $player;
        public $timestamp;
        public $gameserver;
        public $description;

        public $evidence_ids = array();

        function __construct($id, $title, $name, $steamid, $timestamp, $gameserver, $description)
        {

        }
}


