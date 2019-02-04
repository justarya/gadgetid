@include('includes.header')
<div class="content payment">
    <div class="container">
        <div class="content-tile">
            <h1>Payment</h1>
        </div>
        <div class="content__list__container">
            <a href="/payment/balance" class="content__list">
                <h2 class="content__list__title">Saldo</h2>
                <p class="content__list__desc">Sisa Saldo Anda Rp. {{number_format($user->saldo,2)}}</p>
            </a>
        </div>
    </div>
</div>
@include('includes.footer')
