<?php

/**
 * Copyright 2022 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Ads\AuthorizedBuyers\Marketplace\Examples\V1\Buyers_FinalizedDeals;

use Google\Ads\AuthorizedBuyers\Marketplace\ExampleUtil\BaseExample;
use Google\Ads\AuthorizedBuyers\Marketplace\ExampleUtil\Config;
use Google\Service\AuthorizedBuyersMarketplace\PauseFinalizedDealRequest;
use Google\Service\Exception as GoogleServiceException;

/**
 * This example illustrates how to pause serving of a given finalized deal.
 *
 * Note that only programmatic guaranteed deals can be paused by buyers at this time.
 */
class PauseFinalizedDeals extends BaseExample
{
    public function __construct($client)
    {
        $this->service = Config::getGoogleServiceAuthorizedBuyersMarketplace($client);
    }

    /**
     * @see BaseExample::getInputParameters()
     */
    protected function getInputParameters()
    {
        return [
            [
                'name' => 'account_id',
                'display' => 'Account ID',
                'description' =>
                    'The resource ID of the buyers resource for which the finalized deal is ' .
                    'being paused. This will be used to construct the name used as a path ' .
                    'parameter for the finalizedDeals.pause request.',
                'required' => true
            ],
            [
                'name' => 'deal_id',
                'display' => 'Deal ID',
                'description' =>
                    'The resource ID of the buyers.finalizedDeals resource that is being ' .
                    'paused. This will be used to construct the name used as a path ' .
                    'parameter for the finalizedDeals.pause request.',
                'required' => true
            ]
        ];
    }

    /**
     * @see BaseExample::run()
     */
    public function run()
    {
        $values = $this->formValues;

        $name = "buyers/$values[account_id]/finalizedDeals/$values[deal_id]";

        print "<h2>Pausing finalized deal with name: '$name':</h2>";
        $result = $this->service->buyers_finalizedDeals->pause(
            $name,
            new PauseFinalizedDealRequest()
        );
        $this->printResult($result);
    }

    /**
     * @see BaseExample::getName()
     */
    public function getName()
    {
        return 'Pause Finalized Deal';
    }
}
