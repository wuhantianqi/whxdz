<?php
/**
 * Copy	Right Anhuike.com
 * $Id check.mdl.php shzhrui<anhuike@gmail.com>
 */

class Mdl_Verify_Check
{
	

	public static function mail($mail)
	{
		return strlen($mail)>6 && preg_match("/^[\w\-\.]+@[\w\-\.]+[\.\w]{2,}$/", $mail);
	}

	public static function phone($phone)
	{
		return preg_match("/^(1[3,5,8,7]{1}[\d]{9})|(((400)-?(\d{3})-?(\d{4}))|^((\d{7,8})|(\d{4}|\d{3})-?(\d{7,8})|(\d{4}|\d{3})-(\d{3,7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)$/", $phone);
		//return preg_match("/^(0?(([1-9]\d)|([3-9]\d{2}))-?)?\d{7,8}$/", $phone);
	}

	public static function mobile($mobile)
	{
		return preg_match("/^1[3-8]\d{9}$/", $mobile);
	}

	public static function number($number)
	{
		return is_numeric($number);
	}

	public static function ids($ids)
	{
		if(is_array($ids)){
			$ids = implode(',', $ids);
		}
		if(preg_match("/^(\d+|(\d([\d,]+?)\d))$/",$ids)){
			return $ids;
		}
		return false;
	}

    public static function url($url)
    {
        
    }

    public static function qq($qq)
    {
    	return preg_match('/^\d{5,10}$/', $qq);
    }

    public static function len($len, $min=null, $max=null)
    {
        if($min !== null && $len < $min){
            return false;
        }else if($max !== null && $len > $max){
            return false;
        }
        return true;
    }
}