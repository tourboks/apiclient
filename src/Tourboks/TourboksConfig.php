<?php

namespace Tourboks;
use Spyc;
use Tourboks\Exceptions\TourboksSDKException;

class TourboksConfig
{
    /**
     * @const string Version number of the Tourboks PHP SDK.
     */
    const VERSION = '1.0.0';

    /**
     * @const string Default API version for requests.
     */
    const DEFAULT_API_VERSION = 'v1.04';

    const MEMBER_USERNAME_ENV_NAME = 'TOURBOKS_MEMBER_USERNAME';

    const MEMBER_PASSWORD_ENV_NAME = 'TOURBOKS_MEMBER_PASSWORD';

    const ENVIRONMENT_STAGING = 'STAGING';

    const ENVIRONMENT_LIVE = 'LIVE';

    protected $memberUsername;
    protected $memberPassword;
    protected $environment;

    public function __construct(array $config = [])
    {
        $config = array_merge([
            'member_username' => getenv(static::MEMBER_USERNAME_ENV_NAME),
            'member_password' => getenv(static::MEMBER_PASSWORD_ENV_NAME),
            'environment' => getenv(static::MEMBER_PASSWORD_ENV_NAME),
        ], $config);

        if (!$config['member_username']) {
            throw new TourboksSDKException('Required "member_username" key not supplied could not find fallback environment variable "' . static::MEMBER_USERNAME_ENV_NAME . '"');
        }
        if (!$config['member_password']) {
            throw new TourboksSDKException('Required "member_password" key not supplied could not find fallback environment variable "' . static::MEMBER_PASSWORD_ENV_NAME . '"');
        }
        if (!$config['environment']) {
            throw new TourboksSDKException('Required "environment" key not supplied could not find fallback environment variable "' . static::MEMBER_PASSWORD_ENV_NAME . '"');
        }
        $this->setMemberCredentials($config['member_username'], $config['member_password']);
        $this->setEnvironment($config['environment']);
    }
    
    public function setMemberCredentials($memberUsername, $memberPassword)
    {
        $this->memberUsername = $memberUsername;
        $this->memberPassword = $memberPassword;
    }

    public function getMemberCredentials()
    {
        return ['member_username' => $this->memberUsername, 'member_password' => $this->memberPassword];
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param mixed $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

}