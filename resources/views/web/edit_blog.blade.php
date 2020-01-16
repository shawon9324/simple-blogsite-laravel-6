@extends('layout.web.web') @section('title','Edit Blog') @section('content')
<!-- Contact Section -->
<section class="page-section" id="contact" style="margin-top: 20px;">
    <div class="container">

        <!-- Contact Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edit Blog</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Contact Section Form -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <form action="{{ route('blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT') @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Blog Title</label>
                            <input class="form-control" name="blog_title" id="name" type="text" value="{{ $blog->blog_title }}" placeholder="Enter blog title" data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                            @if ($errors->has('blog_title'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('blog_title') }}</strong>
                            </span> @endif
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Blog Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="" disabled selected>Select category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($blog->category_id == $category->id )
                                    selected=""
                                    @endif>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <p class="help-block text-danger"></p>
                        </div>
                        @if ($errors->has('category_id'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span> @endif
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Blog Description</label>
                            <textarea name="blog_description" placeholder="Enter Blog description here" class="form-control" id="" cols="6" rows="4">{{ $blog->blog_description }}
                            </textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        @if ($errors->has('blog_description'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('blog_description') }}</strong>
                        </span> @endif
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Blog Image</label>
                            <input class="form-control" name="image" id="name" type="file" data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                        @if ($errors->has('image'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span> @endif
                        <img src="uploads/blog/{{ $blog->image }}" alt="">
                    </div>


                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Update Blog</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection