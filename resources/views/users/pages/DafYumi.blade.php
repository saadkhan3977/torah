@extends('users.layouts.layout')

@section('title', 'Memory Palace | Daf Yumi')

@section('main-content')

<section class="dash1">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                @include('users.includes.list')
            </div>
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                <div class="dash5">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                            <div class="dash6">
                                <h2>ושאיה יוכת שער</h2>
                                <p>אמר רב סחורה אמר רב הונא אמר רב הדר בחצר חבירו שלא מדעתו אין צריך להעלות לו שכר, משום שנאמר ושאיה יוכת שער, ופרש“י, שד ששמו שאיה מכתת שער בית שאין בני אדם דרין בו, והלכך זה שעמד בו ההנהו, לישנא אחרינא בית שהוא שאוי ויחיד מאין אדם יוכת שער מזיקין מכתתין אותו, אמר מר בר רב אשי לדידי חזי ליה ומנגח כי תורא, רב יוסף אמר ביתא מיתבא יתיב, ופרש“י, ית שהוא מיושב בדירת בני אדם יתיב ישובו קיים לפי שהדרין בתוכו רואין מה שהוא צריך ומתקנין אותו, מאי בינייהו, איכא בינייהו דקא משתמש ביה בציבי ותיבנא, ופרש“י, שהיו עציו ותבנו בתוכו וזה הלך ודר בו משום שאיה ליכא הואיל ומשתמשין בו משום ביתא מיתבא איכא דאין זה ישוב וזה שדר בו יפה עשה וההנהו</p>
                            </div>
                            <div class="dash7">
                                <button type="submit">View PDF</button>
                            </div>
                            <div class="dash8">
                                <button type="submit">Review</button>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                            <div class="dash9">
                                <img src="{{ asset('user-assets') }}/images/pic18.png" class="img-fluid" alt="img">
                                <div class="dash10">
                                    <img src="{{ asset('user-assets') }}/images/pic19.png" class="img-fluid" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div>
    <a id="button" class="my-button show"></a>
</div>


@endsection
