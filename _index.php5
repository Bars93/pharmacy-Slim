<?php
if(isset($_GET)) {
    var_dump($_GET);
    var_dump($_SERVER);
}
else {
	echo "Null ptr";

}
?>