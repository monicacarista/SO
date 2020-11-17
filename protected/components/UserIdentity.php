<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
//	public $userType = 'Front';
//private $_id;

private $id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	  {
		// $users=array(
		// 	// username => password
		// 	'demo'=>'demo',
		// 	'admin'=>'admin',
		// );
		// $user=User::model()->findByAttributes(array('username'=>$this->username));

		// if($user===null)
		//    $this->errorCode=self::ERROR_USERNAME_INVALID;
		// elseif($user->password !== $this->password)
		//    $this->errorCode=self::ERROR_PASSWORD_INVALID;
		// else {
		//    #Call with Yii::app()->user->id
		//    $this->_id=$user->id;
	
		//    $this->errorCode=self::ERROR_NONE;
		// }
		// return !$this->errorCode;
		
	 //   $record=User::model()->findByAttributes(array('email'=>$this->username));
	 
	//  $record=User::model()->findByAttributes(array("username"=>$this->username));
    //     if($record===null)
    //         $this->errorCode=self::ERROR_USERNAME_INVALID;
    //     else if($record->password!==md5($this->password))
    //         $this->errorCode=self::ERROR_PASSWORD_INVALID;
    //     else
    //     {
	// 		$this->setState("id", $user->id);
	// 		$this->setState("first_name", $user->first_name);
	// 		$this->setState("last_name", $user->last_name);
	// 		$this->setState("roles", $user->roles);
	// 		$user->save();
    //     }
	// 	return !$this->errorCode;
		
		$user=User::model()->findByAttributes(array("username"=>$this->username));
	if(!isset($user))
		$this->errorCode=self::ERROR_USERNAME_INVALID;
			else if($this->password != $user->password)//You should salt your password using CPasswordHelper
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
	else{
		$this->errorCode=self::ERROR_NONE;

					$this->setState("id", $user->id);
					$this->setState("first_name", $user->first_name);
					$this->setState("last_name", $user->last_name);
					$this->setState("roles", $user->roles);
					$user->save();
			}
	return !$this->errorCode;

	 }
	
	//  public function getId()
	//  {
	// 	return $this->_id;
	//  }
	
	
	
		// $user=User::model()->findByAttributes(array("username"=>$this->username));
	// if(!isset($user))
	// 	$this->errorCode=self::ERROR_USERNAME_INVALID;
	// 		else if($this->password != $user->password)//You should salt your password using CPasswordHelper
	// 			$this->errorCode=self::ERROR_PASSWORD_INVALID;
	// else{
	// 	$this->errorCode=self::ERROR_NONE;

	// 				$this->setState("id", $user->id);
	// 				$this->setState("first_name", $user->first_name);
	// 				$this->setState("last_name", $user->last_name);
	// 				$this->setState("role", $user->role);
	// 				$user->save();
	// 		}
	// return !$this->errorCode;
//}
		
	
}


