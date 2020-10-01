


<?php

class FileManager{

	private static $_path_to_file = "asterisk/";
	private static $_file_name = "extentions.conf";

	static function get_path_to_file()
	{
		return self::$_path_to_file;
	}
	static function get_file_name()
	{
		return self::$_file_name;
	}
	static function get_path_plus_file_name()
	{
		return self::$_path_to_file.self::$_file_name;
	}

	//function is_context($cotext)

}