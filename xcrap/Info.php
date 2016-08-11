<?php

abstract class Database 
{
	abstract public function connect($server, $username, $password, $database);
	abstract public function query($sql);
	abstract public function fetch();
	abstract public function close();
}

/* Mark a class as abstract by placing the abstract keyword before class.
Abstract classes must contain at least one method that is also marked abstract. These
methods are called abstract methods. Database contains four abstract methods: con
nect(), query(), fetch(), and close(). These four methods are the basic set of functionality
necessary to use a database.
If a class contains an abstract method, the class must also be declared abstract. However,
abstract classes can contain nonabstract methods (even though there are no regular
methods in Database).
Abstract methods, like methods listed in an interface, are not implemented inside the
abstract class. Instead, abstract methods are implemented in a child class that extends
the abstract parent. For instance, you could use a MySQL class:
 */

class MySQL extends Database {
	
	protected $dbh;
	protected $query;
	
	
	public function connect( $server, $username, $password, $database )
	{
		$this->dbh = mysqli_connect( $server, $username,
									$password, $database);
	}
	
	public function query( $sql )
	{
	$this->query = mysqli_query( $this->dbh, $sql );
	}
	
	public function fetch()
	{
	return mysqli_fetch_row($this->dbh, $this->query);
	}
		
	public function close()
	{
	mysqli_close($this->dbh);
	}
		
}
	/*
	 * Abstract classes are best used when you have a series of objects that are related using
the is a relationship. Therefore, it makes logical sense to have them descend from a
common parent. However, whereas the children are tangible, the parent is abstract.
Take, for example, a Database class. A database is a real object, so it makes sense to have
a Database class. However, although Oracle, MySQL, Postgres, MSSQL, and hundreds
of other databases exist, you cannot download and install a generic database. You must
choose a specific database.
PHP provides a way for you to create a class that cannot be instantiated. This class is
known as an abstract class. For example, see the Database class:

---------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------

Use static:: to change this behavior, such as in this ORM example:
*/	

class Model 
{

	protected static function validateArgs( $args )
	{
	throw new Exception( "You need to override this in a subclass!" );
	}

	public static function find( $args )
	{
	static::validateArgs( $args );
	
	$class = get_called_class();
	// now you can do a database query, such as:
	// SELECT * FROM $class WHERE ...
	}
	
}

class Bicycle extends Model
{
	protected static function validateArgs( $args )
	{
	return true;
	}
	
}

Bicycle::find( ['owner' => 'peewee'] );
/*
With self::, PHP binds to Model::validateArgs(), which doesn’t allow for modelspecific
validation. However, with static::, PHP will defer until it knows which class
the method is actually called from. This is known as late static binding.		

Inside of find(), to generate your SQL, you need the name of the calling class. You
cannot use the Reflection classes and the __CLASS__ constant because they return
Model, so use get_called_class() to pull this at runtime.
PHP also has a feature known as static properties. Every instance of a class shares these
properties in common. Thus, static properties act as class-namespaced global variables.
One reason for using a static property is to share a database connection among multiple
Database objects. For efficiency, you shouldn’t create a new connection to your database
every time you instantiate Database. Instead, negotiate a connection the first time and
reuse that connection in each additional instance, as shown:

 */

class Database
 {
	private static $dbh = NULL;
	
	public function __construct( $server, $username, $password )
	{
	if ( self::$dbh == NULL )
		{
		self::$dbh = db_connect( $server, $username, $password );
		} else
			{
			// reuse existing connection
			}
	}
	
 }
	
 $db = new Database('db.example.com', 'web', 'jsd6w@2d');
	// Do a bunch of queries
$db2 = new Database('db.example.com', 'web', 'jsd6w@2d');

	// Do some additional queries
	/* Static properties, like static methods, use the double colon notation. To refer to a static
	property inside of a class, use the special prefix of self. self is to static properties and
	methods as $this is to instantiated properties and methods.
	The constructor uses self::$dbh to access the static connection property. When $db
	is instantiated, dbh is still set to NULL, so the constructor calls db_connect() to negotiate
	a new connection with the database.
	This does not occur when you create $db2, because dbh has been set to the database
	handle.
	 */


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		