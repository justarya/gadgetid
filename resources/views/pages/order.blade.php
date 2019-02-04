@include('includes.header')
@php
  $active1 = '';
  $active2 = '';
  $active3 = '';
  $active4 = '';
@endphp
@if($transaction->status > 0) @php $active1 = 'content__transaction-status__item--success'; @endphp @endif
@if($transaction->status > 1) @php $active2 = 'content__transaction-status__item--success'; @endphp @endif
@if($transaction->status > 2) @php $active3 = 'content__transaction-status__item--success'; @endphp @endif
@if($transaction->status > 3) @php $active4 = 'content__transaction-status__item--success'; @endphp @endif
<div class="content potongsaldo">
  <div class="container">
    <div class="content__title">
      <h1 class="title--pemisah">Lacak Order</h1>
    </div>
    <div class="content__transaction-status">
      <div class="content__transaction__container content__transaction-status__container">
        <div class="content__transaction__container__row">
          <div class="content__transaction-status__item {{$active1}}">
            <div class="content__transaction-status__item__icon">
              <i class="icon-basket"></i>
            </div>
            <div class="content__transaction-status__item__label">
              <p>Pemesanan</p>
            </div>
          </div>
          <div class="content__transaction-status__item {{$active2}}">
            <div class="content__transaction-status__item__icon">
              <i class="icon-box-1"></i>
            </div>
            <div class="content__transaction-status__item__label">
              <p>Packing</p>
            </div>
          </div>
          <div class="content__transaction-status__item {{$active3}}">
            <div class="content__transaction-status__item__icon">
              <i class="icon-direction"></i>
            </div>
            <div class="content__transaction-status__item__label">
              <p>Pengiriman</p>
            </div>
          </div>
          <div class="content__transaction-status__item {{$active4}}">
            <div class="content__transaction-status__item__icon">
              <i class="icon-dropbox"></i>
            </div>
            <div class="content__transaction-status__item__label">
              <p>Penerimaan</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if($transaction->status > 3)
    <div class="content__transaction-description">
      <div class="content__transaction__container content__transaction-description">
        <div class="content__transaction-description">
          <h1>Sukses Dikirim</h1>
          <p></p>
        </div>
      </div>
    </div>
    @endif
    @if($transaction->status > 2)
    <div class="content__transaction-description">
      <div class="content__transaction__container content__transaction-description">
        <div class="content__transaction-description">
          <h1>Pengiriman</h1>
          <p>Resi: {{$transaction->resi}}</p>
          <br>
          @if($transaction->status != 4)
          <p>
            Paket Sudah Diterima
            <a href="/finishorder/{{$transaction->id_transaction}}">Confirm</a>
          </p>
          @endif
        </div>
      </div>
    </div>
    @endif
    @if($transaction->status > 0)
    <div class="content__transaction-description">
      <div class="content__transaction__container content__transaction-description">
        <div class="content__transaction-description">
          <h1>Transaction Detail</h1>
          <table>
            <tr>
              <td>No Tranaksi</td>
              <td>: {{$transaction->id_transaction}}</td>
            </tr>
            <tr>
              <td>Pembeli</td>
              <td>: {{$transaction->nama}}</td>
            </tr>
            <tr>
              <td>Penjual</td>
              <td>: GadgetID</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>: {{$transaction->alamat}}</td>
            </tr>
            <tr>
              <td>Telepon/HP</td>
              <td>: {{$transaction->no_telp}}</td>
            </tr>
          </table>
          <table>
              @php $total = 0 @endphp
            @foreach($transactionProducts as $transactionProduct)
            <tr>
              <td>{{$transactionProduct->nama_product}}</td>
              <td>x{{$transactionProduct->total_product}}</td>
              <td>Rp. {{$transactionProduct->temp_harga}}</td>
            </tr>
            @php $total += $transactionProduct->temp_harga @endphp
            @endforeach
            <tr>
              <td colspan="2">Total</td>
              <td>Rp. {{$total}}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    @endif

  </div>
</div>
@include('includes.footer')
