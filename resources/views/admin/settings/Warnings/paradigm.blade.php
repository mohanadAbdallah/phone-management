@extends('layouts.main')


@section('content')

<div class="app-content content mt-md-0 mt-5">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="font-size: 24px; color: #0a0e45;font-weight: bold">
                                    <i class="ft-globe" style="font-size: 24px; color: #0a0e45"></i> سياسة الإستبدال والإسترجاع
                                </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">

                                    <form class="rated"
                                          action=""
                                          method="post"
                                          enctype="multipart/form-data">
                                        @method('put')

                                        {{csrf_field()}}
                                        <div class="row ">
                                            <div class="col-12 ">
                                                <div class="form-group">
                                                    <label class="control-label" for="content_ar">المحتوى</label>
                                                    <textarea  id="editor-full" rows="4" cols="4"
                                                               name="text">{!! $data->text ?? '' !!}</textarea>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">

                                            <button class="btn btn-success">حفظ التغييرات</button>

                                        </div>

                                    </form>
                                    <form  action="">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger mr-1">
                                                للخلف
                                            </button>
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
