<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

  // Store model to not repeat query.
  private $_model;

  // Return first name.
  // access it by Yii::app()->user->first_name
  function getFirst_Name(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->first_name;
  }

  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()

  public function isGuest()
  {
    return $this->getState('__id')===null;
  }
  public function isAdmin()

        {

                // When Users are implemented, change this to check roles.

                return ( $this->getName() == 'admin' );

        }
  // Load user model.
  protected function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null)
				$this->_model=User::model()->findByPk($id);
		}
		return $this->_model;
  }
  
  public function checkAccess($operation, $params=array(),$allowCaching=true)
	{
		if (empty($this->id)) {
			// Not identified => no rights
			return false;
		}
		$role = $this->getState("roles");
		if ($role === 'admin') {
			return true; // admin role has access to everything
		}
		// allow access if the operation request is the current user's role
		return ($operation === $role);
  }
  
  
}
?>