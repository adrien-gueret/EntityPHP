<?php

//We admit that Authors & Articles classes and their tables exist

//Get the article with id 1
$myArticle	=	Articles::getById(1);

//Check if character is found
if( ! empty($myArticle))
{
	//Get the new author to link to the article
	$myAuthor	=	Authors::getById(2);

	if( ! empty($myAuthor))
	{
		//Update the "author" field of the article
		$myArticle->prop('author', $myAuthor);

		//And save the changes!
		Articles::update($myArticle);
	}
	else
	{
		echo 'The new author of the article is not found.';
	}
}
else
{
	echo 'The article to update is not found.';
}