<?php

//Include the ORM
require '../src/EntityPHP.php';

//Create a class representation of the table "Authors"
class Authors extends \EntityPHP\Entity
{
	protected $firstname;
	protected $lastname;

	//__structure() method is mandatory and must return an array
	public static function __structure()
	{
		return array(
			'firstname'	=>	'VARCHAR(255)',
			'lastname'	=>	'VARCHAR(255)',
		);
	}
}

//Create a class representation of the table "Articles"
class Articles extends \EntityPHP\Entity
{
	protected $title;
	protected $content;
	protected $author;

	//__structure() method is mandatory and must return an array
	public static function __structure()
	{
		return array(
			'title'		=>	'VARCHAR(255)',
			'content'	=>	'TEXT',
			'author'	=>	'Authors',	//Instead of SQL type, we use the related class name
		);
	}
}

//Init connection to the database
\EntityPHP\Core::connectToDB('localhost', 'entityphp', '3n7i7iPHP', 'entityphp');

//Generate the database (this method should be execute only once)
\EntityPHP\Core::generateDatabase();

//Create a new author
$author	=	new Authors(array(
	'firstname'	=>	'Jean',
	'lastname'	=>	'Peplu',
));

//And store it to our table!
Authors::add($author);

//Create a new article
$article	=	new Articles(array(
	'title'		=>	'It should work!',
	'content'	=>	'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
					Ab assumenda dicta doloribus eaque earum, ex inventore libero
					odio perferendis possimus quaerat quidem quo ullam?',
	'author'	=>	$author
));

//And store it to our table!
Articles::add($article);

//Create a second article
$article	=	new Articles(array(
	'title'		=>	'It should work again!',
	'content'	=>	'Ex inventore libero odio perferendis possimus quaerat quidem quo ullam?
					Lorem ipsum dolor sit amet, consectetur adipisicing elit.
					Ab assumenda dicta doloribus eaque earum...',
	'author'	=>	$author
));

//And store it to our table!
Articles::add($article);