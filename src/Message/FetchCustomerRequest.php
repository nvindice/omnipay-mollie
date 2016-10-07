<?php

/**
 * Mollie Fetch Customer Request.
 *
 * URL: https://www.mollie.com/en/docs/reference/customers/get
 */
namespace Omnipay\Mollie\Message;

class FetchCustomerRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getCustomerReference()
    {
        return $this->getParameter('customerReference');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setCustomerReference($value)
    {
        return $this->setParameter('customerReference', $value);
    }

    /**
     * Get the customer's email address.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->getParameter('locale');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setLocale($value)
    {
        return $this->setParameter('locale', $value);
    }

    /**
     * @return string
     */
    public function getMetadata()
    {
        return $this->getParameter('metadata');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setMetadata($value)
    {
        return $this->setParameter('metadata', $value);
    }

    /**
     * @return array
     */
    public function getData()
    {
        $this->validate('apiKey', 'customerReference');

        return array();
    }

    /**
     * @param mixed $data
     * @return FetchCustomerResponse
     */
    public function sendData($data)
    {
        $httpResponse = $this->sendRequest('GET', '/customers/' . $this->getCustomerReference(), $data);

        return $this->response = new FetchCustomerResponse($this, $httpResponse->json());
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint.'/customers';
    }
}
