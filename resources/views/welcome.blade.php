@extends('parent')

@section('main')
<div>
    @if($message_delete = Session::get('deleted'))
        <div class="alert alert-success" role="alert">
            {{ $message_delete }}
        </div>
    @endif
</div>

<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="container">
        <div class="row">
            @include('components.Form')
            <div class="col">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Чтобы добавить обьявление  - выберете пользователя:
                    </a>
                    <a
                            class="list-group-item list-group-item-action {{ $user_id == 0 ? 'clicked' : '' }}" href="{{route('all_adverts')}}/">
                        Все обьявления.
                    </a>
                    @foreach($users as $user)
                        <a
                           class="list-group-item list-group-item-action {{ $user_id == $user->id ? 'clicked' : '' }}" href="{{ route('adverts_of_user', $user->id ) }}">
                            {!! $user->name !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">
        Показано <span class="badge badge-success">{!! $count !!}</span> последних обьявлений.
    </h3>
</div>

<div class="row mb-2">
    @foreach($adverts as $advert)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-auto d-none d-lg-block">
                @if($advert->image)
                    <img src="{{ URL::to('/') }}/image/{{$advert->image }}" width="200" height="350" alt="">
                @else
                    <svg class="bd-placeholder-img" width="200" height="350" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                @endif

            </div>
            <div class="col p-4 d-flex flex-column position-static ">
                <strong class="d-inline-block mb-2 text-primary">{!! $advert->title !!}</strong>
                <p class="mb-2 card-text ">{!! Str::limit($advert->description, 255) !!}</p>
                <h5 class="mt-0 text-right">{!! $advert->name !!}</h5>
                <p class="mb-0 text-right text-muted">{!! $advert->email !!}</p>
                <p class="mb-1 text-right text-muted">{!! $advert->number !!}</p>
                <nav class="ml-auto blog-pagination mt-auto d-flex">
                    <a class="btn btn-outline-primary mr-1" href="{{ route('edit_advert', $advert->id )}}">Изменить</a>
                    <form method="post" action="{{ route('destroy_advert', $advert->id) }}" tabindex="-1" aria-disabled="true">
                        {{csrf_field()}}
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            Удалить
                        </button>
                    </form>
                </nav>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection











