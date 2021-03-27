<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timer extends MY_Controller {

	protected $access_level = "*";

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->display_view('timer/index');
	}

	public function save()
	{
		$start = date("Y-m-d H:i:s", $_POST['start']/1000);
		$end = date("Y-m-d H:i:s", ($_POST['start']+$_POST['end'])/1000);

		$day = date("N", $_POST['start']/1000);

		$query = $this->db->query("SELECT id FROM matters WHERE CAST('".$this->db->escape_str($start)."' AS time) >= start AND CAST('".$this->db->escape_str($start)."' AS time) < end AND day = ".$this->db->escape($day));
		if($query->num_rows() > 0){
			$id_matter = $query->result()[0]->id;
		} else {
			$id_matter = null;
		}

		$data = [
			'start_time' => $start,
			'end_time' => $end,
			'fk_matter' => $id_matter
		];
		$this->db->insert('records', $data);
	}
}
