<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Media\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class MediaRecordingOptions {
    /**
     * @param string $order The sort order of the list
     * @param string $status Status to filter by
     * @param string $processorSid MediaProcessor to filter by
     * @param string $sourceSid Source SID to filter by
     * @return ReadMediaRecordingOptions Options builder
     */
    public static function read(string $order = Values::NONE, string $status = Values::NONE, string $processorSid = Values::NONE, string $sourceSid = Values::NONE): ReadMediaRecordingOptions {
        return new ReadMediaRecordingOptions($order, $status, $processorSid, $sourceSid);
    }
}

class ReadMediaRecordingOptions extends Options {
    /**
     * @param string $order The sort order of the list
     * @param string $status Status to filter by
     * @param string $processorSid MediaProcessor to filter by
     * @param string $sourceSid Source SID to filter by
     */
    public function __construct(string $order = Values::NONE, string $status = Values::NONE, string $processorSid = Values::NONE, string $sourceSid = Values::NONE) {
        $this->options['order'] = $order;
        $this->options['status'] = $status;
        $this->options['processorSid'] = $processorSid;
        $this->options['sourceSid'] = $sourceSid;
    }

    /**
     * The sort order of the list by `date_created`. Can be: `asc` (ascending) or `desc` (descending) with `desc` as the default.
     *
     * @param string $order The sort order of the list
     * @return $this Fluent Builder
     */
    public function setOrder(string $order): self {
        $this->options['order'] = $order;
        return $this;
    }

    /**
     * Status to filter by, with possible values `processing`, `completed`, `deleted`, or `failed`.
     *
     * @param string $status Status to filter by
     * @return $this Fluent Builder
     */
    public function setStatus(string $status): self {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * SID of a MediaProcessor to filter by.
     *
     * @param string $processorSid MediaProcessor to filter by
     * @return $this Fluent Builder
     */
    public function setProcessorSid(string $processorSid): self {
        $this->options['processorSid'] = $processorSid;
        return $this;
    }

    /**
     * SID of a MediaRecording source to filter by.
     *
     * @param string $sourceSid Source SID to filter by
     * @return $this Fluent Builder
     */
    public function setSourceSid(string $sourceSid): self {
        $this->options['sourceSid'] = $sourceSid;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Media.V1.ReadMediaRecordingOptions ' . $options . ']';
    }
}