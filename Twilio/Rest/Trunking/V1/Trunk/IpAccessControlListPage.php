<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Page;
use Twilio\Values;

class IpAccessControlListPage extends Page {
    public function __construct($version, $response, $solution) {
        parent::__construct($version, $response);
        
        // Path Solution
        $this->solution = $solution;
    }

    /**
     * Create a new IpAccessControlListInstance
     * 
     * @param string $ipAccessControlListSid The ip_access_control_list_sid
     * @return IpAccessControlListInstance Newly created IpAccessControlListInstance
     */
    public function create($ipAccessControlListSid) {
        $data = Values::of(array(
            'IpAccessControlListSid' => $ipAccessControlListSid,
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new IpAccessControlListInstance(
            $this->version,
            $payload,
            $this->solution['trunkSid']
        );
    }

    /**
     * Streams IpAccessControlListInstance records from the API as a generator
     * stream.
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
     *                        will use
     *                        the default value of 50 records.  If no page_size is
     *                        defined
     *                        but a limit is defined, stream() will attempt to read
     *                        the limit
     *                        with the most efficient page size, i.e. min(limit,
     *                        1000)
     * @return \Twilio\Stream stream of results
     */
    public function stream($limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);
        
        $page = $this->page($limits['pageSize']);
        
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads IpAccessControlListInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     * 
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use
     *                        the default value of 50 records.  If no page_size is
     *                        defined
     *                        but a limit is defined, read() will attempt to read
     *                        the
     *                        limit with the most efficient page size, i.e.
     *                        min(limit, 1000)
     * @return IpAccessControlListInstance[] Array of results
     */
    public function read($limit = null, $pageSize = Values::NONE) {
        return iterator_to_array($this->stream($limit, $pageSize));
    }

    /**
     * Retrieve a single page of IpAccessControlListInstance records from the API.
     * Request is executed immediately
     * 
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of IpAccessControlListInstance
     */
    public function page($pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $params = Values::of(array(
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));
        
        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );
        
        return new IpAccessControlListPage($this->version, $response, $this->solution);
    }

    public function buildInstance(array $payload) {
        return new IpAccessControlListInstance(
            $this->version,
            $payload,
            $this->solution['trunkSid']
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Trunking.V1.IpAccessControlListPage]';
    }
}