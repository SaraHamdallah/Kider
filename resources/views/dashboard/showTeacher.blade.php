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
              <h5 class="card-title">teachers Table</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>name</th>
                    <th>phone </th>
                    <th>image</th>
                    <th>class </th>
                    <th>facebook </th>
                    <th>twitter </th>
                    <th>instgram </th>
                    <th>active</th>
                    <th data-type="date">created at</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>{{ $teacher->fullName }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>Image: <img src="{{ asset('assets/images/' . $teacher->image) }}" alt="{{ $teacher->fullName }}"></td>
                    <td>Arts</td>
                    <td>{{ $teacher->facebook }}</td>
                    <td>{{ $teacher->twitter }}</td>
                    <td>{{ $teacher->instagram }}</td>
                    <td>yes</td>
                    <td>1/1/2020</td>
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