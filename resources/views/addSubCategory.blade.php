@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@php $id = $categoryId = $name = ''; @endphp
@if($subCategories!='')
    @php 
        $id = $subCategories->id;
        $categoryId = $subCategories->category_id;
        $name = $subCategories->sub_category_name; 
    @endphp 
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if($categories!=''){{'Edit'}}@else{{'Add'}}@endif Sub Category</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('addSubCategory') }}">
                        @csrf
                        <input type="hidden" name="sub_category_id" value="{{$id}}" />
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select name="category" class="form-control @error('sub_category') is-invalid @enderror" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($categoryId==$category->id){{'selected'}}@endif>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Sub Category') }}</label>

                            <div class="col-md-6">
                                <input id="sub_category" type="text" class="form-control @error('sub_category') is-invalid @enderror" name="sub_category" value="@if(old('sub_category')!=''){{old('sub_category')}}@else{{$name}}@endif" required autocomplete="sub_category" autofocus>

                                @error('sub_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @if($categories!=''){{'Edit'}}@else{{'Add'}}@endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
