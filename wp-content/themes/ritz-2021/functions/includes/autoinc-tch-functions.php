<?php
function tch_NumToOrdinalWord($num)
{
    $first_word = array('eth', 'First', 'Second', 'Third', 'Fouth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth', 'Elevents', 'Twelfth', 'Thirteenth', 'Fourteenth', 'Fifteenth', 'Sixteenth', 'Seventeenth', 'Eighteenth', 'Nineteenth', 'Twentieth');
    $second_word = array('', '', 'Twenty', 'Thirty', 'Forty', 'Fifty');

    if ($num <= 20)
        return $first_word[$num];

    $first_num = substr($num, -1, 1);
    $second_num = substr($num, -2, 1);

    return $string = str_replace('y-eth', 'ieth', $second_word[$second_num] . '-' . $first_word[$first_num]);
}

function seoUrl($string) {
	//Lower case everything
	$string = strtolower($string);
	//Make alphanumeric (removes all other characters)
	$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	//Clean up multiple dashes or whitespaces
	$string = preg_replace("/[\s-]+/", " ", $string);
	//Convert whitespaces and underscore to dash
	$string = preg_replace("/[\s_]/", "-", $string);
	return $string;
}