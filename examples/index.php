<?php

//Include the ORM
require '../src/EntityPHP.php';

//Create a class representation of the table "Characters"
class Characters extends \EntityPHP\Entity
{
	protected $firstname;
	protected $age;

	//__structure() method is mandatory and must return an array
	public static function __structure()
	{
		return array(
			'firstname'	=>	'VARCHAR(255)',
			'age'		=>	'INT(11)',
		);
	}
}

//Init connection to the database
\EntityPHP\Core::connectToDB('localhost', 'entityphp', '3n7i7iPHP', 'entityphp');

//Generate the database (this method should be execute only once)
\EntityPHP\Core::generateDatabase();

//Create a new character
$character	=	new Characters();

//Set its properties
$character->setProps(array(
	'firstname'	=>	'John',
	'age'		=>	20,
));

//And store it to our table!
Characters::add($character);