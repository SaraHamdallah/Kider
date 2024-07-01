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
                    <form method="POST" action="{{ route('addTeachers') }}" enctype="multipart/form-data">
                    @csrf  <!-- creating input hidden token (secret code) -->

                        <div class="row mb-3">
                            <label for="fullName" class="col-sm-2 col-form-label">Teacher name</label>
                            <p style="color:red">
                            @error('fullName')
                                {{ $message }}
                            @enderror
                            </p>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fullName" value="{{ old('fullName') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">phone</label>
                            <p style="color:red">
                            @error('phone')
                                {{ $message }}
                            @enderror
                            </p>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="className">Select Class:</label><br>
                            <p style="color:red">
                                @error('className')
                                {{ $message }}
                                @enderror
                            </p>
                            <select name="course_id" id="course_id" class="form-control">
                                <option value="">Please select a course</option>
                                @foreach (\App\Models\Course::all() as $course)
                                    <option value="{{ $course->id }}"{{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->className }}</option>
                                @endforeach
                            </select>
                            <br>  <br>
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
                            <label for="facebook" class="col-sm-2 col-form-label">facebook</label>
                            <p style="color:red">
                            @error('facebook')
                                {{ $message }}
                            @enderror
                            </p>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="twitter" class="col-sm-2 col-form-label">twitter</label>
                            <p style="color:red">
                            @error('twitter')
                                {{ $message }}
                            @enderror
                            </p>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter') }}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="instagram" class="col-sm-2 col-form-label">instagram</label>
                            <p style="color:red">
                            @error('instagram')
                                {{ $message }}
                            @enderror
                            </p>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') }}" >
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