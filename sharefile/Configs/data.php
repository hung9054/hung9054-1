 <?php
 class data{
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "sharefile";
        private $connection;                         
        private $status = false;
        private $query;
        private $result;
        
      
       public function __construct(){
            
             if (!$this->connection = mysql_connect($this->hostname, $this->username, $this->password)){
                die ("Không thể kết nối với server ");
             }
             else{
                //ini_set('mysql.charset','UTF-8');
                mysql_query("SET NAMES 'utf8'");
                if (!mysql_select_db($this->dbname,$this->connection)){
                    die ("Không thể kết nối với cơ sở dữ liệu ");
                    mysql_close($this->connection);
                }
                else{
                    
                    $this->status = true;
                }
             }
        }
                
        public function setQuery($query)
        {
            $this->query = $query;
        }
          
        public function getQuery(){
            return $this->query;
        }
         public function getResult(){
            return $this->result;
        }
        
        public function isExits($table="", $where=""){
            
            if (empty($table) || empty($where))
            {
                return FALSE;
            }
            if ($this->status == false){
                $this->__construct();
            } 
            $this->setQuery("select * from $table where $where");
            //echo $this->getQuery();                      
            $this->result = mysql_query($this->query);
            return mysql_num_rows($this->result);
        }
        
   
                             
        public function fetchAll(){
            if ($this->status == false){
                $this->__construct();
            }
            $this->result = mysql_query($this->query);
            return $this->result;
            
        }
		 public function CURDATE(){
            if ($this->status == false){
                $this->__construct();
            }
			$sql="select CURDATE();";
            $this->result = mysql_query($sql);
            return $this->result;
            
        }
		public function addCURDATE($a){
            if ($this->status == false){
                $this->__construct();
            }
			$sql="SELECT ADDDATE(CURDATE(), INTERVAL ".$a." DAY)";
            $this->result = mysql_query($sql);
            return $this->result;
            
        }
		
        
       
       
 
        
        /*---------------------------------------------------------
     
     */
        
           public function executeQuery(){
            if ($this->status == false){
                $this->__construct();
            }
            $this->result = mysql_query($this->query);
            $rows = mysql_affected_rows();
            return $rows; 
        }
        
   }

  
?>
