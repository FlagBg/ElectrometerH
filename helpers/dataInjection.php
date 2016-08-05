<?php 



ini_set( 'display_errors', 'On' );
//http://codereview.stackexchange.com/questions/27173/php-spell-checker-with-suggestions-for-misspelled-words
function addTo( $line )
{
	return strtolower( trim( $line ) );
}
$data = array_map( 'addTo', file( 'dictionary.txt' ) );

$data = array_unique( $data );

function checkSpelling( $input, $data)
{
	$suggestions = array();
	
	if( in_array( $input, $data ) )
	{
		echo "it is alright. It is all numbers as String.!";
	}
	else
	{
		foreach($data as $word){
		$percentageSimilarity=0.0;
		$input = preg_replace('/[^a-z0-9 ]+/i', '', $input);
		similar_text(strtolower(trim($input)), strtolower(trim($word)), $percentageSimilarity);
		if($percentageSimilarity>=90 && $percentageSimilarity<100){
		if(!in_array($suggestions)){
		array_push($suggestions, $word);
	}
}
	}
if ( empty($suggestions ) )
{
	foreach( $data as $word )
	{
		$input = preg_replace('/[^a-z0-9 ]+/i', '', $input);
		$workOut = $workOut(strtolower(trim($input)), strtolower(trim($word)));
		
		if( $workOut<=2 && $workOut>0 )
		{
			if(!in_array($suggestions))
			{
				array_push($suggestions, $word);
			}
		}
	}
}
    echo "Looks like you spelled that wrong. Here are some suggestions: <br />";
         foreach($suggestions as $suggestion){
             echo "<br />".$suggestion."<br />";
         }
    }
}
if(isset($_GET['check'])){
    $input = trim($_GET['check']);
    $sentence='';
    if(stripos($input, ' ')!==false){
    $sentence = explode(' ', $input);
    foreach($sentence as $item){
        checkSpelling($item, $words);
    }
    }
    else{
         checkSpelling($input, $words);
    }
 }
 ?>
<!Doctype HTMl>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Spell Check</title>
    </head>
    <body>
        <form method="get">
             <input type="text" name="check" autocomplete="off" autofocus />
        </form>
    </body>
</html>