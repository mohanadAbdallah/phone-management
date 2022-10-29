@extends('layouts.main')

@section('js_css_header')
    <script src="{{asset('portal/global_assets/js/plugins/editors/ckeditor-full/ckeditor.js')}}" type="text/javascript"></script>
    <script src="{{asset('portal/global_assets/js/demo_pages/editor_ckeditor_default.js')}}" type="text/javascript"></script>
@endsection
@section('content')


    <div class="app-content content mt-md-0 mt-5">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-10 col-12 mb-2">
                    <h3 class="content-header-title"> إتصل بنا </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">نموذج الإخطار
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <form class="rated"
                                              action="{{route('setting.update_warning',$data->id ?? 1)}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @method('put')
                                            {{csrf_field()}}
                                            <div class="row ">
                                                <div class="col-12 ">
                                                    <div class="form-group">
                                                        <textarea  id="editor-full" rows="4" cols="4"
                                                                   name="text">{!! $data->text ?? '' !!}</textarea>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-group">

                                                <button class="btn btn-success">حفظ التغييرات</button>

                                            </div>

                                        </form>
                                        <div class="justify-content-center d-flex">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
