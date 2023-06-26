<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Sync\Service\SyncMap;

use Twilio\ListResource;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class SyncMapPermissionList extends ListResource {
    /**
     * Construct the SyncMapPermissionList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid Sync Service Instance SID.
     * @param string $mapSid Sync Map SID.
     */
    public function __construct(Version $version, string $serviceSid, string $mapSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'mapSid' => $mapSid, ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Maps/' . \rawurlencode($mapSid) . '/Permissions';
    }

    /**
     * Streams SyncMapPermissionInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(int $limit = null, $pageSize = null): Stream {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads SyncMapPermissionInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return SyncMapPermissionInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null): array {
        return \iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of SyncMapPermissionInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return SyncMapPermissionPage Page of SyncMapPermissionInstance
     */
    public function page($pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE): SyncMapPermissionPage {
        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize, ]);

        $response = $this->version->page('GET', $this->uri, $params);

        return new SyncMapPermissionPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of SyncMapPermissionInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return SyncMapPermissionPage Page of SyncMapPermissionInstance
     */
    public function getPage(string $targetUrl): SyncMapPermissionPage {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new SyncMapPermissionPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a SyncMapPermissionContext
     *
     * @param string $identity Identity of the user to whom the Sync Map Permission
     *                         applies.
     */
    public function getContext(string $identity): SyncMapPermissionContext {
        return new SyncMapPermissionContext(
            $this->version,
            $this->solution['serviceSid'],
            $this->solution['mapSid'],
            $identity
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Preview.Sync.SyncMapPermissionList]';
    }
}