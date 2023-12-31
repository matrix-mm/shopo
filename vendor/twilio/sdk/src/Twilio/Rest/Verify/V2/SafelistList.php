<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class SafelistList extends ListResource {
    /**
     * Construct the SafelistList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [];

        $this->uri = '/SafeList/Numbers';
    }

    /**
     * Create the SafelistInstance
     *
     * @param string $phoneNumber The phone number to be added in SafeList.
     * @return SafelistInstance Created SafelistInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $phoneNumber): SafelistInstance {
        $data = Values::of(['PhoneNumber' => $phoneNumber, ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new SafelistInstance($this->version, $payload);
    }

    /**
     * Constructs a SafelistContext
     *
     * @param string $phoneNumber The phone number to be fetched from SafeList.
     */
    public function getContext(string $phoneNumber): SafelistContext {
        return new SafelistContext($this->version, $phoneNumber);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Verify.V2.SafelistList]';
    }
}