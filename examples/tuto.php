<?php

//Include the ORM
require '../src/EntityPHP.php';

//Define table for monsters to pet
class PetMonsters extends EntityPHP\Entity
{
	protected $name;
	protected $life;
	protected $dateCreation;

	public static function __structure()
	{
		return array(
			'name'			=>	'VARCHAR(255)',
			'life'			=>	'INT(10)',
			'dateCreation'	=>	'DATE',
		);
	}

	public function __construct ($name = null, $life = 0)
	{
		$this->name = $name;
		$this->life = $life;
		$this->dateCreation = new DateTime();
	}
}

//Table for some usable items
class Items extends \EntityPHP\Entity
{
	protected $name;
	protected $price;

	public static function __structure()
	{
		return array(
			'name'	=>	'VARCHAR(255)',
			'price'	=>	'FLOAT(10,2)',
		);
	}

	public function __construct($name = null, $price = 0)
	{
		$this->name		=	$name;
		$this->price	=	$price;
	}
}

//Table for players
class Players extends \EntityPHP\Entity
{
	protected $name;
	protected $monster;	//A player can have a monster
	protected $items;	//A player can have several items

	public static function __structure()
	{
		return array(
			'name'		=>	'VARCHAR(255)',
			'monster'	=>	'PetMonsters',
			'items'		=>	array('Items'),
		);
	}

	public function __construct($name = null, $monster = null)
	{
		$this->name		=	$name;
		$this->monster	=	$monster;
	}
}

//Init connection to the database
\EntityPHP\Core::connectToDB('localhost', 'entityphp', '3n7i7iPHP', 'entityphp');
\EntityPHP\Core::generateDatabase();

//Add some items to the dabatase
$smallLife	=	new Items('Small life potion', 3);
$normalLife	=	new Items('Life potion', 5);
$bigLife	=	new Items('Big life potion', 8);
$smallMana	=	new Items('Small mana potion', 4);
$normalMana	=	new Items('Mana potion', 6);
$bigMana	=	new Items('Big mana potion', 9);

Items::addMultiple(array($smallLife, $normalLife, $bigLife, $smallMana, $normalMana, $bigMana));

//Add some monsters
$monster1	=	new PetMonsters('Unosaur', 100);
$monster2	=	new PetMonsters('Dososaur', 80);
$monster3	=	new PetMonsters('Tresosaur', 60);

PetMonsters::addMultiple(array($monster1, $monster2, $monster3));

//Add some players
$character1	=	new Players('Juno', $monster1);
$character2	=	new Players('Ados', $monster2);
$character3	=	new Players('Gitres', $monster3);

Players::addMultiple(array($character1, $character2, $character3));

