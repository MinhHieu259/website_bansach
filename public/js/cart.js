/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
var cartTbody = document.getElementById('cartTbody');
function render() {
  var listTable = orderItems.map(function (item) {
    return "\n           <!-- Product Row -->\n                    <tr>\n                        <td class=\"pro-remove\"><button type=\"button\" onclick=\"handleRemoveItem(".concat(item['id'], ")\"><i class=\"far fa-trash-alt\"></i></button></a>\n                        </td>\n                        <td class=\"pro-thumbnail\"><a href=\"#\"><img\n                            src=\"/uploads/").concat(item['book']['book_avatar'], "\" alt=\"Product\"></a></td>\n                        <td class=\"pro-title\"><a href=\"#\">").concat(item['book']['title'], "</a></td>\n                        <td class=\"pro-price\"><span>").concat(item['price'], "</span></td>\n                        <td class=\"pro-quantity\">\n                            <div class=\"pro-qty\">\n                                <div class=\"count-input-block\">\n                                    <input type=\"number\"\n                                           class=\"form-control text-center\"\n                                           name=\"\"\n                                           onchange=\"handleChangerQuantity(this, ").concat(item['id'], ")\"\n                                           value=\"").concat(item['quantity'], "\">\n                                </div>\n                            </div>\n                        </td>\n                        <td class=\"pro-subtotal\"><span>").concat(item['price'] * item['quantity'], "</span></td>\n                    </tr>\n    ");
  });
  cartTbody.innerHTML = listTable.join(' ') + cartTbody.innerHTML;
}
render();
function handleChangerQuantity(value, id) {
  console.log(id);
}
function handleRemoveItem(id) {
  console.log(id);
}
/******/ })()
;