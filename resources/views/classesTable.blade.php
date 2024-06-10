@extends('layouts.dashMain')

@section('header')
    @include('includes/dashIncludes.header')
    @include('includes/dashIncludes.sidebar')
@endsection


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
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
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Class name</th>
                    <th>Teacher</th>
                    <th>Price</th>
                    <th>Age</th>
                    <th>Time</th>
                    <th data-type="time">Time</th>
                    <th>Capacity</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jhon Doe</td>
                    <td>9958</td>
                    <td>$99</td>
                    <td>3-5 Years</td>
                    <td>9-10 AM</td>
                    <td>9-10 AM</td>
                    <td>30 Kids</td>
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
    @include('includes/dashIncludes.footer')
    @include('includes/dashIncludes.footerJs')
@endsection