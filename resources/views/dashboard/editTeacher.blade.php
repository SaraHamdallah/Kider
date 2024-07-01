@extends('./layouts.dashMain')

@section('header')
    @include('./includes/dashIncludes.header')
    @include('./includes/dashIncludes.sidebar')
@endsection
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add teachers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Add teachers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Add teachers</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="{{ route('updateTeacher', $teacher->id) }}" enctype="multipart/form-data">
                    @csrf  <!-- creating input hidden token (secret code) -->
                    @method('put') <!-- to add the updated data only -->
                        <div class="row mb-3">
                        <label for="fullName" class="col-sm-2 col-form-label">Teacher name</label>
                        <p style="color:red">
                          @error('fullName')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fullName" value="{{ $teacher->fullName }}">
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
                            <input type="text" class="form-control" name="phone" value="{{ $teacher->phone }}">
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="className" class="col-sm-2 col-form-label">class name</label>
                        <p style="color:red">
                          @error('className')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="className" value="{{ $teacher->className }}">
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
                        <img src="{{ asset('assets/images/' . $teacher->image) }}" alt=""><br>
                            <input class="form-control" type="file" id="image" name="image">
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
                            <input type="text" class="form-control" name="facebook" value="{{ $teacher->facebook }}">
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
                            <input type="text" class="form-control" name="twitter" value="{{ $teacher->twitter }}">
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
                            <input type="text" class="form-control" name="instagram" value="{{ $teacher->instagram }}">
                        </div>
                        </div>
                        
                        

                        <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">publish</legend>
                        
                        <div class="col-sm-10">

                            <div class="form-check">
                            <input type="hidden" name="active" value="0">
                            <input class="form-check-input" type="checkbox" id="publish" name="publish" value="1" @if($teacher->publish) checked @endif>
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