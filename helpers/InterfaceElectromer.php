<?php

/**
 * 
 * @brief	represents dayRate and NightRate of every electrometer;  User
 *
 */
interface InterfaceElectromer
{
	/**
	 * @brief		calculate the dayRate tariff of every electrometer;
	 * 				 
	 * @param	float;
	 */
	public function priceDayRateValue();
	
	/**
	 * @brief		calculate the dayRate tariff of every electrometer;
	 *
	 * @param	float;
	 */
	public function priceNightRateValue();
	
}