<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Content\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\ListResource;
use Twilio\Rest\Content\V1\Content\ApprovalFetchList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property ApprovalFetchList $approvalFetch
 * @method \Twilio\Rest\Content\V1\Content\ApprovalFetchContext approvalFetch()
 */
class ContentContext extends InstanceContext {
    protected $_approvalFetch;

    /**
     * Initialize the ContentContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the resource
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['sid' => $sid, ];

        $this->uri = '/Content/' . \rawurlencode($sid) . '';
    }

    /**
     * Fetch the ContentInstance
     *
     * @return ContentInstance Fetched ContentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ContentInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new ContentInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Delete the ContentInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('DELETE', $this->uri);
    }

    /**
     * Access the approvalFetch
     */
    protected function getApprovalFetch(): ApprovalFetchList {
        if (!$this->_approvalFetch) {
            $this->_approvalFetch = new ApprovalFetchList($this->version, $this->solution['sid']);
        }

        return $this->_approvalFetch;
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
        return '[Twilio.Content.V1.ContentContext ' . \implode(' ', $context) . ']';
    }
}