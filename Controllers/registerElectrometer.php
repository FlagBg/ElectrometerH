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
class RegisterElectrometer
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
				'name'			=> $_POST['ele_name'],
				'insertDate' 	=> $_POST['ele_date_added']
		);
		
		$electrometerModel = new ElectrometerModel();
		
		
		$result = $electrometerModel->registerElectrometer( $electrometerData );
		
		return $result;
		
	}
	
	//we need the form...... coz every controller has it's own form....... let's request one :)
	
	public function renderForm()
	{
		$form = file_get_contents( __DIR__ . '/../Views/Electrometer/registerElectrometer.html');
		
		print $form;
		
	}
	
	
	
}