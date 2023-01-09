@extends('layouts.admin')
@section('title', 'Update Book')
@section('content')
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Manage Books</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{route('admin.books.update', $book)}}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        {{--  title--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                                                <input name="title"
                                                       type="text"
                                                       value = "{{$book->title}}"
                                                       class="form-control @error('title') is-invalid @enderror"
                                                       id="inputTitle" placeholder="Title">
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        {{--  title--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 col-form-label">Price</label>
                                                <input name="price"
                                                       type="number"
                                                       value="{{$book->price}}"
                                                       class="form-control @error('price') is-invalid @enderror"
                                                       id="inputPrice" placeholder="Price">
                                                @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category:</label>
                                                <select class="form-control select2bs4 @error('category_id') is-invalid @enderror"  style="width: 100%;"
                                                        name="category_id">
                                                    <option>Select Category Book</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{$category-> id == $book->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Publisher:</label>
                                                <select class="form-control select2bs4 @error('publisher_id') is-invalid @enderror"  style="width: 100%;"
                                                        name="publisher_id">
                                                    <option>Select Publisher Book</option>
                                                    @foreach($publishers as $publisher)
                                                        <option value="{{$publisher->id}}" {{$publisher-> id == $book->publisher_id ? 'selected' : ''}}>{{$publisher->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('publisher_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>


                                        </div>
                                    </div>


                                    <div class="row">
                                        {{--  title--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputName" class=" col-form-label">Book Avatar</label>
                                                <input name="file_upload"
                                                       type="file"
                                                       class="form-control @error('file_upload') is-invalid @enderror"
                                                       id="inputFileUpload"
                                                >
                                                @error('file_upload')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <br>
                                                <div class="text-center">
                                                    <img class="img-book-avatar" src="{{url('/uploads')}}/{{$book->book_avatar}}" alt="" style="width:100px; object-fit:cover; border-radius: 5%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        {{--  title--}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputImages" class=" col-form-label">Images</label>
                                                <div class="text-center lst increment">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btnAddImage" type="button">
                                                            <i class="fa fa-plus" aria-hidden="true"></i> Add image
                                                        </button>
                                                    </div>
                                                </div>

                                                @if($book->images)
                                                    @foreach($book->images as $image)
                                                        <div class="control-group express control-group lst cloneUploadFile" style="margin-top:10px">
                                                            <div class="input-group">
                                                                <input type="file" name="images[]"  class="myfrm form-control" onchange="handleFileChangeId(this, {{$image->id}})">
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-danger ml-1" type="button" onclick="btnRemoveImageFunc(this, {{$image->id}})">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="text-center">
                                                                <img class="img-danger" src="{{url('/uploads')}}/{{$image->image}}" alt="" style="width:100px; object-fit:cover; border-radius: 5%;">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <div class="clone d-none">
                                                    <div class="control-group express control-group lst cloneUploadFile" style="margin-top:10px">
                                                       <div class="input-group">
                                                           <input type="file" name="images[]" class="myfrm form-control" onchange="handleFileChange(this)">
                                                           <div class="input-group-btn">
                                                               <button class="btn btn-danger btnRemoveImage ml-1" type="button">
                                                                   <i class="fa fa-trash" aria-hidden="true"></i>
                                                               </button>
                                                           </div>
                                                       </div>
                                                        <br>
                                                        <div class="text-center">
                                                            <img class="img-danger" src="" alt="" style="width:100px; object-fit:cover; border-radius: 5%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description:</label>
                                                <div class="input-group">
                                                <textarea name="desc"
                                                          id="description"
                                                          type="text"
                                                          class="form-control">
                                                    {{$book->desc}}
                                                </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text" name="ids" id="myIdImage" value=""  hidden>

                                    <div class="">
                                        <a href="{{route('admin.books')}}" class="btn btn-secondary" ><i
                                                class="fa fa-times mr-1"></i>
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"> Save</i>
                                        </button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </div>
@endsection
@push('styles')
@endpush
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#description'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                // console.log(editor.getData())
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    let listImage = <?php echo $book->images ?>;
    let listBookImageId = [];
    let myIdImage = document.getElementById('myIdImage');

    const dropArea = document.querySelector('.increment');
    const img = dropArea.querySelector('.img-base');
    const input = dropArea.querySelector('input')
    $(document).ready(function() {
        $('.btnAddImage').click(function() {
            let htmlData = $('.clone').html();
            $('.increment').after(htmlData);
        })
        $('body').on('click', '.btnRemoveImage', function () {
            $(this).parents('.express').remove();
        })


        $('.uploadFileImageClone').click(function(){
            input.click();
        })


        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            showFile(file, img);
        })
    })

    let inputFileUpload = document.getElementById('inputFileUpload');
    inputFileUpload.addEventListener('change', (e) => {
        const file = e.target.files[0];
        let photo = document.querySelector('.img-book-avatar');
        showFile(file, photo);
    })

    function handleFileChange(value) {
        const file = value.files[0];
        const parentInput = value.closest('div.input-group');
        const parentDiv = parentInput.closest('div.cloneUploadFile')
        const photo = parentDiv.querySelector('.img-danger')
        showFile(file, photo)
    }

    function btnRemoveImageFunc(value,id) {
        for(let item of listImage) {
            if(item['id'] === id) {
                if(!listBookImageId.includes(id)) {
                    listBookImageId.push(id)
                }
            }
        }
        myIdImage.value = JSON.stringify(listBookImageId)
        $(value).parents('.express').remove();
    }

    function handleFileChangeId(value, id) {
        const file = value.files[0];
        const parentInput = value.closest('div.input-group');
        const parentDiv = parentInput.closest('div.cloneUploadFile')
        const photo = parentDiv.querySelector('.img-danger')

        for(let item of listImage) {
            if(item['id'] === id) {
                if(!listBookImageId.includes(id)) {
                    listBookImageId.push(id)
                }
            }
        }
        myIdImage.value = JSON.stringify(listBookImageId)

        showFile(file, photo)
    }

    function showFile(file, images) {
        let fileType = file.type;
        let validExtensions = ['image/jpeg', 'jpg', 'image/png'];
        if(validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                let fileUrl = fileReader.result;
                images.src = fileUrl;
            }
            fileReader.readAsDataURL(file);
        } else {
            alert("Can not file image");
        }
    }
</script>
@endpush
