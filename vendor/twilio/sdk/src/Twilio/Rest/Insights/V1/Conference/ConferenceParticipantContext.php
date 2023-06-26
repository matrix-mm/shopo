<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Insights\V1\Conference;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class ConferenceParticipantContext extends InstanceContext {
    /**
     * Initialize the ConferenceParticipantContext
     *
     * @param Version $version Version that contains the resource
     * @param string $conferenceSid Conference SID.
     * @param string $participantSid Participant SID.
     */
    public function __construct(Version $version, $conferenceSid, $participantSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['conferenceSid' => $conferenceSid, 'participantSid' => $participantSid, ];

        $this->uri = '/Conferences/' . \rawurlencode($conferenceSid) . '/Participants/' . \rawurlencode($participantSid) . '';
    }

    /**
     * Fetch the ConferenceParticipantInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ConferenceParticipantInstance Fetched ConferenceParticipantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []): ConferenceParticipantInstance {
        $options = new Values($options);

        $params = Values::of(['Events' => $options['events'], 'Metrics' => $options['metrics'], ]);

        $payload = $this->version->fetch('GET', $this->uri, $params);

        return new ConferenceParticipantInstance(
            $this->version,
            $payload,
            $this->solution['conferenceSid'],
            $this->solution['participantSid']
        );
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
        return '[Twilio.Insights.V1.ConferenceParticipantContext ' . \implode(' ', $context) . ']';
    }
}