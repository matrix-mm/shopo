<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $segmentId
 * @property string $externalId
 * @property string $queue
 * @property string $externalContact
 * @property string $externalSegmentLinkId
 * @property string $date
 * @property string $accountId
 * @property string $externalSegmentLink
 * @property string $agentId
 * @property string $agentPhone
 * @property string $agentName
 * @property string $agentTeamName
 * @property string $agentTeamNameInHierarchy
 * @property string $agentLink
 * @property string $customerPhone
 * @property string $customerName
 * @property string $customerLink
 * @property string $segmentRecordingOffset
 * @property array $media
 * @property array $assessmentType
 * @property array $assessmentPercentage
 * @property string $url
 */
class InsightsSegmentsInstance extends InstanceResource {
    /**
     * Initialize the InsightsSegmentsInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $segmentId Unique segment Id
     */
    public function __construct(Version $version, array $payload, string $segmentId = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'segmentId' => Values::array_get($payload, 'segment_id'),
            'externalId' => Values::array_get($payload, 'external_id'),
            'queue' => Values::array_get($payload, 'queue'),
            'externalContact' => Values::array_get($payload, 'external_contact'),
            'externalSegmentLinkId' => Values::array_get($payload, 'external_segment_link_id'),
            'date' => Values::array_get($payload, 'date'),
            'accountId' => Values::array_get($payload, 'account_id'),
            'externalSegmentLink' => Values::array_get($payload, 'external_segment_link'),
            'agentId' => Values::array_get($payload, 'agent_id'),
            'agentPhone' => Values::array_get($payload, 'agent_phone'),
            'agentName' => Values::array_get($payload, 'agent_name'),
            'agentTeamName' => Values::array_get($payload, 'agent_team_name'),
            'agentTeamNameInHierarchy' => Values::array_get($payload, 'agent_team_name_in_hierarchy'),
            'agentLink' => Values::array_get($payload, 'agent_link'),
            'customerPhone' => Values::array_get($payload, 'customer_phone'),
            'customerName' => Values::array_get($payload, 'customer_name'),
            'customerLink' => Values::array_get($payload, 'customer_link'),
            'segmentRecordingOffset' => Values::array_get($payload, 'segment_recording_offset'),
            'media' => Values::array_get($payload, 'media'),
            'assessmentType' => Values::array_get($payload, 'assessment_type'),
            'assessmentPercentage' => Values::array_get($payload, 'assessment_percentage'),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = ['segmentId' => $segmentId ?: $this->properties['segmentId'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return InsightsSegmentsContext Context for this InsightsSegmentsInstance
     */
    protected function proxy(): InsightsSegmentsContext {
        if (!$this->context) {
            $this->context = new InsightsSegmentsContext($this->version, $this->solution['segmentId']);
        }

        return $this->context;
    }

    /**
     * Fetch the InsightsSegmentsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return InsightsSegmentsInstance Fetched InsightsSegmentsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []): InsightsSegmentsInstance {
        return $this->proxy()->fetch($options);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.FlexApi.V1.InsightsSegmentsInstance ' . \implode(' ', $context) . ']';
    }
}