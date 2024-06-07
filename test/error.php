XHRPOST
http://localhost/apps/ultimate-paypal-integration/async/capture_order.php
[HTTP/1.1 500 Internal Server Error 4294ms]

SyntaxError: JSON.parse: unexpected non-whitespace character after JSON data at line 1 column 491 of the JSON data

1

{"name":"INVALID_REQUEST","message":"Request is not well-formed, syntactically incorrect, or violates schema.","debug_id":"2224f58a788b7","details":[{"field":"/purchase_units/@reference_id=='default'/amount","value":"","location":"body","issue":"MISSING_REQUIRED_PARAMETER","description":"A required field / parameter is missing."}],"links":[{"href":"https://developer.paypal.com/docs/api/orders/v2/#error-MISSING_REQUIRED_PARAMETER","rel":"information_link","encType":"application/json"}]}{"error":"Unable to create order"}


    XHRPOST
http://localhost/apps/ultimate-paypal-integration/async/capture_order.php
[HTTP/1.1 500 Internal Server Error 5347ms]

SyntaxError: JSON.parse: unexpected character at line 1 column 1 of the JSON data

 
1

<br />

2

<b>Warning</b>:  Undefined property: stdClass::$id in <b>C:\xampp\htdocs\apps\ultimate-paypal-integration\async\capture_order.php</b> on line <b>84</b><br />

3

{"name":"UNPROCESSABLE_ENTITY","details":[{"field":"/purchase_units/@reference_id=='default'/amount/breakdown/item_total","location":"body","issue":"ITEM_TOTAL_REQUIRED","description":"If item details are specified (items.unit_amount and items.quantity) corresponding amount.breakdown.item_total is required."}],"message":"The requested action could not be performed, semantically incorrect, or failed business validation.","debug_id":"d70d244bac094","links":[{"href":"https://developer.paypal.com/docs/api/orders/v2/#error-ITEM_TOTAL_REQUIRED","rel":"information_link","method":"GET"}]}{"error":"Unable to create order"}

