<?php

include_once '../Models/ElectrometerModel.php';

/**
 * @brief	register new Electromterer
 *
 * @param	int	id;$this
 *
 * @author FlagBg
 *
 */
class AddElectrometer
{
	/**
	 * @brief
	 */
	public function __construct()
	{

	}

	/**
	 * @brief	create the Electrometer as a object with name and date
	 *
	 * @param	array			$this->electrometerData
	 * @param	string			$name
	 * @param	timesptamp
	 *
	 * @return	array( $result )
	 */
	
	public function registerElectrometer()
	{
		$electrometersData = array(
				'ele_name'			=> $_POST['elctr_name'],
				'ele_date_added'	=> $_POST['elctr_date'],
				'ele_status'		=> $_POST['elctr_status'],
				'ele_date_added' 	=> $_POST['elctr_date'],
				// to do ele_added_by_user_id
		);

		$electrometerModel = new ElectrometerModel();

		$result = $electrometerModel->registerElectrometer( $electrometerData );

		return $result;

	}

	//we need the form...... coz every controller has it's own form....... let's request one :)
	public function renderForm()
	{
		$form = file_get_contents( __DIR__ . '/../Views/Electrometer/addElectrometer.html');

		print $form;
	}
	
	public function loadContent()
	{
		$form = file_get_contents( __DIR__ . '/../Views/Electrometer/addElectrometer.html');
		
		print $form;//
	}
}