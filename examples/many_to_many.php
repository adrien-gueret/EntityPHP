<?php

//Include the ORM
require '../src/EntityPHP.php';

//Create a class representation of the table "Languages"
class Languages extends \EntityPHP\Entity
{
	protected $name;

	/* Overwrite constructor since this class has only one property: default constructor is useless!
	/!\Constructor should be accept no arguments since it's used behing the scene by EntityPHP /!\*/
	public function __construct($name = null)
	{
		$this->name	=	$name;
	}

	//__structure() method is mandatory and must return an array
	public static function __structure()
	{
		return array(
			'name'	=>	'VARCHAR(50)',
		);
	}
}

//Create a class representation of the table "Developers"
class Developers extends \EntityPHP\Entity
{
	protected $firstname;
	protected $lastname;
	protected $languages;

	//__structure() method is mandatory and must return an array
	public static function __structure()
	{
		return array(
			'firstname'	=>	'VARCHAR(255)',
			'lastname'	=>	'VARCHAR(255)',
			//We want to define a Many to Many relationships, so we
			//use an array with the class name to bind as single value
			'languages'	=>	array('Languages'),
		);
	}
}

//Init connection to the database
\EntityPHP\Core::connectToDB('localhost', 'entityphp', '3n7i7iPHP', 'entityphp');

//Generate the database (this method should be execute only once)
\EntityPHP\Core::generateDatabase();

//Create several languages
$php		=	new Languages('PHP');
$javascript	=	new Languages('JavaScript');
$c			=	new Languages('C');
$ruby		=	new Languages('Ruby');
$python		=	new Languages('Python');

//Store all languages in one call thanks to addMultiple()
Languages::addMultiple(array($php, $javascript, $c, $ruby, $python));

//Create several developers
$jean	=	new Developers(array(
	'firstname'	=>	'Jean',
	'lastname'	=>	'Peplu',
	'languages'	=>	array($php, $javascript)
));

$mona	=	new Developers(array(
	'firstname'	=>	'Mona',
	'lastname'	=>	'Bruti',
	'languages'	=>	array($ruby, $python)
));

$theo	=	new Developers(array(
	'firstname'	=>	'Théo',
	'lastname'	=>	'Bligé',
	'languages'	=>	array($c)
));

$homer	=	new Developers(array(
	'firstname'	=>	'Homer',
	'lastname'	=>	'Dalor',
	'languages'	=>	array()
));

//Store all developers in one call thanks to addMultiple()
Developers::addMultiple(array($jean, $mona, $theo, $homer));