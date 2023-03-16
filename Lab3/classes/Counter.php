<?php 

class Counter{
    private $_count;
    public function __construct(){
        $this->_count = $this->get_count();
    }

    public function get_count(){
        if(file_exists(_Counter_File)){
            return intval(file_get_contents(_Counter_File));
        }else{
            return 0;
        }
    }

    public function increment(){
        if(!isset($_SESSION[_Session_key_Counter]))
        {
            $this->_count++;
            $_SESSION[_Session_key_Counter] = true;
            return $this->_count;
        }else{
            return false;
        }
    }
    public function update_counter(){
       $fp = fopen(_Counter_File,"w+");
       fwrite($fp, $this->_count);
       fclose($fp);
    }

    public function incremant_and_update(){
       if($this->increment()){
        $this->update_counter();
       }
    }
}

?>