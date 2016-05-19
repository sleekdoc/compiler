<?php
namespace Daison\Tests\Classes;

/**
 * @sleekdoc_init
 * @sleekdoc_category JSON
 * @sleekdoc_namespace /booking
 *
 * @description This handles the entire booking process, from creation until
 * the cancellation process
 */
class Sample1
{
    /**
     * @sleekdoc_init
     *
     * @method            POST
     * @route             /booking/create
     * @description       This is the description of /booking/create prefix
     * @headers            {
     *    "authorization": {
     *        "label": "Authorization",
     *        "value": ""
     *    }
     * }
     * @params            {
     *    "agree": {
     *        "name" : "agree",
     *        "type": "boolean",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "alias": {
     *        "name" : "alias",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "carCategoryCode": {
     *        "name" : "carCategoryCode",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "countryOfResidence": {
     *        "name" : "countryOfResidence",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "currencyCode": {
     *        "name" : "currencyCode",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "driverAge": {
     *        "name" : "driverAge",
     *        "type": "integer",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "email": {
     *        "name" : "email",
     *        "type": "string | email format",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "ipAddress": {
     *        "name" : "ipAddress",
     *        "type": "string | IP Address format",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "isTestBooking": {
     *        "name" : "isTestBooking",
     *        "type": "boolean",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "lastName": {
     *        "name" : "lastName",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "mileage": {
     *        "name" : "mileage",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "newsletter": {
     *        "name" : "newsletter",
     *        "type": "boolean",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "phoneNumber": {
     *        "name" : "phoneNumber",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "pickUpDate": {
     *        "name" : "pickUpDate",
     *        "type": "date",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "pickUpDepotCode": {
     *        "name" : "pickUpDepotCode",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "pickUpDepotID": {
     *        "name" : "pickUpDepotID",
     *        "type": "integer",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "pickUpTime": {
     *        "name" : "pickUpTime",
     *        "type": "time",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "rateID": {
     *        "name" : "rateID",
     *        "type": "integer",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "returnDate": {
     *        "name" : "returnDate",
     *        "type": "date",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "returnDepotCode": {
     *        "name" : "returnDepotCode",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "returnDepotID": {
     *        "name" : "returnDepotID",
     *        "type": "integer",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "returnTime": {
     *        "name" : "returnTime",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "supplierCode": {
     *        "name" : "supplierCode",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "title": {
     *        "name" : "title",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "totalCost": {
     *        "name" : "totalCost",
     *        "type": "double",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "vehicleDetails[airConditioned]": {
     *        "name" : "vehicleDetails[airConditioned]",
     *        "type": "boolean",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "vehicleDetails[transmissionType]": {
     *        "name" : "vehicleDetails[transmissionType]",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "vehicleDetails[vehicleCategoryID]": {
     *        "name" : "vehicleDetails[vehicleCategoryID]",
     *        "type": "integer",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "vehicleDetails[vehicleClassID]": {
     *        "name" : "vehicleDetails[vehicleClassID]",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "version": {
     *        "name" : "version",
     *        "type": "double",
     *        "is_required": true,
     *        "description": ""
     *    }
     * }
     * @request [
     *    "agree",
     *    "alias",
     *    "carCategoryCode",
     *    "countryOfResidence",
     *    "currencyCode",
     *    "driverAge",
     *    "email",
     *    "firstName",
     *    "ipAddress",
     *    "isTestBooking",
     *    "lastName",
     *    "mileage",
     *    "newsletter",
     *    "phoneNumber",
     *    "pickUpDate",
     *    "pickUpDepotCode",
     *    "pickUpDepotID",
     *    "pickUpTime",
     *    "rateID",
     *    "returnDate",
     *    "returnDepotCode",
     *    "returnDepotID",
     *    "returnTime",
     *    "supplierCode",
     *    "title",
     *    "totalCost",
     *    "vehicleDetails[airConditioned]",
     *    "vehicleDetails[transmissionType]",
     *    "vehicleDetails[vehicleCategoryID]",
     *    "vehicleDetails[vehicleClassID]"
     * ]
     */
    public function createAction()
    {
    }

    /**
     * @sleekdoc_init
     *
     * @method            GET
     * @route             /booking
     * @description       This is the description of /booking prefix
     * @headers            {
     *    "authorization": {
     *        "label": "Authorization",
     *        "value": ""
     *    }
     * }
     * @params            {
     *    "lastName": {
     *        "name" : "lastName",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "supplierConfirmation": {
     *        "name" : "supplierConfirmation",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "version": {
     *        "name" : "version",
     *        "type": "double",
     *        "is_required": true,
     *        "description": ""
     *    }
     * }
     * @request [
     *    "lastName",
     *    "supplierConfirmation",
     *    "version"
     * ]
     * @response  {"success": true, "message": "You have succesfully created a new booking."}
     */
    public function getAction()
    {
    }

    /**
     * @sleekdoc_init
     *
     * @method            DELETE
     * @route             /booking/cancel
     * @description       This is the description of /booking/cancel prefix
     * @headers            {
     *    "authorization": {
     *        "label": "Authorization",
     *        "value": ""
     *    }
     * }
     * @params            {
     *    "lastName": {
     *        "name" : "lastName",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "supplierConfirmation": {
     *        "name" : "supplierConfirmation",
     *        "type": "string",
     *        "is_required": true,
     *        "description": ""
     *    },
     *    "version": {
     *        "name" : "version",
     *        "type": "double",
     *        "is_required": true,
     *        "description": ""
     *    }
     * }
     * @request [
     *    "lastName",
     *    "supplierConfirmation",
     *    "version"
     * ]
     */
    public function cancelAction()
    {
    }
}
