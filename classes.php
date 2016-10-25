<?php
class animal
{
	protected $aname;
	protected $afood;
	protected $asound;
	protected  $aid;
	public static $anumber_of_animals;
	
	public function getname()
	{
		return $this->aname;
	}
	public function __construct()
	{
		$this->aid = rand(0000,9999);
		echo "<br>ID of this animal is".$this->aid;
		animal::$anumber_of_animals++;
		echo "<br>This is animal ".animal::$anumber_of_animals;
	}
	function __destruct()
	{
		echo $this->aname."has been destroyed";
	}
	function __get($name)
	{
		echo "<br> Asked for ".$name;
		return $this->$name;
	}
	function __set($name,$value)
	{
		switch($name)
		{
			case "aname" : $this->aname = $value;
				break;
			case "afood" : $this->afood = $value;
				break;
			case "asound" : $this->asound = $value;
				break;
			
		}
		echo "<br>".$name." has been given ".$value;
	}
	public function run()
	{
		echo $this->aname." runs like crazy";
	}
}
class dog extends animal
{
	public function run()
	{
		echo $this->aname." runs like crazy";
	}
}
$animal1 = new animal();
$animal2 = new animal();

$animal1->aname = "Dog";
$animal1->afood = "Meat";
$animal1->asound = "Gurr";
echo "<br>".$animal1->aname." Likes ".$animal1->afood." and makes the sound ".$animal1->asound;
echo "<br>";
$animal1->run();


?>
