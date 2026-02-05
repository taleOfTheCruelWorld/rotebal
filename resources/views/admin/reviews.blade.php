@extends('admin/cabinet')
@section('fill')
<div class="container">
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

                <form action="" method="post">
                @csrf
                <input type="hidden" name="review" value="{{ $review->id }}">
                <td>
                        <button name="status" value="1"type="submit" class="btn btn-success">Принять</button>
                </td>
                <td>
                     <button type="submit" name="status" value="2" class="btn btn-danger">Отклонить</button>
                </td>
                </form>
            </tr>
            @empty
            Отзывов нет
            @endforelse
        </table>
    </div>
</div>
@endsection
