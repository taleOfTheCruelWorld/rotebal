@extends('theme')
@section('content')
<div class="container-fluid">
    <h1>Кабинет администратора</h1>
    <div class="row align-items-center">
        You are admin {{ Auth::user()->login}} !
        <h1>Отзывы</h1>
        <table class="table">
            <tr>
                <td>Пользователь</td>
                <td>Продукт</td>
                <td>Оценка</td>
                <td>Отзыв</td>
                <td>Статус</td>
                <td></td>
                <td></td>
            </tr>
            @forelse ($reviews as $review)
            <tr>
                <td>{{$review->user->login}}</td>
                <td>{{$review->product->name}}</td>
                <td style="text-align: center;">{{$review->rating}}</td>
                <td>{{$review->content}}</td>
                <td style="min-width: 200px;"> @switch($review->status)
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

                <td>
                    <form action="" method="post">@csrf <input type="hidden" name="review"
                            value="{{ $review->id }}"><input type="hidden" name="status" value="1"> <button
                            type="submit" class="btn btn-success">Принять</button></form>
                </td>
                <td>
                    <form action="" method="post">@csrf<input type="hidden" name="review"
                            value="{{ $review->id }}"><input type="hidden" name="status" value="2"> <button
                            type="submit" class="btn btn-danger">Отклонить</button></form>
                </td>
            </tr>
            @empty
            Отзывов нет
            @endforelse
        </table>
    </div>
</div>
@endsection
