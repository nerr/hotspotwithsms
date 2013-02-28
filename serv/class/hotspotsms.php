<?php
/**
 * Hotspot auth with SMS
 *
 * @author leon@nerrsoft.com
 * @version 0.0.1
 */
class hotspotsms
{
	/**
     * 发送短信手机号
     * @var string
     */
    protected $_mobile;

    /**
     * 发送短信密码
     * @var string
     */
    protected $_password;

    /**
     * 发送失败重试次数
     * @var string
     */
    protected $_trytime;


	/**
	* 构造函数
	* @param array $cfg 配置参数
	*/
	public function __construct($cfg)
	{
		$this->_mobile   = $cfg['smsAccount'];
		$this->_password = $cfg['smsPassword'];
		$this->_trytime  = $cfg['smsTrytime'];
	}

	public function step1()
	{
		$logtime = time();
		$mobile  = $_POST['mobile'];

		//-- 确认库中是否存在有效验证码 - 
		//"select smspass from table where mobile=$mobile and logtime+600>$logtime order by logtime desc limit 1 ";
		if()
		{
			$smspass = $result['smspass'];
			//-- insert log 2 db
		}
		else
		{
			$smspass = $this->getRandCode();	
		}
		

		//

		if($this->sendSms($mobile, $smspass))
		{
			$back['status'] = true;
		}
		else
		{
			$back['status'] = false;
			$back['message'] = '短信发送失败,请确认您的手机号码后重新点击<获取>按钮';
		}
	}

    /**
	 * 向指定手机号码发送验证码
	 * @param string $mobile
	 * @param string $msg
	 */
	protected function sendSms($mobile, $msg)
	{
		$fetion = new PHPFetion($this->_mobile, $this->_password);
		try
		{
			$result = $fetion->send($mobile, $msg);
			$count = 0;
			while(!check_status($result) && $count < $this->_trytime )
			{
				$count++;
				sleep(2);
				//echo "Sleep 2s, Re Send\n";
				$result = $result = $fetion->send($mobile, $msg);
			}
			if ($count != ($this->_trytime - 1))
			{
				//echo "Date:".date('Y-m-d H:i:s', time()).";Finished\n";
				return true;
			}
			else
			{
				//echo "Date:".date('Y-m-d H:i:s', time()).";Failed\n";
				return false;
			}
		}
		catch( Exception $e)
		{
			//echo "Date:".date('Y-m-d H:i:s', time()).";ERROR:".$e."\n";
			return false;
		}
	}

	/**
	 * 检测短信发送状态
	 * @param string $status_code
	 */
	protected function checkStatus($status_code)
	{
		preg_match('/^.*HTTP\/1\.1 200 OK.*$/si', $status_code, $status);
		if(isset($status[0]))
			return true;
		else
		{
			//echo "Result:$status_code\n";
			return false;
		}
	}

	/**
	 * 生成随机码
	 * @param string $digits = 6; 随机码位数
	 */
	protected function getRandCode($digits = 6)
	{
		$code = '';
		for($i = 0; $i < $bit; $i++)
		{
			$code .= rand(0,9);
		}
		return $code;
	}
}