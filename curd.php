<?Php

class API extends REST {

	public $data = "";
	
		
/*
	//Local
	const DB_SERVER = "localhost";
	const DB_USER = "root";
	const DB_PASSWORD = "root";
	const DB = "cic_ring";
			
	//Brains
	const DB_SERVER = "localhost";
	const DB_USER = "root";
	const DB_PASSWORD = "Bra1nsdesign,,";
	const DB = "cic_ring";

	//Telstra
	const DB_SERVER = "localhost";
	const DB_USER = "root";
	const DB_PASSWORD = "brains!CICV";
	const DB = "cic_ring";
*/
	

/* Orc123$%^

	//Telstra
	const DB_SERVER = "localhost";
	const DB_USER = "root";
	const DB_PASSWORD = "root";
	const DB = "gnaraloo";
	
	private $db = NULL;
	private $mysqli = NULL;
	public function __construct(){
		parent::__construct();				// Init parent contructor
		$this->dbConnect();	// Initiate Database connection
	}


	/*
	 *  Connect to Database
	*/
	private function dbConnect(){
		$this->mysqli = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DB);
		
	}

	/*
	 * Dynmically call the method based on the query string
	 */
	public function processApi(){
		
		$func = strtolower(trim(str_replace("/","",$_REQUEST['x'])));
		if((int)method_exists($this,$func) > 0)
			$this->$func();
		else
			$this->response('',404); // If the method not exist with in this class "Page not found".
		
	}

	
	private function showData(){

		if($this->get_request_method() != "POST"){
			$result = array("msg"=>"Invalid Type","response"=>"Invalid type, use POST Method type");
			$this->response($this->json($result),406);
		}

		$result = array("msg"=>"Success","response"=>"Inserted Succesfully");
		$this->response($this->json($result),200);	// If no records "No Content" status 
	}


	/*
	 *	Encode array into JSON
	*/
	private function json($data){
		if(is_array($data)){
			return json_encode($data);
		}
	}
}

?>