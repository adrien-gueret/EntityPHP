<?php

//We admit that Developers & Languages classes and their tables exist

//Get the developer with id 1
$myDeveloper	=	Developers::getById(1);

//Check if developer is found
if( ! empty($myDeveloper))
{
	//Get language with ID 3
	$myLanguage	=	Languages::getById(3);

	if( ! empty($myLanguage))
	{
		//Load the "languages" properties of the developer
		$languages	=	$myDeveloper->load('languages');

		//Add the new language to this list
		$languages->push($myLanguage);

		//And save the changes!
		Developers::update($myDeveloper);
	}
	else
	{
		echo 'The new language used by the developer is not found.';
	}
}
else
{
	echo 'The developer to update is not found.';
}