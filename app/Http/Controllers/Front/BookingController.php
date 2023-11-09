<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Discount;
use App\Models\Duration;
use App\Models\Excursion;
use App\Models\OrderbookDetail;
use App\Models\OrderexcurDetail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\BookedRoom;
use App\Models\Room;
use Auth;
use DB;
use App\Mail\Websitemail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
Use Stripe;

class BookingController extends Controller
{

    public function cart_submit(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'checkin_checkout' => 'required',
            'adult' => 'required'
        ]);

        $dates = explode(' - ',$request->checkin_checkout);
        $checkin_date = $dates[0];
        $checkout_date = $dates[1];

        $d1 = explode('/',$checkin_date);
        $d2 = explode('/',$checkout_date);
        $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
        $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
        $t1 = strtotime($d1_new);
        $t2 = strtotime($d2_new);

        $cnt = 1;
        while(1) {
            if($t1>=$t2) {
                break;
            }
            $single_date = date('d/m/Y',$t1);
            $total_already_booked_rooms = BookedRoom::where('booking_date',$single_date)->where('room_id',$request->room_id)->count();

            $arr = Room::where('id',$request->room_id)->first();
            $total_allowed_rooms = $arr->total_rooms;

            if($total_already_booked_rooms == $total_allowed_rooms) {
                $cnt = 0;
                break;
            }
            $t1 = strtotime('+1 day',$t1);
        }

        if($cnt == 0) {
            return redirect()->back()->with('error', 'Максимальное количество комнат в этом номере уже забронировано');
        }

        session()->push('cart_room_id',$request->room_id);
        session()->push('cart_checkin_date',$checkin_date);
        session()->push('cart_checkout_date',$checkout_date);
        session()->push('cart_adult',$request->adult);
        session()->push('cart_children',$request->children);

        return redirect()->back()->with('success', 'Комната успешно добавлена в корзину.');
    }

    public function cartbook_submit(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
        ]);

        session()->push('cart_book_id',$request->book_id);


        return redirect()->back()->with('success', 'Книга добавлена в корзину успешно.');
    }

    public function cartexcur_submit(Request $request)
    {
        $request->validate([
            'excursion_id' => 'required',
        ]);



        session()->push('cart_excursion_id',$request->excursion_id);
        session()->push('cart_adult_excur',$request->adult);
        session()->push('cart_children_excur',$request->children);
        session()->push('cart_pensioner',$request->pensioner);
        session()->push('cart_kids',$request->kids);
        session()->push('cart_date',$request->date);
        session()->push('cart_time_excur',$request->time_excur);

        return redirect()->back()->with('success', 'Экскурсия добавлена в корзину успешно.');
    }

    public function cart_view()
    {
        return view('front.cart');
    }

    public function cart_delete($id)
    {
        $arr_cart_room_id = array();
        $i=0;
        foreach(session()->get('cart_room_id') as $value) {
            $arr_cart_room_id[$i] = $value;
            $i++;
        }

        $arr_cart_checkin_date = array();
        $i=0;
        foreach(session()->get('cart_checkin_date') as $value) {
            $arr_cart_checkin_date[$i] = $value;
            $i++;
        }

        $arr_cart_checkout_date = array();
        $i=0;
        foreach(session()->get('cart_checkout_date') as $value) {
            $arr_cart_checkout_date[$i] = $value;
            $i++;
        }

        $arr_cart_adult = array();
        $i=0;
        foreach(session()->get('cart_adult') as $value) {
            $arr_cart_adult[$i] = $value;
            $i++;
        }

        $arr_cart_children = array();
        $i=0;
        foreach(session()->get('cart_children') as $value) {
            $arr_cart_children[$i] = $value;
            $i++;
        }

        session()->forget('cart_room_id');
        session()->forget('cart_checkin_date');
        session()->forget('cart_checkout_date');
        session()->forget('cart_adult');
        session()->forget('cart_children');

        for($i=0;$i<count($arr_cart_room_id);$i++)
        {
            if($arr_cart_room_id[$i] == $id)
            {
                continue;
            }
            else
            {
                session()->push('cart_room_id',$arr_cart_room_id[$i]);
                session()->push('cart_checkin_date',$arr_cart_checkin_date[$i]);
                session()->push('cart_checkout_date',$arr_cart_checkout_date[$i]);
                session()->push('cart_adult',$arr_cart_adult[$i]);
                session()->push('cart_children',$arr_cart_children[$i]);
            }
        }

        return redirect()->back()->with('success', 'Cart item is deleted.');

    }

    public function cartbook_delete($id)
    {
        $arr_cart_book_id = array();
        $i=0;
        foreach(session()->get('cart_book_id') as $value) {
            $arr_cart_book_id[$i] = $value;
            $i++;
        }


        session()->forget('cart_book_id');

        for($i=0;$i<count($arr_cart_book_id);$i++)
        {
            if($arr_cart_book_id[$i] == $id)
            {
                continue;
            }
            else
            {
                session()->push('cart_book_id',$arr_cart_book_id[$i]);

            }
        }

        return redirect()->back()->with('success', 'Книга удалена.');

    }

    public function cartexcur_delete($id)
    {
        $arr_cart_excursion_id = array();
        $i=0;
        foreach(session()->get('cart_excursion_id') as $value) {
            $arr_cart_excursion_id[$i] = $value;
            $i++;
        }
        $arr_cart_adult_excur = array();
        $i=0;
        foreach(session()->get('cart_adult_excur') as $value) {
            $arr_cart_adult_excur[$i] = $value;
            $i++;
        }

        $arr_cart_children_excur = array();
        $i=0;
        foreach(session()->get('cart_children_excur') as $value) {
            $arr_cart_children_excur[$i] = $value;
            $i++;
        }

        $arr_cart_pensioner = array();
        $i=0;
        foreach(session()->get('cart_pensioner') as $value) {
            $arr_cart_pensioner[$i] = $value;
            $i++;
        }

        $arr_cart_kids = array();
        $i=0;
        foreach(session()->get('cart_kids') as $value) {
            $arr_cart_kids[$i] = $value;
            $i++;
        }

        $arr_cart_date = array();
        $i=0;
        foreach(session()->get('cart_date') as $value) {
            $arr_cart_date[$i] = $value;
            $i++;
        }

        $arr_cart_time_excur = array();
        $i=0;
        foreach(session()->get('cart_time_excur') as $value) {
            $arr_cart_time_excur[$i] = $value;
            $i++;
        }

        session()->forget('cart_excursion_id');
        session()->forget('cart_adult_excur');
        session()->forget('cart_children_excur');
        session()->forget('cart_pensioner');
        session()->forget('cart_kids');
        session()->forget('cart_date');
        session()->forget('cart_time_excur');

        for($i=0;$i<count($arr_cart_excursion_id);$i++)
        {
            if($arr_cart_excursion_id[$i] == $id)
            {
                continue;
            }
            else
            {
                session()->push('cart_excursion_id',$arr_cart_excursion_id[$i]);
                session()->push('cart_adult_excur',$arr_cart_adult_excur[$i]);
                session()->push('cart_children_excur',$arr_cart_children_excur[$i]);
                session()->push('cart_pensioner',$arr_cart_pensioner[$i]);
                session()->push('cart_kids',$arr_cart_kids[$i]);
                session()->push('cart_date',$arr_cart_date[$i]);
                session()->push('cart_time_excur',$arr_cart_time_excur[$i]);
            }
        }

        return redirect()->back()->with('success', 'Экскурсия удалена.');

    }

    public function checkout()
    {
        if(!Auth::guard('customer')->check()) {
            return redirect()->back()->with('error', 'Вы должны залогиниться чтобы оформить заказ');
        }

        if(!session()->has('cart_room_id') and !session()->has('cart_book_id') and !session()->has('cart_excursion_id')) {
            return redirect()->back()->with('error', 'Нет заказов в корзине');
        }


        return view('front.checkout');
    }

    public function payment(Request $request)
    {
        if(!Auth::guard('customer')->check()) {
            return redirect()->back()->with('error', 'Вы должны залогиниться чтобы оформить заказ');
        }

        if(!session()->has('cart_room_id') and !session()->has('cart_book_id') and !session()->has('cart_excursion_id')) {
            return redirect()->back()->with('error', 'Нет заказов в корзине');
        }

        $request->validate([
            'billing_name' => 'required',
            'billing_email' => 'required|email',
            'billing_phone' => 'required',
            'billing_country' => 'required',
            'billing_address' => 'required',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_zip' => 'required'
        ]);

        session()->put('billing_name',$request->billing_name);
        session()->put('billing_email',$request->billing_email);
        session()->put('billing_phone',$request->billing_phone);
        session()->put('billing_country',$request->billing_country);
        session()->put('billing_address',$request->billing_address);
        session()->put('billing_state',$request->billing_state);
        session()->put('billing_city',$request->billing_city);
        session()->put('billing_zip',$request->billing_zip);

        return view('front.payment');
    }

    public function paypal($final_price)
    {
        $client = 'ARw2VtkTvo3aT7DILgPWeSUPjMK_AS5RlMKkUmB78O8rFCJcfX6jFSmTDpgdV3bOFLG2WE-s11AcCGTD';
        $secret = 'EPi7BbZ0b5GP9jmy095MyNkfYjJc3PF42fC58emf-FXRZF7kEUmHKpV0rfGl6EEWXUx0TSvo0FmXkzuy';

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $client, // ClientID
                $secret // ClientSecret
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($final_price);

        $amount->setCurrency('USD');
        $amount->setTotal($final_price);
        $amount->setDetails($details);
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $apiContext);

        if($result->state == 'approved')
        {
            $paid_amount = $result->transactions[0]->amount->total;

            $order_no = time();

            $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
            $ai_id = $statement[0]->Auto_increment;

            $obj = new Order();
            $obj->customer_id = Auth::guard('customer')->user()->id;
            $obj->order_no = $order_no;
            $obj->transaction_id = $result->id;
            $obj->payment_method = 'PayPal';
            $obj->paid_amount = $paid_amount;
            $obj->booking_date = date('d/m/Y');
            $obj->status = 'Completed';
            $obj->save();

            $arr_cart_room_id = array();
            $i=0;
            foreach(session()->get('cart_room_id') as $value) {
                $arr_cart_room_id[$i] = $value;
                $i++;
            }

            $arr_cart_checkin_date = array();
            $i=0;
            foreach(session()->get('cart_checkin_date') as $value) {
                $arr_cart_checkin_date[$i] = $value;
                $i++;
            }

            $arr_cart_checkout_date = array();
            $i=0;
            foreach(session()->get('cart_checkout_date') as $value) {
                $arr_cart_checkout_date[$i] = $value;
                $i++;
            }

            $arr_cart_adult = array();
            $i=0;
            foreach(session()->get('cart_adult') as $value) {
                $arr_cart_adult[$i] = $value;
                $i++;
            }

            $arr_cart_children = array();
            $i=0;
            foreach(session()->get('cart_children') as $value) {
                $arr_cart_children[$i] = $value;
                $i++;
            }

            for($i=0;$i<count($arr_cart_room_id);$i++)
            {
                $r_info = Room::where('id',$arr_cart_room_id[$i])->first();
                $d1 = explode('/',$arr_cart_checkin_date[$i]);
                $d2 = explode('/',$arr_cart_checkout_date[$i]);
                $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                $t1 = strtotime($d1_new);
                $t2 = strtotime($d2_new);
                $diff = ($t2-$t1)/60/60/24;
                $sub = $r_info->price*$diff;

                $obj = new OrderDetail();
                $obj->order_id = $ai_id;
                $obj->room_id = $arr_cart_room_id[$i];
                $obj->order_no = $order_no;
                $obj->checkin_date = $arr_cart_checkin_date[$i];
                $obj->checkout_date = $arr_cart_checkout_date[$i];
                $obj->adult = $arr_cart_adult[$i];
                $obj->children = $arr_cart_children[$i];
                $obj->subtotal = $sub;
                $obj->save();

                while(1) {
                    if($t1>=$t2) {
                        break;
                    }

                    $obj = new BookedRoom();
                    $obj->booking_date = date('d/m/Y',$t1);
                    $obj->order_no = $order_no;
                    $obj->room_id = $arr_cart_room_id[$i];
                    $obj->save();

                    $t1 = strtotime('+1 day',$t1);
                }

            }

            $subject = 'New Order';
            $message = 'Вы сделали заказ на бронирование. Информация о бронировании приведена ниже: <br>';
            $message .= '<br>Заказ Номер: '.$order_no;
            $message .= '<br>Операция Id: '.$result->id;
            $message .= '<br>Метод оплаты: PayPal';
            $message .= '<br>Оплаченная сумма: '.$paid_amount;
            $message .= '<br>Дата бронирования: '.date('d.m.Y').'<br>';

            for($i=0;$i<count($arr_cart_room_id);$i++) {

                $r_info = Room::where('id',$arr_cart_room_id[$i])->first();

                $message .= '<br>Название комнаты: '.$r_info->name;
                $message .= '<br>Цена за ночь: $'.$r_info->price;
                $message .= '<br>Дата заезда: '.$arr_cart_checkin_date[$i];
                $message .= '<br>Дата выезда: '.$arr_cart_checkout_date[$i];
                $message .= '<br>Взрослые: '.$arr_cart_adult[$i];
                $message .= '<br>Дети: '.$arr_cart_children[$i].'<br>';
            }

            $customer_email = Auth::guard('customer')->user()->email;

            \Mail::to($customer_email)->send(new Websitemail($subject,$message));

            session()->forget('cart_room_id');
            session()->forget('cart_checkin_date');
            session()->forget('cart_checkout_date');
            session()->forget('cart_adult');
            session()->forget('cart_children');
            session()->forget('billing_name');
            session()->forget('billing_email');
            session()->forget('billing_phone');
            session()->forget('billing_country');
            session()->forget('billing_address');
            session()->forget('billing_state');
            session()->forget('billing_city');
            session()->forget('billing_zip');

            return redirect()->route('home')->with('success', 'Оплата произведена успешно');
        }
        else
        {
            return redirect()->route('home')->with('error', 'Платеж не произведен');
        }


    }

    public function stripe(Request $request, $final_price)
    {
        $stripe_secret_key = 'sk_test_51LT28GF67T3XLjgL8ICWowviN9gL7cXzOr1hPOEVX94aizsO58jdO1CtIBpo583748yVPzAV46pivFolrjqZddSx00PSAfpyff';
        $cents = $final_price*100;
        Stripe\Stripe::setApiKey($stripe_secret_key);
        $response = Stripe\Charge::create ([
            "amount" => $cents,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => '',
        ]);

        $responseJson = $response->jsonSerialize();
        $transaction_id = $responseJson['balance_transaction'];
        $last_4 = $responseJson['payment_method_details']['card']['last4'];

        $order_no = time();

        $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
        $ai_id = $statement[0]->Auto_increment;

        $obj = new Order();
        $obj->customer_id = Auth::guard('customer')->user()->id;
        $obj->order_no = $order_no;
        $obj->transaction_id = $transaction_id;
        $obj->payment_method = 'Stripe';
        $obj->card_last_digit = $last_4;
        $obj->paid_amount = $final_price;
        $obj->booking_date = date('d/m/Y');
        $obj->status = 'Completed';
        $obj->save();

        if(session()->has('cart_room_id')) {
            $arr_cart_room_id = array();
            $i = 0;
            foreach (session()->get('cart_room_id') as $value) {
                $arr_cart_room_id[$i] = $value;
                $i++;
            }

            $arr_cart_checkin_date = array();
            $i = 0;
            foreach (session()->get('cart_checkin_date') as $value) {
                $arr_cart_checkin_date[$i] = $value;
                $i++;
            }

            $arr_cart_checkout_date = array();
            $i = 0;
            foreach (session()->get('cart_checkout_date') as $value) {
                $arr_cart_checkout_date[$i] = $value;
                $i++;
            }

            $arr_cart_adult = array();
            $i = 0;
            foreach (session()->get('cart_adult') as $value) {
                $arr_cart_adult[$i] = $value;
                $i++;
            }

            $arr_cart_children = array();
            $i = 0;
            foreach (session()->get('cart_children') as $value) {
                $arr_cart_children[$i] = $value;
                $i++;
            }

            for ($i = 0; $i < count($arr_cart_room_id); $i++) {
                $r_info = Room::where('id', $arr_cart_room_id[$i])->first();
                $d1 = explode('/', $arr_cart_checkin_date[$i]);
                $d2 = explode('/', $arr_cart_checkout_date[$i]);
                $d1_new = $d1[2] . '-' . $d1[1] . '-' . $d1[0];
                $d2_new = $d2[2] . '-' . $d2[1] . '-' . $d2[0];
                $t1 = strtotime($d1_new);
                $t2 = strtotime($d2_new);
                $diff = ($t2 - $t1) / 60 / 60 / 24;
                $sub = $r_info->price * $diff;

                $obj = new OrderDetail();
                $obj->order_id = $ai_id;
                $obj->room_id = $arr_cart_room_id[$i];
                $obj->order_no = $order_no;
                $obj->checkin_date = $arr_cart_checkin_date[$i];
                $obj->checkout_date = $arr_cart_checkout_date[$i];
                $obj->adult = $arr_cart_adult[$i];
                $obj->children = $arr_cart_children[$i];
                $obj->subtotal = $sub;
                $obj->save();

                while (1) {
                    if ($t1 >= $t2) {
                        break;
                    }

                    $obj = new BookedRoom();
                    $obj->booking_date = date('d/m/Y', $t1);
                    $obj->order_no = $order_no;
                    $obj->room_id = $arr_cart_room_id[$i];
                    $obj->save();

                    $t1 = strtotime('+1 day', $t1);
                }

            }

            $subject = 'New Order';
            $message = 'Вы сделали заказ на бронирование. Информация о бронировании приведена ниже: <br>';
            $message .= '<br>Заказ номер: ' . $order_no;
            $message .= '<br>Операция Id: ' . $transaction_id;
            $message .= '<br>Метод оплаты: Stripe';
            $message .= '<br>Оплаченная сумма: ' . $final_price;
            $message .= '<br>Дата бронирования: ' . date('d/m/Y') . '<br>';

            for ($i = 0; $i < count($arr_cart_room_id); $i++) {

                $r_info = Room::where('id', $arr_cart_room_id[$i])->first();

                $message .= '<br>Наименование комнаты: ' . $r_info->name;
                $message .= '<br>Цена за ночь: $' . $r_info->price;
                $message .= '<br>Дата заезда: ' . $arr_cart_checkin_date[$i];
                $message .= '<br>Дата выезда: ' . $arr_cart_checkout_date[$i];
                $message .= '<br>Взрослые: ' . $arr_cart_adult[$i];
                $message .= '<br>Дети: ' . $arr_cart_children[$i] . '<br>';
            }

            $customer_email = Auth::guard('customer')->user()->email;

            \Mail::to($customer_email)->send(new Websitemail($subject, $message));

            session()->forget('cart_room_id');
            session()->forget('cart_checkin_date');
            session()->forget('cart_checkout_date');
            session()->forget('cart_adult');
            session()->forget('cart_children');
            session()->forget('billing_name');
            session()->forget('billing_email');
            session()->forget('billing_phone');
            session()->forget('billing_country');
            session()->forget('billing_address');
            session()->forget('billing_state');
            session()->forget('billing_city');
            session()->forget('billing_zip');

        }
        if(session()->has('cart_book_id')) {
            $arr_cart_book_id = array();
            $i = 0;
            foreach (session()->get('cart_book_id') as $value) {
                $arr_cart_book_id[$i] = $value;
                $i++;
            }

            for ($i = 0; $i < count($arr_cart_book_id); $i++) {
                $r_info = Book::where('id', $arr_cart_book_id[$i])->first();

                $sub = $r_info->price;

                $obj = new OrderbookDetail();
                $obj->order_id = $ai_id;
                $obj->book_id = $arr_cart_book_id[$i];
                $obj->order_no = $order_no;
                $obj->subtotal = $sub;
                $obj->save();


            }

            $subject = 'New Order';
            $message = 'Вы сделали заказ на книги. Информация о заказе приведена ниже: <br>';
            $message .= '<br>Заказ номер: ' . $order_no;
            $message .= '<br>Операция Id: ' . $transaction_id;
            $message .= '<br>Метод оплаты: Stripe';
            $message .= '<br>Оплаченная сумма: ' . $final_price;
            $message .= '<br>Дата заказа: ' . date('d/m/Y') . '<br>';

            for ($i = 0; $i < count($arr_cart_book_id); $i++) {

                $r_info = Book::where('id', $arr_cart_book_id[$i])->first();

                $message .= '<br>Наименование книги: ' . $r_info->title;
                $message .= '<br>Цена : $' . $r_info->price . '. <br>';
            }

            $customer_email = Auth::guard('customer')->user()->email;

            \Mail::to($customer_email)->send(new Websitemail($subject, $message));

            session()->forget('cart_book_id');
            session()->forget('billing_name');
            session()->forget('billing_email');
            session()->forget('billing_phone');
            session()->forget('billing_country');
            session()->forget('billing_address');
            session()->forget('billing_state');
            session()->forget('billing_city');
            session()->forget('billing_zip');

        }
        if(session()->has('cart_excursion_id')) {

            $arr_cart_excursion_id = array();
            $i = 0;
            foreach (session()->get('cart_excursion_id') as $value) {
                $arr_cart_excursion_id[$i] = $value;
                $i++;
            }
            $arr_cart_adult_excur = array();

            $i=0;
            foreach(session()->get('cart_adult_excur') as $value) {
                $arr_cart_adult_excur[$i] = $value;
                $i++;
            }

            $arr_cart_children_excur = array();
            $i=0;
            foreach(session()->get('cart_children_excur') as $value) {
                $arr_cart_children_excur[$i] = $value;
                $i++;
            }

            $arr_cart_pensioner = array();
            $i=0;
            foreach(session()->get('cart_pensioner') as $value) {
                $arr_cart_pensioner[$i] = $value;
                $i++;
            }

            $arr_cart_kids = array();
            $i=0;
            foreach(session()->get('cart_kids') as $value) {
                $arr_cart_kids[$i] = $value;
                $i++;
            }

            $arr_cart_date = array();
            $i=0;
            foreach(session()->get('cart_date') as $value) {
                $arr_cart_date[$i] = $value;
                $i++;
            }

            $arr_cart_time_excur = array();
            $i=0;
            foreach(session()->get('cart_time_excur') as $value) {
                $arr_cart_time_excur[$i] = $value;
                $i++;
            }



                for ($i = 0; $i < count($arr_cart_excursion_id); $i++) {

                    $discounts = Discount::get();
                    $excursion_data = Excursion::with('discounts')->where('id',$arr_cart_excursion_id[$i])->first();
                    foreach ($excursion_data->discounts as $discount){

                        $adult =  $excursion_data->price - ($excursion_data->price * $discounts[0]->discount)/100  ;
                        $pensioner= $excursion_data->price - ($excursion_data->price * $discounts[2]->discount)/100  ;
                        $children = $excursion_data->price - ($excursion_data->price * $discounts[1]->discount)/100  ;
                        $kids = $excursion_data->price - ($excursion_data->price * $discounts[3]->discount)/100  ;
                    }
                    $adult_number  = $arr_cart_adult_excur[$i];
                    $pensioner_number  = $arr_cart_pensioner[$i];
                    $children_number = $arr_cart_children_excur[$i];
                    $kids_number = $arr_cart_kids[$i];

                    $adult *  $arr_cart_adult_excur[$i]  = $sum_adult = $adult * $arr_cart_adult_excur[$i];
                    $pensioner * $arr_cart_pensioner[$i]  = $sum_pensioner =$pensioner * $arr_cart_pensioner[$i];
                    $children *  $arr_cart_children_excur[$i]  = $sum_children = $children *  $arr_cart_children_excur[$i];
                    $kids *  $arr_cart_kids[$i]  = $sum_kids = $kids *  $arr_cart_kids[$i];


                $r_info = Excursion::where('id', $arr_cart_excursion_id[$i])->first();

                $sub =  $sum_adult + $sum_pensioner + $sum_children + $sum_kids;

                $obj = new OrderexcurDetail();
                $obj->order_id = $ai_id;
                $obj->excursion_id = $arr_cart_excursion_id[$i];
                $obj->order_no = $order_no;
                $obj->date = $arr_cart_date[$i];
                $obj->time = $arr_cart_time_excur[$i];
                $obj->adult = $adult_number;
                $obj->pensioner = $pensioner_number;
                $obj->children = $children_number;
                $obj->kids = $kids_number;
                $obj->subtotal = $sub;
                $obj->save();



            }

            $subject = 'New Order';
            $message = 'Вы сделали заказ на бронирование экскурсии. Информация о бронировании приведена ниже: <br>';
            $message .= '<br>Заказ номер: ' . $order_no;
            $message .= '<br>Операция Id: ' . $transaction_id;
            $message .= '<br>Метод оплаты: Stripe';
            $message .= '<br>Оплаченная сумма: ' . $final_price;
            $message .= '<br>Дата бронирования: ' . date('d/m/Y') . '<br>';

            for ($i = 0; $i < count($arr_cart_excursion_id); $i++) {

                $r_info = Excursion::where('id', $arr_cart_excursion_id[$i])->first();
                function sum12_time()
                {
                    $i = 0;
                    foreach (func_get_args() as $time) {
                        sscanf($time, '%d:%d', $hour, $min);
                        $i += $hour * 60 + $min;
                    }
                    if ($h = floor($i / 60)) {
                        $i %= 60;
                    }
                    return sprintf('%02d:%02d', $h, $i);
                };

                $message .= '<br>Наименование экскурсии: ' . $r_info->name;
                $message .= '<br>Дата : ' . $arr_cart_date[$i];
                $message .= '<br>Время: ' . $arr_cart_time_excur[$i] .'-'. sum12_time($arr_cart_time_excur[$i],$r_info->durationExcursion);
                $message .= '<br>Взрослые: ' . $adult_number ;
                $message .= '<br>Пенсионеры: ' . $pensioner_number ;
                $message .= '<br>Дети 5-14 : ' . $children_number  ;
                $message .= '<br>Дети до 5 : ' . $kids_number . '<br>';
            }

            $customer_email = Auth::guard('customer')->user()->email;

            \Mail::to($customer_email)->send(new Websitemail($subject, $message));

            session()->forget('cart_excursion_id');
            session()->forget('cart_adult_excur');
            session()->forget('cart_children_excur');
            session()->forget('cart_pensioner');
            session()->forget('cart_kids');
            session()->forget('cart_date');
            session()->forget('cart_cart_time_excur');
            session()->forget('billing_name');
            session()->forget('billing_email');
            session()->forget('billing_phone');
            session()->forget('billing_country');
            session()->forget('billing_address');
            session()->forget('billing_state');
            session()->forget('billing_city');
            session()->forget('billing_zip');

        }


        return redirect()->route('home')->with('success', 'Оплата прошла успешно');


    }


}
