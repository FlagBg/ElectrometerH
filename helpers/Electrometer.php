<?php

//include_once 'InterfaceElectromer.php';
/**
 * 
 * @Brief This is a electrometer with two datas shows;
 * 
 * @details		when designing the electometer we actually some datas that are shown; 
 *
 */
class Electrometer //implements InterfaceElectromer
{
	/**
	 * @var float $dayRateValue;
	 * @var float $nighRateValue;
	 * @var float $priceDayRate;
	 * @var float $priceNightRate;
	 * @var	DateTime	$insertDate;
	 */
	protected $dayRateValue;	//it should be KW
	protected $nightRateValue; 	//it shoud be KW
	protected $id;
	protected $priceDayRate = 1.23;
	protected $priceNightRate = 0.87;
	protected $insertDate;
	
	/**
	 * 
	 * @param double $dayRateValue
	 * @param double $nightRateValue
	 */
	public function __construct( $id, $dayRateValue, $nightRateValue, $timestamp )
	{
		$this->dayRateValue		= $dayRateValue;
		$this->nightRateValue	= $nightRateValue;
		$this->id				= $id;
		$this->insertDate		= $insertDate;
		
		return print "I am the Meter..  my Id is:..." . $this->id . "datas are: Day rate is: " . $this->dayRateValue .
				"." . "My night Rate is " . $this->nightRateValue . " " . " created at " . $this->timestamp;
	}
	
	/**
	 * 
	 * @param float $dayRateValue
	 * 
	 * @return float;
	 */
	public function setDayRateValue( $dayRateValue )
	{
		$this->dayRateValue = $dayRateValue;
	}
	
	/**
	 * 
	 * @param float $nightRateValue
	 * 
	 * @return float;
	 */
	public function setNightRateValue( $nightRateValue )
	{
		$this->nightRateValue = $nightRateValue;
	}
	
	/**
	 * 
	 * @var float $this->nightRateValue;
	 */
	public function getNightRateValue()
	{
		return $this->nightRateValue;
	}
	
	/**
	 * @oaram float $getDayRateValue;
	 * 
	 * @return float
	 */
	public function getDayRateValue()
	{
		return $this->dayRateValue;
	}
	
	
	/**
	 * @brief	calculating the tariff for the day!
	 * 
	 * @param	float $priceDayRate
	 * @param	float $dayRateValue
	 * 
	 * @return float $result		
	 * @see InterfaceElectromer::priceDayRateValue()
	 */
	public function priceDayRateValue()
	{
		$result = $this->priceDayRate * $this->dayRateValue;
		echo "interface Electrometer ";
		return  $result; 		  
	}
	/**
	 * @brief	calculating the tariff for the night!
	 *
	 * @param	float $priceDayRate
	 * @param	float $dayRateValue
	 *
	 * @return float $result
	 * @see InterfaceElectromer::priceDayRateValue()
	 */
	public function priceNightRateValue()
	{
		$result = $this->priceNightRate * $this->nightRateValue;
		
		return $result;// . "Cena Noshtna Tarifa: "; //. $result = $this->priceNightRate * $this->nightRateValue;
	}
	
}

