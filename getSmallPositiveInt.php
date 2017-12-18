<?php

function getLessAndMore( $array )
{
	$numElem     = count( $array );
	$lessAndMore = array();
	$newArray    = array();

	for ($i = 0; $i < $numElem; $i++ ) :
		$oneLess = $array[$i] - 1;
		$oneMore = $array[$i] + 1;
		
		if ( $oneLess > 0 ) :
			$lessAndMore[] = $oneLess;	
		endif;

		if ( $oneMore > 0 ) :
			$lessAndMore[] = $oneMore;
		endif;

		$newArray[$array[$i]] = $array[$i];
	endfor;

	return array($lessAndMore, $newArray);
}

function getSmallPositiveInt( $array )
{
	$aLessAndMore = getLessAndMore( $array );

	if ( ! $aLessAndMore[0] ) {
		return 1;
	}

	$lessAndMore = $aLessAndMore[0];
	$newArray    = $aLessAndMore[1];
	$numElem     = count( $lessAndMore );
	$intLess     = 0;

	for ($i = 0; $i < $numElem; $i++) :
		if ( isset( $newArray[$lessAndMore[$i]] ) ) :
			continue;
		endif;

		if ( $lessAndMore[$i] < $intLess || $intLess === 0 ) :
			$intLess = $lessAndMore[$i];
		endif;	
	endfor;

	return $intLess;	
}