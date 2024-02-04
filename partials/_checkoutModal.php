<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalTitle">Enter Your Details:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="checkoutForm" action="partials/_manageCart.php" method="post">
                    <!-- Common Fields for both payment methods -->
                    <div class="form-group">
                        <b><label for="address">Address:</label></b>
                        <input class="form-control" id="address" name="address" placeholder="mirpur" type="text" required minlength="3" maxlength="500">
                    </div>
                    <div class="form-group">
                        <b><label for="address1">Address Line 2:</label></b>
                        <input class="form-control" id="address1" name="address1" placeholder="mirpur-2, Dhaka" type="text">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-0">
                            <b><label for="phone">Phone No:</label></b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon">+880</span>
                                </div>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxx" required pattern="[0-9]{10}" maxlength="10">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <b><label for="zipcode">Zip Code:</label></b>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="xxxxxx" required pattern="[0-9]{6}" maxlength="6">
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label for="password">Password:</label></b>
                        <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21" data-toggle="password">
                    </div>

                    <!-- Fields for Online Payment -->
                    <div class="modal-header">
                        <h5>Enter Details for Payment</h5>
                    </div>
                    <div id="onlinePaymentFields" style="display:none;">
                        <div class="form-group">
                            <b><label>Total Amount:</label></b>
                            <input name="amount" value="<?php echo $totalPrice ?>" readonly>
                        </div>
                        <div class="form-group">
                            <b><label for="paymentOption">Choose Payment Option:</label></b>
                            <select class="form-control" id="paymentOption" name="paymentOption" required>
                                <option value="bkash">bKash</option>
                                <option value="nagad">Nagad</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-0">
                                <b><label for="account">Account Number:</label></b>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="account" name="account" placeholder="xxxxxxxxxx" required pattern="[0-9]{11}" maxlength="11">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <b><label for="pin">Enter Pin:</label></b>
                                <input class="form-control" id="pin" name="pin" placeholder="Enter Pin" type="password" required minlength="4" maxlength="21" data-toggle="password">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="checkout" class="btn btn-success">Order</button>
                        <button type="submit" name="cashcheckout" class="btn btn-success">Order Cash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    // Attach event listener to the radio buttons
    document.getElementById('cashOnDelivery').addEventListener('change', function () {
        showPaymentFields('cash');
    });

    document.getElementById('onlinePayment').addEventListener('change', function () {
        showPaymentFields('online');
    });

    // Attach event listener to the payment option dropdown
    document.getElementById('paymentOption').addEventListener('change', function () {
        var selectedOption = this.value;
        showPaymentFields('online', selectedOption);
    });

    // Function to handle "Order Cash" button click
    document.querySelector('[name="cashcheckout"]').addEventListener('click', function () {
        showPaymentFields('cash');
    });

    function showPaymentFields(paymentMethod, paymentOption) {
        var onlinePaymentFields = document.getElementById('onlinePaymentFields');
        var orderButton = document.querySelector('[name="checkout"]');
        var cashOrderButton = document.querySelector('[name="cashcheckout"]');

        if (paymentMethod === 'online') {
            onlinePaymentFields.style.display = 'block';
            orderButton.style.display = 'inline-block';
            cashOrderButton.style.display = 'none';
        } else if (paymentMethod === 'cash') {
            onlinePaymentFields.style.display = 'none';
            orderButton.style.display = 'none';
            cashOrderButton.style.display = 'inline-block';
        } else {
            onlinePaymentFields.style.display = 'none';
            orderButton.style.display = 'inline-block';
            cashOrderButton.style.display = 'none';
        }
    }
</script>


