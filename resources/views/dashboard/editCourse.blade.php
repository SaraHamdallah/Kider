@extends('./layouts.dashMain')

@section('header')
    @include('./includes/dashIncludes.header')
    @include('./includes/dashIncludes.sidebar')
@endsection
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Add course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Add course</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="{{ route('updateCourse', $course->id) }}" enctype="multipart/form-data">
                    @csrf  <!-- creating input hidden token (secret code) -->
                    @method('put') <!-- to add the updated data only -->
                        <div class="row mb-3">
                        <label for="className" class="col-sm-2 col-form-label">Class name</label>
                        <p style="color:red">
                          @error('className')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="className" value="{{ $course->className }}">
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <p style="color:red">
                          @error('price')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price" value="{{ $course->price }}" aria-describedby="price-addon" step="0.01" >
                            <span class="input-group-text" id="price-addon">$</span>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="capacity" class="col-sm-2 col-form-label">capacity</label>
                        <p style="color:red">
                          @error('capacity')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $course->capacity }}">
                            <span class="input-group-text" id="price-addon">kids</span>
                        </div>
                        </div> 

                        <div class="row mb-3">
                        <label for="age" class="col-sm-2 col-form-label">age</label>
                        <p style="color:red">
                          @error('age')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="age" name="age" value="{{ $course->age }}" required pattern="\d{1,2}-\d{1,2}" placeholder="3-5" title="Enter age range like 3-5">
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">image</label>
                        <p style="color:red">
                          @error('image')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                        <img src="{{ asset('assets/images/' . $course->image) }}" alt=""><br>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        </div>
                        
                        <div class="row mb-3">
                        <label for="startTime" class="col-sm-2 col-form-label">start Time</label>
                        <p style="color:red">
                          @error('startTime')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="startTime" name="startTime"  value="{{ $course->startTime }}" placeholder="9 - 10 AM" >
                        </div>
                        </div>

                        <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">publish</legend>
                        
                        <div class="col-sm-10">

                            <div class="form-check">
                            <input type="hidden" name="active" value="0">
                            <input class="form-check-input" type="checkbox" id="publish" name="publish" value="1" @if($course->publish) checked @endif>
                            <label class="form-check-label" for="publish">
                            publish
                            </label>
                            </div>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Edit</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                        </div>

                    </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@section('footer')
    @include('./includes/dashIncludes.footer')
@endsection