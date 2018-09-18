<?php

class Player
{
    public $steamid;
    public $name;

    function __construct($_steamid, $_name)
    {
        $this->setName($_name);
        $this->setSteamid($_steamid);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSteamid()
    {
        return $this->steamid;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $steamid
     */
    public function setSteamid($steamid)
    {
        $this->steamid = $steamid;
    }
}

///Report class represents an full report
class Report
{
        public $id;
        public $title;
        public $player = null;
        public $timestamp;
        public $gameserver;
        public $description;
        public $report_status;

        public $evidence_ids = array();

        /**
         * @return mixed
         */
        public function getReportStatus()
        {
            return $this->report_status;
        }

        /**
         * @return array
         */
        public function getEvidenceIds()
        {
            return $this->evidence_ids;
        }
        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @return mixed
         */
        public function getGameserver()
        {
            return $this->gameserver;
        }

        /**
         * @return The player as object
         */
        public function getPlayer()
        {
            return $this->player;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @return mixed
         */
        public function getTimestamp()
        {
            return $this->timestamp;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @param null $player
         */
        public function setPlayer($player)
        {
            $this->player = $player;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }

        /**
         * @param mixed $gameserver
         */
        public function setGameserver($gameserver)
        {
            $this->gameserver = $gameserver;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @param array $evidence_ids
         */
        public function setEvidenceIds($evidence_ids)
        {
            $this->evidence_ids = $evidence_ids;
        }

        /**
         * @param mixed $timestamp
         */
        public function setTimestamp($timestamp)
        {
            $this->timestamp = $timestamp;
        }

        /**
         * @param mixed $report_status
         */
        public function setReportStatus($report_status)
        {
            $this->report_status = $report_status;
        }

        function __construct($_id, $_title, $_name, $_steamid, $_timestamp, $_gameserver, $_description, $_report_status)
        {
            $_player = new Player($_steamid, $_name);

            $this->setPlayer($_player);
            $this->setId($_id);
            $this->setTitle($_title);
            $this->setTimestamp($_timestamp);
            $this->setGameserver($_gameserver);
            $this->setDescription($_description);
            $this->setReportstatus($_report_status);
        }

        ///Description: Creates a panel with info
        ///Date : 18-8-18
        ///Returns: HTML Panel per item
        public function getReadablePanel()
        {
            $_player = $this->getPlayer();

            $status = null;

            //Status of reports.
            switch($this->getReportstatus())
            {
                case 0:
                    $status = "Pending";
                    break;
                case 1:
                    $status = "Under Review";
                    break;
                case 2:
                    $status = "Reviewed";
                    break;
                default:
                    $status = "undefined";
            }


            $htmlCode =
                '
                <div class="card" style="width: 18rem;margin:7px;">
                    <div class="card-header">'. $_player->getName() .' ('. $_player->getSteamid() .') </div>
                    <div class="card-body">
                         <h5 class="card-title">'. $this->getTitle() .'</h5>
                         <p class="card-text">'. $this->getDescription() .'</p>
                    </div>
                    <a id="test" onclick="loadReportModal();" href="" style="margin:5px;" class="btn btn-primary">View report</a>
                    
                ';

            //Possibility for another button based on right?

            $htmlCode .=
                '
                <div class="card-footer">
                         <small class="text-muted">Report status: '. $status .'</small>
                    </div>
                </div>';


            return $htmlCode;
        }

        public function getFullReport()
        {

        }


        public function getAdminPanel()
        {

        }
}


