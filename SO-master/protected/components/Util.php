<?php 

class Utils{
	public function isAdmin(){
		if(Yii::app()->user->isGuest)
			return false;
		else if(Yii::app()->user->roles == 'Admin')
			return true;
		else
			return false;
	}
	
	public function isUser(){
		if(Yii::app()->user->isGuest)
			return false;
		else if(Yii::app()->user->roles == 'User')
			return true;
		else
			return false;
	}
}

?>