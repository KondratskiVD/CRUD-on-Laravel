<div class="col">
    @if(Route::current()->getName() !== 'edit_advert')
    <h2 class="font-italic text-center">Добавить Новое Обьявление</h2>
    @else
    <h2 class="font-italic text-center">Изменить Обьявление</h2>
    @endif
    @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{--    <form action="/adverts/{{ $user_id }}/add" enctype="multipart/form-data" method="POST">--}}
    <form action="{{ Route::current()->getName() !== 'edit_advert' ? '/adverts/'.$user_id.'/add' : '/adverts/'.$id.'/edit' }}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md mb-3">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $title ?? '' }}" {{ $user_id == 0 ? 'disabled' : '' }}>
            </div>
        </div>
        @if(Route::current()->getName() !== 'edit_advert')
        <div class="mb-3">
            <label for="image">Изображение</label>
            <div class="input-group">
                <input type="file" value="" class="form-control-file" name="image" id="image" {{ $user_id == 0 ? 'disabled' : '' }}>
            </div>
        </div>
        @else
        <div class="mb-3">
            <label for="image">Заменить изображение.</label>
            <input type="file" name="image">
            <img src="{{ URL::to('/') }}/image/{{ $image }}" width="100" height="100" alt="">
            <input type="hidden" name="hidden_image" value="{{ URL::to('/') }}/image/{{ $image }}" class="form-control-file">
        </div>
        @endif
        <div class="mb-3">
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description" {{ $user_id == 0 ? 'disabled' : '' }}>{{ $description ?? '' }}</textarea>
            </div>
        </div>
        <hr class="mb-4 bg-light" style="width: 50%;">
        <button class="btn btn-primary btn-lg btn-block col-md-4 m-auto" type="submit" {{ $user_id == 0 ? 'disabled' : '' }}>Добавить</button>
    </form>
</div>
