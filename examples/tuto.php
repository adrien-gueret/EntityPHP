<?php

//Include the ORM
require '../src/EntityPHP.php';

class Characters extends \EntityPHP\Entity
{
	protected $firstname;
	protected $lastname;
	protected $age;

	public static function __structure()
	{
		return array(
			'firstname'	=>	'VARCHAR(255)',
			'lastname'	=>	'VARCHAR(255)',
			'age'		=>	'INT(10)',
		);
	}
}

//Init connection to the database
\EntityPHP\Core::connectToDB('localhost', 'entityphp', '3n7i7iPHP', 'entityphp');

//Create a new character by setting its properties
$myCharacter	=	Characters::getById(1);

if( ! empty($myCharacter))
{
	$myCharacter->setProps(array(
			'firstname'	=>	'Théo',
			'lastname'	=>	'Bligé',
		));

	Characters::update($myCharacter);
}
else
{
	echo 'The user to update is not found.';
}