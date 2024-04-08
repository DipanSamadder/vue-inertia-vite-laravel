@extends('backend.layouts.app')

@section('header')
<link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<style>
    .bootstrap-tagsinput{    border: 1px solid #cbcbcb !important;width: 100%;}
</style>
@endsection

@section('content')
{{--
<ul class="nav nav-tabs nav-fill border-light">
		@foreach (\App\Models\Language::all() as $key => $language)
			<li class="nav-item">
				<a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('pages.edit', ['id'=>$data->id, 'lang'=> $language->code] ) }}">
					<img src="{{ dsld_static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
					<span>{{$language->name}}</span>
				</a>
			</li>
		@endforeach
	</ul>
    --}}
 <!-- Exportable Table -->
 <form id="update_form" action="{{ route('pages.update') }}" method="POST" enctype="multipart/form-data" >
    <div class="row clearfix">
        <div class="col-lg-8">
            @csrf 
            <input type="hidden" name="_method" value="PATCH">
		    <input type="hidden" name="lang" id="lang" value="{{ $lang }}">
            <input type="hidden" name="id" id="id" value="{{ $data->id }}" />
            <input type="hidden" name="type" id="type" value="gallery_page" />
            <div class="card mb-0">
                <div class="header">
                    <a href="{{ route('custom-pages.show_custom_page', [$data->slug]) }}" target="_blank">         
                        <h2><strong> <i class="zmdi zmdi-hc-fw"></i> {{ $data->title }}</strong></h2>
                    </a>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label class="form-label">Title <small class="text-danger">*</small> </label>  
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" onchange="is_edited()" value="{{ $data->getTranslation('title', $lang) }}" />
                            <small>Key : ( {{ $data->key_title }} )</small>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label class="form-label">Slug <small class="text-danger">*</small><span class="ml-2 pointer-cursor" onclick="$('input[name=slug]').removeAttr('disabled');"><i class="zmdi zmdi-edit"></i></a></label>  
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $data->slug }}" onchange="is_edited()" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label class="form-label">Short Content</label>  
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                            <input type="text" name="short_content" id="short_content" class="form-control" placeholder="Short Content" onchange="is_edited()" value="{{ $data->getTranslation('short_content', $lang) }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-0">
                <div class="header">
                    <h2><strong>Description</strong></h2>
                </div>
                <div class="form-group">                                
                    <textarea class="summernote" name="content" id="content" onchange="is_edited()"><?php $str = $data->getTranslation('content', $lang); echo htmlspecialchars_decode($str); ?></textarea>                                   
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-0">
                <div class="header">
                    <h2><strong>Publish</strong></h2>                        
                </div>
                <div class="body">
            
                    <div class="form-group">
                        <label class="form-label">Status *</label>                                 
                        <select class="form-control" name="status" id="status" onchange="is_edited()">
                            <option value="">-- Please select --</option>
                            <option value="1" @if($data->status == 1) selected @endif>Active</option>
                            <option value="0" @if($data->status == 0) selected @endif>Deactive</option>
                        </select>                             
                    </div>
                    <div class="form-group">
                        <label class="form-label">Template *</label>                                 
                        <select class="form-control" name="template" id="template" onchange="is_edited()">
                            <option value="">-- Please select --</option>
                            <option value="gallery_details" @if($data->template == 'gallery_details') selected  @endif>Gallery Details</option>
                        </select>                             
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Parent *</label>                                 
                        <select class="form-control show-tick ms select2" name="parent" id="parent" onchange="is_edited()">
                            <option value="0">-- Please select --</option>

                                @foreach(App\Models\Post::where('type', 'gallery_page')->where('status', 1)->whereNotIn('id', [$data->id])->get() as $key => $value)
                                
                                <option value="{{ $value->id }}"  @if($data->parent ==  $value->id) selected @endif>{{ $value->title }}</option>
                                @php
                                    $child = App\Models\Post::where('parent', $value->id)->where('type', 'gallery_page')->where('level', 2)->where('status', 1)->get();
                                @endphp
                                @if($child != '')
                                    @foreach($child as $key => $value1)
                                        <option value="{{ $value1->id }}"  @if($data->parent ==  $value1->id) selected @endif>- {{ $value1->title }}</option>
                                        @php
                                            $child2 = App\Models\Post::where('parent', $value1->id)->where('type', 'gallery_page')->where('level', 3)->where('status', 1)->get();
                                        @endphp
                                        @if($child2 != '')
                                            @foreach($child2 as $key => $value2)
                                                <option value="{{ $value2->id }}"  @if($data->parent ==  $value2->id) selected @endif>-- {{ $value2->title }}</option>
                                                @php
                                                    $child3 = App\Models\Post::where('parent', $value2->id)->where('type', 'gallery_page')->where('level', 4)->where('status', 1)->get();
                                                @endphp
                                                @if($child3 != '')
                                                    @foreach($child3 as $key => $value3)
                                                        <option value="{{ $value3->id }}"  @if($data->parent ==  $value3->id) selected @endif>--- {{ $value3->title }}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif

                            @endforeach
                        </select>                             
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order</label>                                 
                        <input type="text" name="order" id="order" onchange="is_edited()" class="form-control" placeholder="Order" value="{{ $data->order }}" />                                   
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                        </div>
                        <input type="date" name="date" id="date" class="form-control" onchange="is_edited()" value="{{  date('Y-m-d', strtotime($data->created_at)) }}">
                    </div>
                    <div class="swal-button-container">
                        <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader" id="submit_btn" disabled="disabled">Update</button>
                    </div>
                    <a href="{{ route('custom-pages.show_custom_page', [$data->slug]) }}" traget="_blank"  class="btn btn-success btn-round waves-effect">Preview</a>
                    <button type="button" class="btn btn-danger btn-round waves-effect" onclick="DSLDDeleteAlert('{{ $data->id }}','{{ route('pages.destory') }}','{{ csrf_token() }}')"><i class="zmdi zmdi-delete"></i></button>
                </div>
            </div>
            <div class="card mb-0">
                <div class="header">
                    <h2><strong>Banner</strong></h2>                        
                </div>
                <div class="body">
                    <div class="form-group">
                        <label class="form-label">Banner </label><a class="btn btn-primary text-white" onclick="media_file_get('{{ @$data->banner }}','put_image', 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="put_image">@if(isset($data->banner))<strong>Selected Image:</strong><i> {{ @$data->banner }}</i>@endif</div>
                        
                        <input type="hidden" class="put_image" name="banner" id="banner" value="{{ @$data->banner }}" onchange="is_edited()">
                        @if($data->banner > 0)
                        <div class="image mt-2">
                            <img src="{{ dsld_uploaded_file_path($data->banner) }}"  alt="{{ dsld_upload_file_title($data->banner) }}" class="img-fluid">
                        </div> 
                        @endif  
                                                                                  
                    </div>
                </div>
            </div>
            <div class="card mb-0">
                <div class="header">
                    <h2><strong>SEO</strong></h2>                        
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                            <label class="form-label">Meta Title </label>  
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                            <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" onchange="is_edited()" value="{{ $data->meta_title }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                            <label class="form-label">Meta Description </label>  
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                            <input type="text" name="meta_description" onchange="is_edited()" id="meta_description" class="form-control" placeholder="Meta Drscription" value="{{ $data->meta_description }}" />                                   
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                            <label class="form-label">Keyword </label>  
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                            <input type="text" class="form-control" onchange="is_edited()" name="keywords" id="keywords" data-role="tagsinput" value="{{ $data->keywords }}">                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>
<!-- Exportable Table -->
 
<div class="modal fade media" id="edit_pages_section" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="DSLDLargeModalTitle">All Media</h4>
                
            </div>
            <div class="modal-body">
               
            </div>
        </div>
    </div>
</div>


<div class="gallery_fields" style="display:none">
<hr>
<h4>Gallery Details</h4>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="body">
       
                <!-- Nav tabs -->
                <ul class="nav nav-tabs p-0 mb-3 nav-tabs-success" role="tablist">
                     <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#show_gallery" onclick="show_gallery_images('{{ $data->id}}')"> Show Images</a></li>
                     <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#add_gallery"> Add Images</a></li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="show_gallery">
                        <div id="show_gallery_pages_section_body"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="add_gallery">
                        
                        <form id="gallery_upload_form"  method="POST"  enctype="multipart/form-data">
                            @csrf   
                            <input type="hidden" name="page_id" value="{{ $data->id}}">
                            <input type="file" name="dsld_files[]" id="upload_images" class="dropify" multiple >
                            <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader">UPLOAD</button>
                                            
                        </form>

                    </div>
                </div>

                
            </div>
        </div>
        
    </div>
</div>
<div>

@endsection

@section('footer')
<input type="hidden" name="page_no" id="page_no" value="1">
<script src="{{ dsld_static_asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

<!--Edit Section-->
<div class="modal fade" id="edit_larger_modals" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="edit_larger_modals_title"></h4>
            </div>
            <form id="update_form_popup" action="{{ route('media.update') }}" method="POST" enctype="multipart/form-data" >
            @csrf 
            <div class="modal-body">
                <div id="edit_larger_modals_body">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
                <div class="swal-button-container">
                    <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader">UPDATE</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!--Edit Section-->
<script>
    $(document).ready(function(){

        $('#page_no').val(1);
        get_files_media();
        $(".summernote").summernote('code');

        if ($('#template').val() == 'gallery_details') { 
            $('.gallery_fields').show();
        }else{
            $('.gallery_fields').hide();   
        }

        $('#gallery_upload_form').on('submit', function(event){
            event.preventDefault();

            var images = $('#upload_images').val();
            var formData = new FormData(this);
            let TotalFiles = $('#upload_images')[0].files.length; //Total files
            let files = $('#upload_images')[0];

            for (let i = 0; i < TotalFiles; i++) {
            formData.append('files' + i, files.files[i]);
            }
            formData.append('TotalFiles', TotalFiles);

            if(images != null && images != ''){
                $(this).addClass('btnloading');
                DSLDAjaxSubmit("{{ route('media.uploads') }}", formData, "POST", ".btnloading", 1);
                $(this)[0].reset();
                $('.dropify-render img').attr('src','');
                $('#DSLDImageUpload').modal('hide');
                get_files_media();
            }else{
                dsldFlashNotification('warning', 'Please select file. Then upload again.');
            }

        });


        $('#update_form_popup').on('submit', function(event){
            event.preventDefault();

            $('.dsld-btn-loader').addClass('btnloading');
            var Loader = ".btnloading";
            DSLDButtonLoader(Loader, "start");

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                cache : false,
                data: {
                    '_token':'{{ csrf_token() }}', 
                    'title': $('#edit_file_title').val(),
                    'order': $('#edit_order').val(),
                    'id': $('#edit_id').val(),
                },
                success: function(data) {
                    DSLDButtonLoader(Loader, "");
                    dsldFlashNotification(data['status'], data['message']);
                    if(data['status'] =='success'){
                        get_files_media();
                    }
                    
                }
            });

        });

       $('#template').on('change', function(){

            if ($(this).val() == 'gallery_details') { 
                $('.gallery_fields').show();
            }else{
                $('.gallery_fields').hide();   
            }

       });

        $(document).on('click', '.pagination a',function(event){

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            event.preventDefault();
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            $('#page_no').val(page);
            get_files_media();

        });

        
    });

  
    $(document).ready(function(){

        $('#update_form').on('submit', function(event){
        event.preventDefault();
        
            var setting_page_name_hide = 'no';
            
            if ($('#setting_page_name_hide').is(":checked")) { 
                if($('#setting_page_name_hide').val() == 'yes'){
                    setting_page_name_hide = 'yes';
                }
            }

            $('input[name=slug]').removeAttr('disabled');
            $('.dsld-btn-loader').addClass('btnloading');
            var Loader = ".btnloading";
            DSLDButtonLoader(Loader, "start");
            var content =  $("#content").summernote('code');

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                cache : false,
                data: $(this).serialize(),
                success: function(data) {
                    DSLDButtonLoader(Loader, "");
                    dsldFlashNotification(data['status'], data['message']);
                    if(data['status'] =='success'){
                        $('input[name=slug]').attr('disabled', true);
                        window.location.reload();
                    }
                    
                }
            });

        });

    });

    function popup_media(id){

        $('#edit_larger_modals_body').html('');
        $('#edit_larger_modals').modal('show');
        $('#edit_larger_modals_title').text('Edit Alt Tag');
        $.ajax({
            url: "{{ route('media.edit') }}",
            type: "post",
            cache : false,
            data: {
                    '_token':'{{ csrf_token() }}',
                    'user_id':'{{ Auth::user()->id }}',
                    'id': id,
                },
            success: function(d) {
                $('#edit_larger_modals_body').html(d);
            }
        });

    }

    function file_delete(id){

        $.ajax({
            url: "{{ route('media.destroy.admin') }}",
            type: "post",
            data: {'_token':'{{ csrf_token() }}', 'id':id},
            success: function(d) {
            
                get_files_media();
            }
        });

    }

    function show_gallery_images(page_id){

        // $('#edit_pages_section').modal('show');
        $('#show_gallery_pages_section_body').html('<center><img src="{{ dsld_static_asset('backend/assets/images/circle-loading.gif') }}" style="max-width:100px" ></center>');
        var page = $('#page_no').val();
        $.ajax({
            url: "{{ route('media.gets_page_edit.admin') }}",
            type: "post",
            cache : false,
            data: {'_token':'{{ csrf_token() }}','page_id':page_id,'page':page},
            success: function(d) {
                $('#show_gallery_pages_section_body').html(d);
            }
        });

    }

    function is_edited(){
        $('#submit_btn').removeAttr('disabled');
    }

    function get_files_media(){
        show_gallery_images('{{ $data->id}}');
    }
</script>



@endsection