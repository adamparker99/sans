<?php

    class GoogleAuth
    {
        protected $db;
        protected $client;
        
        public function __construct(DB $db = null, Google_Client $googleClient = null)
        {
            $this->db = $db;
            $this->client = $googleClient;
            if($this->client)
            {
                $this->client->setClientId('588709586069-70opkuf98s02usalksb99fm366n52d50.apps.googleusercontent.com');
                $this->client->setClientSecret('OW2Jkgj0wZkO0HhnpKOD9JO0');
                $this->client->setRedirectUri('https://sans-adamparker99.c9users.io/main.php');
                $this->client->setScopes('email');
            }
        }
        
        public function isLoggedIn()
        {
            return isset($_SESSION['access_token']);
        }
        
        public function getAuthUrl()
        {
            return $this->client->createAuthUrl();
        }
        
        public function checkRedirectCode()
        {
            if(isset($_GET['code']))
            {
                $this->client->authenticate($_GET['code']);
                
                $this->setToken($this->client->getAccessToken());
                
                //$payload = $this->getPayload();
                //echo '<pre>', print_r($payload), '</pre>';
                
                //$token_array = $this->client->verifyIdToken($token['id_token']);  //you need to specify that you want the id_token part of the array
	            //if ($token_array) {
		          //  echo "<pre>", print_r($token_array), "</pre>";
       		   //     die();
		        //}
		        
		        $payload = $this->storeUser($this->getPayload());
                //die();
                return true;
            }
            
            return false;
            
        }
        
        public function setToken($token)
        {
            $_SESSION['access_token'] = $token;
            
            $this->client->setAccessToken($token);
        }
        
        public function logout()
        {
            unset($_SESSION['access_token']);
        }
        
        protected function getPayload()
        {
            $payload = $this->client->verifyIdToken($token['id_token']);
            return $payload;
        }
        
        protected function storeUser($payload)
        {
            $sql = "
                INSERT INTO google_users (google_id, email)
                VALUES ({$payload['sub']}, '{$payload['email']}')
                ON DUPLICATE KEY UPDATE id = id
            ";
            
            $this->db->query($sql);
            //echo $payload['email'];
            //echo $payload['sub'];
        }
    }

?>