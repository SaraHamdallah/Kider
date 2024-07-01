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
                    <th>image</th>
                    <th>publish</th>
                    <th>show</th>
                    <th>update</th>
                    <th>delete</th>
                     
                  </tr>
                </thead>
                <tbody>
                @foreach ($courses  as $course) <!-- foreach ("name of compact" as $course) -->
                  <tr>
                    <td>{{ $course->className }}</td>
                    <td>{{ $course->price }}</td>
                    <td>{{ $course->age }}</td>
                    <td>{{ $course->startTime }}</td>
                    <td>{{ $course->capacity }}</td>
                    <td>{{ $course->image }}</td>
                    <td>{{ $course->publish ? 'Yes' : 'No'}}</td>
                    <td><a href="{{ route('showCourse', $course->id) }}">Show</a></td>
                    <td><a href="{{ route('editCourse', $course->id) }}">Edit</a></td>
                    <td>
                      <form action="{{ route('delCourse', $course->id) }}" method="post">
                        @csrf  <!-- directive is used for protecting against cross-site request forgery. This ensures your forms are secure.-->
                        @method('DELETE') <!--directive is used to spoof the HTTP DELETE method since HTML forms only support GET and POST.-->
                        <input type="hidden" value="{{ $course->id }}" name="id">
                        <input type="submit" value="Delete">
                      </form>
                    </td>
                  </tr>
                  @endforeach
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