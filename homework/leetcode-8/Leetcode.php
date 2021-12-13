class Solution {

/**
* @param String $s
* @param Integer $numRows
* @return String
*/
function convert($s, $numRows) {
if ($numRows === 1) {
return $s;
}

$res = "";

$strLen = strlen($s);

$skip = 2 * ($numRows - 1);

for ($i = 0; $i < $numRows; $i++) {
for ($j = 0; $j + $i < $strLen; $j += $skip) {
$res .= $s[$j + $i];
if ($i !== 0 && $i !== $numRows - 1 && ($j + $skip - $i) < $strLen) {
$res .= $s[$j + $skip - $i];
}
}
}

return $res;
}
}