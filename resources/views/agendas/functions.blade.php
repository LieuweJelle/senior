@include('agendas.functions') 
<div class='styled-select'>
<?php dayPullDown($d, $m, $lang['daysinmonth']); ?>
</div>&nbsp;<div class='styled-select'>
<?php monthPullDown($d, $m, $lang['months']); ?>
</div>&nbsp;<div class='styled-select'>
<?php yearPullDown($y,$disabled); ?>
</div><br />
<?php
function dayPullDown($day, $month, $montharray, $disabled='', $name='day') {
	echo "<select class='sday' name='".$name."'$disabled>";
  $day = (substr($day,0,1)==0) ? substr($day,1,2) : $day;
	$selected[$day] = ' selected';
  $daysOfMonth = $montharray[$month-1];
	for($i=1;$i <=$daysOfMonth ; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : '';
		echo "<option value='$i'$sel>$i</option>";
	}
	echo "</select>";
}

function monthPullDown($day, $month, $montharray, $disabled='', $name='month') {
	echo "<select class='smonth' name='".$name."' onchange='submitMonthYear()'$disabled>";
	$selected[$month - 1] = ' selected';
	for($i=0;$i < 12; $i++) {
		$val = $i + 1;
		$sel = (isset($selected[$i])) ? $selected[$i] : '';
		echo "<option value='$val'$sel>$montharray[$i]</option>";
	}
	echo "</select>";
}

function yearPullDown($year, $disabled='', $name='year') {
	echo "<select class='syear' name='".$name."' onchange='submitMonthYear()'$disabled>";
	$selected[$year] = ' selected';
	$years_before_and_after = 3;
	$start_year = $year - $years_before_and_after;
	$end_year   = $year + $years_before_and_after;

	for($i=$start_year;$i <= $end_year; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : '';
		echo "<option value='$i'$sel>$i</option>";
	}
	echo "</select>";
}

function hourPullDown($hour, $namepre) {
	echo "\n<select name=\"" . $namepre . "_hour\">\n";
	$selected[$hour] = ' selected="selected"';
	for($i=8;$i <= 17; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

function minPullDown($min, $namepre) {
	echo "\n<select name=\"" . $namepre . "_min\">\n";
	$selected[$min] = ' selected="selected"';
	for($i=0;$i < 60; $i+=5) {
		$disp_min = sprintf("%02d", $i);
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "\t<option value=\"$i\"$sel>$disp_min</option>\n";
	}

	echo "</select>\n\n";
}
?>