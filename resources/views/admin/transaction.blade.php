@extends('admin.layouts.base')
@section('title','Transaction')
@section('content')
<div class="admin__content__title">
  <h2>Transaction List</h2>
</div>
<div class="admin__content__list__container">
  @foreach($transactions as $transaction)
    <div class="admin__content__list--order">
      <h2>Transaksi: {{$transaction->id_transaction}}</h2>
      <div class="admin__content__list__item">
        @foreach($transaction->TransactionProducts as $transactionProduct)
          <div class="admin__content__list">
            <div class="admin__content__list__image" style="background-image:url('{{$transactionProduct->product->image_product}}')"></div>
            <div class="admin__content__list__detail">
              <div class="admin__content__list__title">
                <h1>{{$transactionProduct->product->nama_product}} x {{$transactionProduct->product->stock_product}}</h1>
              </div>
              <div class="admin__content__list__price">
                <span>Rp. {{$transactionProduct->product->harga_product}}</span>
              </div>
            </div>
          </div>
          @endforeach
      </div>
      <div class="admin__content__list__main">
        <h2>Data Konsumen</h2>
        {{-- user data --}}
          <table>
            <tr>
              <td>Nama</td>
              <td>: {{$transaction->user->nama}}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>: {{$transaction->user->alamat}}</td>
            </tr>
            <tr>
              <td>Nomor Telp</td>
              <td>: {{$transaction->user->no_telp}} </td>
            </tr>
            <tr>
              <td>Tanggal Transaksi</td>
              @if($transaction->status == 4)
              <td>: {{$transaction->created_at}} - {{$transaction->updated_at}}</td>
              @else
              <td>: {{$transaction->created_at}} (Masih Berlangsung)</td>
              @endif
            </tr>
          </table>
        <br>
        @if($transaction->status == 0)

        @elseif($transaction->status == 1)
          <h2>Status: Menunggu Konfirmasi Seller</h2>
        @elseif($transaction->status == 2)
          <h2>Status: Menunggu resi</h2>
        @elseif($transaction->status == 3)
          <h2>Status: Pengiriman</h2>
        @elseif($transaction->status == 4)
          <h2>Status: Sudah Diterima</h2>
        @endif
      </div>
    </div>
  @endforeach
</div>
@endsection
