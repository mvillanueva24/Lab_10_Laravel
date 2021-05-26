@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row align-items-center h-100">
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <h3 class="card-title">
                    {{$post->title}}
                </h3>
                <img src="{{ asset($post->image) }}" alt="..." class="card-img-top">
                <h5 class="card-text">
                    {{ $post->content }}
                </h5>
                @auth
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{__('auth.Comments')}}</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-primary">@lang('auth.Send')</button>
                @endauth
            </div>
            <div class="card">
                <div class="card-body">
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem vero veritatis iusto 
                      tempora dolorem rem soluta, facere qui dignissimos.</p>
                  <h6 class="card-subtitle mb-2 text-muted text-right">User1</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem vero veritatis iusto 
                      tempora dolorem rem soluta, facere qui dignissimos.</p>
                  <h6 class="card-subtitle mb-2 text-muted text-right">User2</h6>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
