@extends('theme')
@section('content')
@php
    $stats=['В ожидании', 'Подтверждено','Отклонено'];
@endphp
<div class="container">
    <h1>Личный кабинет</h1>
    <div class="row align-items-center">
        {{ Auth::user()->login}}
        <a href="{{ route('changePass') }}">ChangePass</a>
        <h1>Мои отзывы</h1>
        <table class="table">
            <tr>
                <td>Продукт</td>
                <td>Оценка</td>
                <td>Отзыв</td>
                <td>Статус</td>
            </tr>
            @forelse (Auth::user()->reviews as $review)
            <tr>
                <td>{{$review->product->name}}</td>
                <td style="text-align: center;">{{$review->rating}}</td>
                <td>{{$review->content}}</td>
                <td style="min-width: 300px;">  {{ $stats[$review->status] }}</td>
            </tr>
            @empty
            Отзывов нет
            @endforelse
        </table>
    </div>
</div>
@endsection
