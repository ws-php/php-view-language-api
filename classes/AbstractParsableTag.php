<?php
require_once("TagExpressionParser.php");

/**
 * Implements operations common to all parsable (non-system) tags. All parsable tag classes must extend it.
 */
abstract class AbstractParsableTag {
	/**
	 * Parses start tag.
	 *  
	 * Example: <standard:foreach var="${ad.d}" key="K" value="V">
	 * 
	 * @param array(string=>string) $tblParameters
	 * @return string
	 */
	abstract public function parseStartTag($tblParameters=array());
	
	/**
	 * Parses end tag. 
	 * 
	 * Example: </standard:foreach>
	 * 
	 * @return string
	 */
	abstract public function parseEndTag();
		
	/**
	 * Checks if tag attribute values contain expressions.
	 * 
	 * @param string $strExpression
	 * @return boolean
	 */
	protected function isExpression($strExpression) {
		return (strpos($strExpression,'${')!==false?true:false);
	}
	
	/**
	 * Converts expressions from tag attribute values into PHP.
	 * 
	 * @param string $strExpression
	 * @return string
	 */
	protected function parseExpression($strExpression) {
		$objExpression = new TagExpressionParser();
		return $objExpression->parse($strExpression);
	}
	
	/**
	 * Verifies if tag has required attributes defined. 
	 * 
	 * @param array(string=>string) $tblParameters
	 * @param array(string) $tblRequiredParameters
	 * @throws ViewException
	 * @return boolean
	 */
	protected function checkParameters($tblParameters, $tblRequiredParameters) {
		foreach($tblRequiredParameters as $strName) {
			if(!isset($tblParameters[$strName])) throw new ViewException("You must define '".$strName."' attribute for ".get_class($this)."!");
		}
		return true;
	}
}