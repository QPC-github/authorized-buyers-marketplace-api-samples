#!/usr/bin/python
#
# Copyright 2022 Google LLC
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     https://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

"""Sample application that authenticates and makes an API request."""

import pprint
from googleapiclient.discovery import build
from google.oauth2 import service_account

# A Service Account key file can be generated via the Google Developers
# Console.
KEY_FILE = 'PATH_TO_JSON_KEY_FILE'  # Path to Service Account JSON key file.

# Authorized Buyers Marketplace API authorization scope.
SCOPE = 'https://www.googleapis.com/auth/authorized-buyers-marketplace'
VERSION = 'v1'  # Version of Authorized Buyers Marketplace API to use.

# Name of the buyer resource for which the API call is being made.
BUYER_NAME = 'BUYER_RESOURCE_NAME'


def main():
  # Create credentials using the Service Account JSON key file.
  credentials = service_account.Credentials.from_service_account_file(
      KEY_FILE, scopes=[SCOPE])

  # Build a client for the authorizedbuyersmarketplace API service.
  marketplace = build('authorizedbuyersmarketplace', VERSION, credentials=credentials)

  # Call the buyers.clients.list method to get a list of clients for the
  # given buyer.
  request = marketplace.buyers().clients().list(parent=BUYER_NAME)

  pprint.pprint(request.execute())


if __name__ == '__main__':
  main()

