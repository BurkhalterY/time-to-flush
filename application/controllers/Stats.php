<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stats extends MY_Controller {

	protected $access_level = "*";

	public function index()
	{
		$period = 45;
		$wednesday = 8 * $period;
		$thursday = 7 * $period;
		$week = $wednesday + $thursday;
		$month = $week * 4;

		switch (date('N')) {
			case 3:
				$today = $wednesday;
				break;
			case 4:
				$today = $thursday;
			default:
				$today = 0;
				break;
		}

		$base_query = 'SELECT SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time))/60) AS duration FROM records';

		$daily = $this->db->query($base_query.' WHERE DATE(start_time) = CURDATE()');
		$daily->result()[0]->total = $today;
		$data['charts'][] = $daily->result()[0];

		$weekly = $this->db->query($base_query.' WHERE YEARWEEK(start_time, 1) = YEARWEEK(CURDATE(), 1)');
		$weekly->result()[0]->total = $week;
		$data['charts'][] = $weekly->result()[0];

		$monthly = $this->db->query($base_query.' WHERE MONTH(start_time) = MONTH(CURRENT_DATE()) AND YEAR(start_time) = YEAR(CURRENT_DATE())');
		$monthly->result()[0]->total = $month;
		$data['charts'][] = $monthly->result()[0];

		$firstRecord = $this->db->query('SELECT start_time FROM records ORDER BY start_time LIMIT 1');

		$allTheTime = $this->db->query($base_query);
		$allTheTime->result()[0]->total = $week * floor((new DateTime($firstRecord->result()[0]->start_time))->diff(new DateTime())->days/7);
		$data['charts'][] = $allTheTime->result()[0];

		$matter = $this->db->query('SELECT SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time))/60) AS duration, matter FROM records LEFT JOIN matters ON fk_matter = matters.id GROUP BY fk_matter');
		foreach ($matter->result() as $row) {
			$data['matters'][] = $row;
		}

		$this->display_view('stats/index', $data);
	}
}
