<?php

namespace KevinEm\LimeLightCRM\v2;

class Prospects extends AbstractService
{
    public function getProspectCustomFields(): array
    {
        return $this->makeRequest('/api/v2/custom_fields/prospects', [], 'GET');
    }

    /**
     * @param string $prospectId
     * @param array  $values Keys of field ID, values of new value: [256 => 'new value']
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addCustomFieldValues(string $prospectId, array $values): array
    {
        $url = sprintf('/api/v2/prospects/%s/custom_fields', $prospectId);

        return $this->makeRequest($url, $this->convertToCustomFieldsArray($values), 'POST');
    }

    /**
     * @param string $prospectId
     * @param array  $values Keys of field ID, values of new value: [256 => 'new value']
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateCustomFieldValues(string $prospectId, array $values): array
    {
        $url = sprintf('/api/v2/prospects/%s/custom_fields', $prospectId);

        return $this->makeRequest($url, $this->convertToCustomFieldsArray($values), 'PUT');
    }

    public function deleteCustomFieldValues(string $prospectId, int $customFieldId): array
    {
        $url = sprintf('/api/v2/prospects/%s/custom_fields/%s', $prospectId, $customFieldId);

        return $this->makeRequest($url, [], 'DELETE');
    }

    /**
     * Restructures array from
     *
     * [256 => 'new value']
     *
     * to
     *
     * ['custom_fields' => [['id' => 256, 'value' => 'new value']]]
     *
     * @param array $values
     * @return array
     */
    protected function convertToCustomFieldsArray(array $values): array
    {
        // Restructure array per API definition
        $data = [
            'custom_fields' => []
        ];

        foreach ($values as $key => $value) {
            $data['custom_fields'][] = [
                'id'    => $key,
                'value' => $value
            ];
        }

        return $data;
    }
}
