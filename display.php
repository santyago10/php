<?php
class T{
	public $currentMood;
	private static $badWork=0;
	private static $goodWork=0;
	public $moods=array("very bad","bad","normal","good");
	public function moodChanged(){
		echo "Mood was changed<br/> ";
	}

	public function getCurrentMood(){
		return $this->currentMood;
	}
	public function getBad(){
		return self::$badWork;
	}
	public function getGood(){
		return self::$goodWork;
	}
	public function ChangeMood($trainee)
	{
		static $var=0;
		$this->currentMood=$this->moods[$var];
		if($trainee===1){
			$var++;
			if($var<count($this->moods)){
				$this->currentMood=$this->moods[$var];
			}
			else{
				self::$goodWork++;
				$var--;
			}
			$this->moodChanged();
			echo "$this->currentMood </br>";
		}
		
		elseif($trainee===0){
			$var--;
			if($var>=0){
			    $this->currentMood=$this->moods[$var];
			}
			else {
				self::$badWork++;
			    $var++;
			}
			$this->moodChanged();
			echo "$this->currentMood</br>";
		}
		else{
			echo "Error</br>";
		}
		return $this->currentMood;
		
	}
};


class Manager extends T{
	public function getGood(){
		return parent::getGood();
	}
}

class Hr extends T{
	public function getBad(){
		return parent::getBad();
	}
}

$t1001=new Manager;
$t1000=new Hr;
$t70=new T;
$t70->ChangeMood(0);
$t70->ChangeMood(0);
$t70->ChangeMood(1);
$t70->ChangeMood(0);
$t70->ChangeMood(0);
$t70->ChangeMood(1);
$t70->ChangeMood(1);
$t70->ChangeMood(1);
$t70->ChangeMood(1);

echo$t1000->getBad();
echo"</br>";
echo $t1001->getGood();
















































?>