@extends('./layouts.dashMain')

@section('header')
    @include('./includes/dashIncludes.header')
    @include('./includes/dashIncludes.sidebar')
@endsection
 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>hjgjhgjhg</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student Table</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>class name</th>
                    <th>price </th>
                    <th>age</th>
                    <th>start time</th>
                    <th>capacity</th>
                    <th>students </th>
                    <th>publish</th>
                    <th>image</th>
                    
            
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $course->className }}</td>
                    <td>{{ $course->price }}</td>
                    <td>{{ $course->age }}</td>
                    <td>{{ $course->startTime }}</td>
                    <td>{{ $course->capacity }}</td>
                    <td>
                      <ul>
                        @foreach($course->students as $student)
                          <li>{{ $student->studentName }}</li>
                        @endforeach
                      </ul>
                    </td>
                    <td>{{ $course->publish ? 'Yes' : 'No'}}</td>
                    <td>Image: <img src="{{ asset('assets/images/' . $course->image) }}" alt="{{ $course->className }}"></td>
                    
                    <td>
                    </td>
                  </tr>
              
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@section('footer')
    @include('./includes/dashIncludes.footer')
@endsection