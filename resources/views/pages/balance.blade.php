@include('includes.header')
<div class="content balance">
    <div class="container">
        <div class="content__title">
            <h1 class="title--pemisah">Balance</h1>
        </div>
        <div class="content__balance">
            <h3>Your Balance : Rp. {{number_format($user->saldo,2)}}</h3>
            <p>Refill Your Balance? Contact: 012381203</p>
            <div class="content__balance"></div>
        </div>
    </div>
</div>
@include('includes.footer')