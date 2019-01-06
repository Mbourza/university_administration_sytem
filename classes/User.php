<?php 

class User {

    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $_isLoggedIn;

    public function __construct($user = null){

        $this->_db = DB::getInstance();
        
        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');
        
        if(!$user) {
            
            if(Session::exists($this->_sessionName)) {
                
                $user = Session::get($this->_sessionName);
                
                if($this->find($user)) {
                    
                    $this->_isLoggedIn = true;
                } else{
                    
                    //logout
                }
            }
            
        } else{
                
            $this->find($user);
        }
    }

    public function create($fields = array()){

        if(!$this->_db->insert('members', $fields)){

            throw new Exception('There Was A Problem Creating Account');
        }
    }
    
    public function find($user = null){
        
        if($user){
            
            $field = (is_numeric($user)) ? 'id' : 'memb_nom';
            $data = $this->_db->get('members', array($field, '=', $user));
            
            if($data->count()){  
                $this->_data = $data->first();
                return true;
            }
        }
        
        return false;
    }
    public function delete($fields = array()){

        if(!$this->_db->delete('members', $fields)){

            throw new Exception("Can't Delete This Account !!");
        }
    }
    public function login($username = null, $password = null, $remember = false){
        
        if(!$username && !$password && $this->exists()) {

            Session::put($this->_sessionName, $this->data()->memb_nom); 

        } else {

            $user = $this->find($username);
            
            if($user){
                
                if($this->data()->memb_pass === Hash::make($password, $this->data()->memb_salt)){
                    
                    Session::put($this->_sessionName, $this->data()->memb_nom);

                    if($remember){

                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('sessions', array('memb_id', '=', $this->data()->id));

                        if(!$hashCheck->count()){

                            $this->_db->insert('sessions', array(

                                'memb_id' => $this->data()->id,
                                'hash' => $hash
                            ));

                        } else{

                            $hash = $hashCheck->first()->hash;
                        }

                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }

                    return true;
                }
            }
        }
        return false;
    }
    
    public function hasPerrmision($key){

        $group = $this->_db->get('groups', array('id', '=', $this->data()->memb_group));

        if($group->count()){

            $permissions = json_decode($group->first()->permissions, true);

            if($permissions[$key] == true) {

                return true;

            }
        }

        return false;
    }

    public function exists(){

        return (!empty($this->_data)) ? true : false;
    }

    public function logOut(){
        
        $this->_db->delete('sessions', array('memb_id', '=', $this->data()->id));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }
    
    public function data(){
        
        return $this->_data;
    }
    
    public function isLoggedIn(){
        
        return $this->_isLoggedIn;
    }
}



?>