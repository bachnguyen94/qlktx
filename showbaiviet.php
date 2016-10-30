<div style="border-radius: 10px; border:3px solid green;padding:20px">
<?php
	require_once 'config/config.php';
	$idbaiviet = $_GET['idbaiviet'];
	$sql = "SELECT noidung FROM tintuc WHERE id={$idbaiviet}";
	$result = mysqli_query($quanlyktx,$sql);
	$row = mysqli_fetch_assoc($result);
	echo $row['noidung'];
	echo "<br />";
	define('name', 'value');
	/*function foobar($arg, $arg2) {
    echo __FUNCTION__, " got $arg and $arg2\n";
	}
	class foo {
	    function bar($arg, $arg2) {
	        echo __METHOD__, " got $arg and $arg2\n";
	    }
	}
	call_user_func_array("foobar", array("one", "two"));

	// Call the $foo->bar() method with 2 arguments
	$foo = new foo;
	call_user_func_array(array($foo, "bar"), array("three", "four"));*/
	// echo __DIR__;
	// echo name;
?>
</div>