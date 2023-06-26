<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\ListResource;
use Twilio\Version;

class WorkspaceRealTimeStatisticsList extends ListResource {
    /**
     * Construct the WorkspaceRealTimeStatisticsList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace
     */
    public function __construct(Version $version, string $workspaceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['workspaceSid' => $workspaceSid, ];
    }

    /**
     * Constructs a WorkspaceRealTimeStatisticsContext
     */
    public function getContext(): WorkspaceRealTimeStatisticsContext {
        return new WorkspaceRealTimeStatisticsContext($this->version, $this->solution['workspaceSid']);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Taskrouter.V1.WorkspaceRealTimeStatisticsList]';
    }
}