<?php
namespace App\Http\Controllers;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Signer\Key;
class JWTAuth{

    /**
     *
     * @var
     */
    private $token;
    /**
     * 创建单例模式
     * @var
     */
    private static $instance;

    /**
     *
     * @var
     */
    private $decodetoken;

    /**
     * claim
     * @var string
     */
    private $iss = "http://www.a.com";

    /**
     * claim
     * @var string
     */
    private $aud = "http://www.b.com";

    /**
     * 用户的id
     * @var
     */
    private $uid;

    /**
     * 设置用户的id
     * @param $id
     * @return $this
     */
    public function setuid($id)
    {
        $this->uid = $id;

        return $this;
    }


    /**
     *
     * @return string
     */
    public function GetToken()
    {
        $token = (string)$this->token;
        return $token;
    }

    /**
     * 设置token
     * @param $token
     * @return $this
     */
    public function SetToken($token)
    {
        $this->token = $token;
        return $this;
    }
    

    /**
     * 设置加密的盐值
     * @var string
     */
    private $salt = "qwertyuiopasdfghjklzxcvbnmm85207419631";

    /**
     * 获取单例模式的句柄
     * @return JWTAuth
     */
    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**私有的构造方法
     * JWTAuth constructor.
     */
    private function __construct()
    {

    }

    /**
     * 私有的克隆方法
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * 加密
     * @return $this
     */
    public function encode()
    {
        $time = time();
        $this->token = (new Builder())->setIssuer($this->iss)//配置发行人（服务签发者）服务端
                                ->setAudience($this->aud)//签发给谁  客户端
                                ->set('uid',$this->uid)//设置用户的id
                                ->setIssuedAt($time)//设置创建时间
                                ->setExpiration($time + 3600)//设置过期时间
//                                ->identifiedBy($this->salt,true)//设置盐值
                                ->sign( new Sha256(),$this->salt)//设置盐值
                                ->getToken();
        return $this;
    }

    /**
     * 将token墙转化为字符串
     * @return \Lcobucci\JWT\Token
     */
    public function decode()
    {
        if(!$this->decodetoken){
           $this->decodetoken = (new parser())->parse((string)$this->token);
        }
        return $this->decodetoken;
    }

    /**
     * 验证token数据的有效性
     */
    public function validate()
    {
        $data = new ValidationData();
        $data->setIssuer($this->iss);
        $data->setAudience($this->aud);
        return $this->decode()->validate($data);
    }

    /**
     * 鉴权
     */
    public function verify()
    {
        $result = $this->decode()->verify(new Sha256(),$this->salt);
        return $result;
    }

}