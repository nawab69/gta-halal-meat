@extends('site.app')
@section('title', 'Privacy Policy')
@section('content')

<div id="banner" class="carousel common">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active" style="background-image:url({{asset('public/storage/'.config('settings.about_banner'))}});">

        </div>
    </div><!--end carousel-inner-->
</div>





<section class="generic-page policy">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="page-content">
                    <h2>To pay by Interac e-Transfer:</h2>
                    <hr>

                    <h1>Your Order Number is : {{$order_number}}</h1>

                    <p class="para-tiny contenteditable" contenteditable="true"> •	Login to your online banking service </p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	Click on Interac e-Transfer, usually under "Email Money Transfer" or "Transfer Funds" ***If you haven't already added us as a recipient add GTAHalalMeat as the recipient name.</p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	Enter our email: gtahalalmeat@gmail.com as the recipient email address </p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	Enter the total amount for your order (Showing in checkout): $xxx.xx (Canadian Dollars)</p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	Security question is not required. We have Auto Deposit. </p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	Type your Order Number (XXXXX) into the notes </p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	Submit and Confirm the e-Transfer </p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	We will notify you by automated email when we receive the payment. Please Note: After business hours, on weekends and holidays this process can take a little longer. If the auto deposit function has accepted the etransfer we will move the order to processing in the sequence the transfer has been received. </p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	The process of moving an order from pending to processing is done by a human being once they have verified the transfer, it is normal outside of work hours for an order to remain in the pending status (even if you've sent the e transfer) until that evening or the following morning when the transfer is verified and the order moved to processing.</p>
                    <p class="para-tiny contenteditable" contenteditable="true"> •	You will receive a confirmation from us once the payment is received and order is in processing. Please note that standard delivery time and Next day delivery time will start after the payment is received.  </p>
                    <p class="para-tiny contenteditable" contenteditable="true">  Please note, some of our banking systems use an automated deposit function and may not ask you for a security question and/or answer. This is normal and you will receive notification as to your order status as usual.</p><p class="para-tiny contenteditable" contenteditable="true">•	Submit and Confirm the e-Transfer </p>
                    <form action="{{route('bankpay')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$order_number}}" name="order_number">
                        <button type="submit">I have paid it</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>


@stop
