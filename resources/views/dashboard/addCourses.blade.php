@extends('./layouts.dashMain')

@section('header')
    @include('./includes/dashIncludes.header')
    @include('./includes/dashIncludes.sidebar')
@endsection

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Course</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Add Teachers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Add Teachers</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="{{ route('addCourses') }}" enctype="multipart/form-data">
                    @csrf  <!-- creating input hidden token (secret code) -->

                        <div class="row mb-3">
                            <label for="className" class="col-sm-2 col-form-label">class name</label>
                            <p style="color:red">
                            @error('className')
                                {{ $message }}
                            @enderror
                            </p>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="className" value="{{ old('className') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-sm-2 col-form-label">price</label>
                            <p style="color:red">
                            @error('price')
                                {{ $message }}
                            @enderror
                            </p>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
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
                                <input type="text" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}" required>
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
                            <input class="form-control" type="file" id="image" name="image" value="{{ old('image') }}" required>
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
                                <input type="text" class="form-control" id="age" name="age" value="{{ old('age') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="startTime" class="col-sm-2 col-form-label">startTime</label>
                            <p style="color:red">
                            @error('startTime')
                                {{ $message }}
                            @enderror
                            </p>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="startTime" name="startTime" value="{{ old('startTime') }}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">publish</legend>
                        
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="publish" name="publish" value="{{ old('publish') }}">
                                <label class="form-check-label" for="publish">
                                </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Add</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
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