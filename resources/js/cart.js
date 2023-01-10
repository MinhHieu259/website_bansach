let cartTbody = document.getElementById('cartTbody');
function render() {
    let listTable = orderItems.map(item => {
        return `
           <!-- Product Row -->
                    <tr>
                        <td class="pro-remove"><button type="button" onclick="handleRemoveItem(${item['id']})"><i class="far fa-trash-alt"></i></button></a>
                        </td>
                        <td class="pro-thumbnail"><a href="#"><img
                            src="/uploads/${item['book']['book_avatar']}" alt="Product"></a></td>
                        <td class="pro-title"><a href="#">${item['book']['title']}</a></td>
                        <td class="pro-price"><span>${item['price']}</span></td>
                        <td class="pro-quantity">
                            <div class="pro-qty">
                                <div class="count-input-block">
                                    <input type="number"
                                           class="form-control text-center"
                                           name=""
                                           onchange="handleChangerQuantity(this, ${item['id']})"
                                           value="${item['quantity']}">
                                </div>
                            </div>
                        </td>
                        <td class="pro-subtotal"><span>${item['price'] * item['quantity']}</span></td>
                    </tr>
    `
    })
    cartTbody.innerHTML = listTable.join(' ') + cartTbody.innerHTML;
}
render();

function handleChangerQuantity(value, id) {
    console.log(id);
}

function handleRemoveItem(id) {
    console.log(id);
}

