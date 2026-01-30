@extends('theme')
@section('content')
<div class="container-fluid">
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
            @forelse ($reviews as $review)
            <tr>
                <td>{{$review->product->name}}</td>
                <td style="text-align: center;">{{$review->rating}}</td>
                <td>{{$review->content}}</td>
                <td style="min-width: 300px;"> @switch($review->status)
                    @case(1)
                        Подтверждено
                    @break
                    @case(2)
                        Отклонено
                    @break
                    @default
                        В ожидании
                    @endswitch
                </td>

            </tr>
            @empty
            Отзывов нет
            @endforelse
        </table>
    </div>
</div>
@endsection
