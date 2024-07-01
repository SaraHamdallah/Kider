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
                    <h5 class="card-title">Add student to course</h5>

                    <!-- Display Success/Error Messages -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- General Form Elements -->
                    <form method="POST" action="{{ route('addCourseStudent') }}">
                    @csrf  <!-- creating input hidden token (secret code) -->
                    <div class="row mb-3">
                        <label for="student_id" class="col-sm-2 col-form-label">student</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="student_id" id="student_id" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->studentName }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="course_id" class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="course_id" id="course_id" required>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->className }}</option>
                                @endforeach
                            </select>
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