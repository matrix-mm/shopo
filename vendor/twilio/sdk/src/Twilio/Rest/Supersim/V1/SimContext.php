<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Supersim\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Rest\Supersim\V1\Sim\BillingPeriodList;
use Twilio\Rest\Supersim\V1\Sim\SimIpAddressList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property BillingPeriodList $billingPeriods
 * @property SimIpAddressList $simIpAddresses
 */
class SimContext extends InstanceContext {
    protected $_billingPeriods;
    protected $_simIpAddresses;

    /**
     * Initialize the SimContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID that identifies the resource to fetch
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['sid' => $sid, ];

        $this->uri = '/Sims/' . \rawurlencode($sid) . '';
    }

    /**
     * Fetch the SimInstance
     *
     * @return SimInstance Fetched SimInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): SimInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new SimInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the SimInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SimInstance Updated SimInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): SimInstance {
        $options = new Values($options);

        $data = Values::of([
            'UniqueName' => $options['uniqueName'],
            'Status' => $options['status'],
            'Fleet' => $options['fleet'],
            'CallbackUrl' => $options['callbackUrl'],
            'CallbackMethod' => $options['callbackMethod'],
            'AccountSid' => $options['accountSid'],
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new SimInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Access the billingPeriods
     */
    protected function getBillingPeriods(): BillingPeriodList {
        if (!$this->_billingPeriods) {
            $this->_billingPeriods = new BillingPeriodList($this->version, $this->solution['sid']);
        }

        return $this->_billingPeriods;
    }

    /**
     * Access the simIpAddresses
     */
    protected function getSimIpAddresses(): SimIpAddressList {
        if (!$this->_simIpAddresses) {
            $this->_simIpAddresses = new SimIpAddressList($this->version, $this->solution['sid']);
        }

        return $this->_simIpAddresses;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name): ListResource {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Supersim.V1.SimContext ' . \implode(' ', $context) . ']';
    }
}