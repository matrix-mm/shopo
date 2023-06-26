<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Studio\V1;
use Twilio\Rest\Studio\V2;

/**
 * @property \Twilio\Rest\Studio\V1 $v1
 * @property \Twilio\Rest\Studio\V2 $v2
 * @property \Twilio\Rest\Studio\V2\FlowList $flows
 * @property \Twilio\Rest\Studio\V2\FlowValidateList $flowValidate
 * @method \Twilio\Rest\Studio\V2\FlowContext flows(string $sid)
 */
class Studio extends Domain {
    protected $_v1;
    protected $_v2;

    /**
     * Construct the Studio Domain
     *
     * @param Client $client Client to communicate with Twilio
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://studio.twilio.com';
    }

    /**
     * @return V1 Version v1 of studio
     */
    protected function getV1(): V1 {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }

    /**
     * @return V2 Version v2 of studio
     */
    protected function getV2(): V2 {
        if (!$this->_v2) {
            $this->_v2 = new V2($this);
        }
        return $this->_v2;
    }

    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get(string $name) {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown version ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) {
        $method = 'context' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return \call_user_func_array([$this, $method], $arguments);
        }

        throw new TwilioException('Unknown context ' . $name);
    }

    protected function getFlows(): \Twilio\Rest\Studio\V2\FlowList {
        return $this->v2->flows;
    }

    /**
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextFlows(string $sid): \Twilio\Rest\Studio\V2\FlowContext {
        return $this->v2->flows($sid);
    }

    protected function getFlowValidate(): \Twilio\Rest\Studio\V2\FlowValidateList {
        return $this->v2->flowValidate;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Studio]';
    }
}