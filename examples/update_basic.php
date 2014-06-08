<?php

//We admit that Characters class and its table exist

//Get the character with id 1
$myCharacter	=	Characters::getById(1);

//Check if character is found
if( ! empty($myCharacter))
{
	//Update its properties
	$myCharacter->setProps(array(
		'firstname'	=>	'Théo',
		'lastname'	=>	'Bligé',
	));

	//And save the changes!
	Characters::update($myCharacter);
}
else
{
	echo 'The character to update is not found.';
}