<?php

namespace Pingpp;

class Refund extends ApiResource
{
    /**
     * @return string The API URL for this Pingpp refund.
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $charge = $this['charge'];
        if (!$id) {
            throw new Error\InvalidRequest(
                "Could not determine which URL to request: " .
                "class instance has invalid ID: $id",
                null
            );
        }
        $id = ApiRequestor::utf8($id);
        $charge = ApiRequestor::utf8($charge);

        $base = Charge::classUrl();
        $chargeExtn = urlencode($charge);
        $extn = urlencode($id);
        return "$base/$chargeExtn/refunds/$extn";
    }

    /**
     * @param array|string|null $opts
     *
     * @return Refund The saved refund.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }
}