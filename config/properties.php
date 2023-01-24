<?php

$my_config = array(
    'api' => "http://35.240.207.130/api/",
    'cifbody' => '{
        "advancedSearch": {
          "fields": [
          ],
          "keyword": ""
        },
        "keyword": "",
        "pageNumber": 0,
        "pageSize": 100,
        "orderBy": [
          "createdOn DESC"
        ],
        "cifId": "",
        "transactionDateFrom": "",
        "transactionDateTo": "",
        "status": 1000
      }',
    'savingbody' => '{
      "advancedSearch": {
        "fields": [
        ],
        "keyword": ""
      },
      "keyword": "",
      "pageNumber": 0,
      "pageSize": 100,
      "orderBy": [
        "createdOn DESC"
      ],
      "branchId": "",
      "accountNumber": "",
      "savingAccountType": "",
      "savingProductId": "8cbf60d6-ea1c-4fbc-bde5-0449d183bf02"
    }',
);
return $my_config; 