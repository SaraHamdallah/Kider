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
          <li class="breadcrumb-item active">Add student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Add student</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="{{ route('addStudents') }}">
                    @csrf  <!-- creating input hidden token (secret code) -->
                        <div class="row mb-3">
                        <label for="studentName" class="col-sm-2 col-form-label">student name</label>
                        <p style="color:red">
                          @error('studentName')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="studentName" value="{{ old('studentName') }}" required>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="birthDate" class="col-sm-2 col-form-label">birthDate</label>
                        <p style="color:red">
                          @error('birthDate')
                            {{ $message }}
                          @enderror
                        </p>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="birthDate" name="birthDate" value="{{ old('birthDate') }}" required>
                        </div>
                        </div>

                        

                        <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">publish</legend>
                        
                        <div class="col-sm-10">

                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="publish" name="publish" value="{{ old('publish') }}">
                            <label class="form-check-label" for="publish">
                            publish
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