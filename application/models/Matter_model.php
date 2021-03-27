<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Matter_model extends MY_Model
{
	/* Set MY_Model variables */
	protected $_table = 'matters';
	protected $primary_key = 'id';
	protected $protected_attributes = ['id'];
	protected $has_many = ['records' => ['primary_key' => 'fk_record',
										 'model' => 'record_model']];

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}
}
