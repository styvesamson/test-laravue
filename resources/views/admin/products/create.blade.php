@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.product.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.products.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('sku') ? 'has-error' : '' }}">
                <label for="sku">{{ trans('global.product.fields.sku') }}*</label>
                <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku', isset($product) ? $product->sku : '') }}">
                @if($errors->has('sku'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sku') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.sku_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.product.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($product) ? $product->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">{{ trans('global.product.fields.slug') }}*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($product) ? $product->slug : '') }}">
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.slug_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.product.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('global.product.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.price_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cover') ? 'has-error' : '' }}">
                <label for="cover">{{ trans('global.product.fields.cover') }}</label>
                <input type="file" name="cover" id="cover" class="form-control" value="{{ old('cover', isset($product) ? $product->cover : '') }}">
                @if($errors->has('cover'))
                    <em class="invalid-feedback">
                        {{ $errors->first('cover') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.cover_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
