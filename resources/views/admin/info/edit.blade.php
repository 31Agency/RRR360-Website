@extends('layouts.customize-admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.info.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.info.update", [$info->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                    <label for="logo">{{ trans('cruds.info.fields.logo') }}</label>
                    <div class="needsclick dropzone" id="logo-dropzone">

                    </div>
                    @if($errors->has('logo'))
                        <em class="invalid-feedback">
                            {{ $errors->first('logo') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.logo_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('support') ? 'has-error' : '' }}">
                    <label for="support">{{ trans('cruds.info.fields.support') }}</label>
                    <div class="needsclick dropzone" id="support-dropzone">

                    </div>
                    @if($errors->has('support'))
                        <em class="invalid-feedback">
                            {{ $errors->first('support') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.support_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
                    <label for="favicon">{{ trans('cruds.info.fields.favicon') }}</label>
                    <div class="needsclick dropzone" id="favicon-dropzone">

                    </div>
                    @if($errors->has('favicon'))
                        <em class="invalid-feedback">
                            {{ $errors->first('favicon') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.favicon_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('about_photo') ? 'has-error' : '' }}">
                    <label for="about_photo">{{ trans('cruds.info.fields.about_photo') }}</label>
                    <div class="needsclick dropzone" id="about_photo-dropzone">

                    </div>
                    @if($errors->has('about_photo'))
                        <em class="invalid-feedback">
                            {{ $errors->first('about_photo') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.about_photo_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('about_video') ? 'has-error' : '' }}">
                    <label for="about_video">{{ trans('cruds.info.fields.about_video') }}</label>
                    <div class="needsclick dropzone" id="about_video-dropzone">

                    </div>
                    @if($errors->has('about_video'))
                        <em class="invalid-feedback">
                            {{ $errors->first('about_video') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.about_video_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                    <label for="title_en">{{ trans('cruds.info.fields.title_en') }}*</label>
                    <input type="text" id="title_en" name="title_en" class="form-control"
                           value="{{ old('title_en', isset($info) ? $info->title_en : '') }}" required>
                    @if($errors->has('title_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.title_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('keywords_en') ? 'has-error' : '' }}">
                    <label for="keywords_en">{{ trans('cruds.info.fields.keywords_en') }}*</label>
                    <input type="text" id="keywords_en" name="keywords_en" class="form-control"
                           value="{{ old('keywords_en', isset($info) ? $info->keywords_en : '') }}" required>
                    @if($errors->has('keywords_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('keywords_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.keywords_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('description_en') ? 'has-error' : '' }}">
                    <label for="description_en">{{ trans('cruds.info.fields.description_en') }}*</label>
                    <input type="text" id="description_en" name="description_en" class="form-control"
                           value="{{ old('description_en', isset($info) ? $info->description_en : '') }}" required>
                    @if($errors->has('description_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.description_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('vision_en') ? 'has-error' : '' }}">
                    <label for="vision_en">{{ trans('cruds.info.fields.vision_en') }}*</label>
                    <input type="text" id="vision_en" name="vision_en" class="form-control"
                           value="{{ old('vision_en', isset($info) ? $info->vision_en : '') }}" required>
                    @if($errors->has('vision_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('vision_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.vision_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('faq_en') ? 'has-error' : '' }}">
                    <label for="faq_en">{{ trans('cruds.info.fields.faq_en') }}*</label>
                    <input type="text" id="faq_en" name="faq_en" class="form-control"
                           value="{{ old('faq_en', isset($info) ? $info->faq_en : '') }}" required>
                    @if($errors->has('faq_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('faq_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.faq_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('about_title_en') ? 'has-error' : '' }}">
                    <label for="about_title_en">{{ trans('cruds.info.fields.about_title_en') }}*</label>
                    <input type="text" id="about_title_en" name="about_title_en" class="form-control"
                           value="{{ old('about_title_en', isset($info) ? $info->about_title_en : '') }}" required>
                    @if($errors->has('about_title_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('about_title_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.about_title_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('about_description_en') ? 'has-error' : '' }}">
                    <label for="about_description_en">{{ trans('cruds.info.fields.about_description_en') }}*</label>
                    <textarea id="about_description_en" name="about_description_en" class="form-control"
                              required>{{ old('about_description_en', isset($info) ? $info->about_description_en : '') }}</textarea>
                    @if($errors->has('about_description_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('about_description_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.about_description_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('about_full_description_en') ? 'has-error' : '' }}">
                    <label for="about_full_description_en">{{ trans('cruds.info.fields.about_full_description_en') }}*</label>
                    <textarea id="about_full_description_en" name="about_full_description_en" class="form-control summernote"
                              required>{{ old('about_full_description_en', isset($info) ? $info->about_full_description_en : '') }}</textarea>
                    @if($errors->has('about_full_description_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('about_full_description_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.about_full_description_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('important_pop_up_title_en') ? 'has-error' : '' }}">
                    <label for="important_pop_up_title_en">{{ trans('cruds.info.fields.important_pop_up_title_en') }}*</label>
                    <input type="text" id="important_pop_up_title_en" name="important_pop_up_title_en" class="form-control"
                           value="{{ old('important_pop_up_title_en', isset($info) ? $info->important_pop_up_title_en : '') }}" required>
                    @if($errors->has('important_pop_up_title_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('important_pop_up_title_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.important_pop_up_title_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('important_pop_up_description_en') ? 'has-error' : '' }}">
                    <label for="important_pop_up_description_en">{{ trans('cruds.info.fields.important_pop_up_description_en') }}*</label>
                    <textarea id="important_pop_up_description_en" name="important_pop_up_description_en" class="form-control"
                              required>{{ old('important_pop_up_description_en', isset($info) ? $info->important_pop_up_description_en : '') }}</textarea>
                    @if($errors->has('important_pop_up_description_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('important_pop_up_description_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.important_pop_up_description_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('support_title_en') ? 'has-error' : '' }}">
                    <label for="support_title_en">{{ trans('cruds.info.fields.support_title_en') }}*</label>
                    <input type="text" id="support_title_en" name="support_title_en" class="form-control"
                           value="{{ old('support_title_en', isset($info) ? $info->support_title_en : '') }}" required>
                    @if($errors->has('support_title_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('support_title_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.support_title_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('support_description_en') ? 'has-error' : '' }}">
                    <label for="support_description_en">{{ trans('cruds.info.fields.support_description_en') }}*</label>
                    <textarea id="support_description_en" name="support_description_en" class="form-control"
                              required>{{ old('support_description_en', isset($info) ? $info->support_description_en : '') }}</textarea>
                    @if($errors->has('support_description_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('support_description_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.support_description_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('support_brief_en') ? 'has-error' : '' }}">
                    <label for="support_brief_en">{{ trans('cruds.info.fields.support_brief_en') }}*</label>
                    <input type="text" id="support_brief_en" name="support_brief_en" class="form-control" value="{{ old('support_brief_en', isset($info) ? $info->support_brief_en : '') }}" required>
                    @if($errors->has('support_brief_en'))
                        <em class="invalid-feedback">
                            {{ $errors->first('support_brief_en') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.support_brief_en_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone">{{ trans('cruds.info.fields.phone') }}*</label>
                    <input type="tel" id="phone" name="phone" class="form-control"
                           value="{{ old('phone', isset($info) ? $info->phone : '') }}" required>
                    @if($errors->has('phone'))
                        <em class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.phone_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">{{ trans('cruds.info.fields.email') }}*</label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email', isset($info) ? $info->email : '') }}" required>
                    @if($errors->has('email'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.email_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address">{{ trans('cruds.info.fields.address') }}*</label>
                    <input type="text" id="address" name="address" class="form-control"
                           value="{{ old('address', isset($info) ? $info->address : '') }}" required>
                    @if($errors->has('address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.address_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('map') ? 'has-error' : '' }}">
                    <label for="map">{{ trans('cruds.info.fields.map') }}*</label>
                    <textarea id="map" name="map" class="form-control summernote" required>{{ old('map', isset($info) ? $info->map : '') }}</textarea>
                    @if($errors->has('map'))
                        <em class="invalid-feedback">
                            {{ $errors->first('map') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.info.fields.map_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>
    </div>
@endsection
@section('scripts')
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->logo)
                var file = {!! json_encode($info->logo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->logo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->logo->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        Dropzone.options.supportDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="support"]').remove()
                $('form').append('<input type="hidden" name="support" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="support"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->support)
                var file = {!! json_encode($info->support) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->support->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->support->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="support" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        Dropzone.options.footerDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="footer"]').remove()
                $('form').append('<input type="hidden" name="footer" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="footer"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->footer)
                var file = {!! json_encode($info->footer) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->footer->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->footer->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="footer" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        Dropzone.options.faviconDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="favicon"]').remove()
                $('form').append('<input type="hidden" name="favicon" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="favicon"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->favicon)
                var file = {!! json_encode($info->favicon) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->favicon->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->favicon->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="favicon" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        Dropzone.options.aboutPhotoDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="about_photo"]').remove()
                $('form').append('<input type="hidden" name="about_photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="about_photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->about_photo)
                var file = {!! json_encode($info->about_photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->about_photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->about_photo->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="about_photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        Dropzone.options.getQuotePhotoDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="get_quote_photo"]').remove()
                $('form').append('<input type="hidden" name="get_quote_photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="get_quote_photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->get_quote_photo)
                var file = {!! json_encode($info->get_quote_photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->get_quote_photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->get_quote_photo->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="get_quote_photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        Dropzone.options.howPhotoDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="how_photo"]').remove()
                $('form').append('<input type="hidden" name="how_photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="how_photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->how_photo)
                var file = {!! json_encode($info->how_photo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->how_photo->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->how_photo->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="how_photo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        Dropzone.options.aboutVideoDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.mp4,',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="about_video"]').remove()
                $('form').append('<input type="hidden" name="about_video" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="about_video"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->about_video)
                var file = {!! json_encode($info->about_video) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->about_video->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->about_video->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="about_video" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        Dropzone.options.aboutVideoDropzone = {
            url: '{{ route('admin.info.storeMedia') }}',
            acceptedFiles: '.mp4,',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').find('input[name="about_video"]').remove()
                $('form').append('<input type="hidden" name="about_video" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="about_video"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($info) && $info->about_video)
                var file = {!! json_encode($info->about_video) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ? str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $info->about_video->getUrl('thumb')) : str_replace('localhost', 'localhost:8000', $info->about_video->getUrl('thumb')) }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="about_video" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }
    </script>
@stop
