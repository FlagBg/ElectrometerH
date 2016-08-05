<?php 

include_once '..Models/ElectrometerModel.php';

class ShowElectrometer
{
	protected 		$electrometerDatas;
	protected 		$id;
	protected 		$datDayRate;
	protected 		$datNightRate;
	protected 		$datDateAdded;
	protected 		$datDateUpdated;
	
	
	public function __construct()
	{
		
	}
	
	public function showElectrometer()
	{
		$electrometerModel = new ElectrometerModel();
		
		$electrometerModel->showElectrometer( $this->electromerDatas );
		// so you're trying to redirect to this file? Or from it? to it
		//writing the index to request the form.... than to show the data, i think in 20 minutes time, or an hour i will be ready.. needs to be like, let me show what
		//i did up to now;
		// okay.....
		
	}
		
	public function renderForm()
	{
		$form = file_get_contents( __DIR__ . '../Views/createElectromer.html');
		
		print $form;
		
	}
	
}

?>