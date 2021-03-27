<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Record_model extends MY_Model
{
	/* Set MY_Model variables */
	protected $_table = 'records';
	protected $primary_key = 'id';
	protected $protected_attributes = ['id'];
	protected $belongs_to = ['matter'=> ['primary_key' => 'fk_matter',
										 'model' => 'matter_model']];

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}
}
